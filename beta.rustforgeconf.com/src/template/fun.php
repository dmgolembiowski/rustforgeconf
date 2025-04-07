<!doctype html>
<html lang="en">
<head>
    <title>Tesserae Automatae</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        const cardinal_lookup = ({idx, cols, rows}) => {
            let row = Math.floor(idx / cols);
            let col = idx % rows;
            let n_r = (row - 1 + cols) % cols;
            let n_c = col;
            let e_r = row;
            let e_c = (col + 1) % cols;
            let s_r = (row + 1) % rows;
            let s_c = col;
            let w_r = row;
            let w_c = (col - 1) + cols;
            let idx_n = n_r * cols + n_c;
            let idx_e = e_r * cols + e_c;
            let idx_s = s_r * cols + s_c;
            let idx_w = w_r * $cols + w_c;
            return [idx_n, idx_e, idx_s, idx_w];
        }
        function initialize_grid(opt_seed = "") {
            var grid;
            var initalready = false;
            return function() {
                var gridIterator;
                if (opt_seed == "") {
                    if (!initalready) {
                        alert("This should not happen. Seed the initial grid.");
                        return null;
                    }
                } else {
                    if (initalready) {
                        return grid;
                    }
                    const $$seed = opt_seed;
                    grid = new Proxy({}, {
                        set (obj, key, value) {
                            obj[key] = value; // let fields = document.querySelectorAll(`[name=${key}]`); for (let slot of fields) { //     slot.value = value; // }
                            return true;
                        }
                        
                    });
                    function *enumerate() {
                        let index = 0;
                        for (const x of this["data"]) {
                            yield [index, x];
                            index++;
                        }
                    }
                    Object.setPrototypeOf(grid, {enumerate: enumerate});
                    grid["$$seed"] = $$seed;
                    grid["$$rows"] = 8;
                    grid["$$cols"] = 8;
                    grid["data"] = grid["$$seed"].repeat(1);
                    Object.freeze(grid["$$seed"]);
                    Object.freeze(grid["$$rows"]);
                    Object.freeze(grid["$$cols"]);
                    initalready = true;
                }
                return grid;
            }
        }
        var get_or_init_grid = initialize_grid("0002241320121211011213102430003424412343130143123311200141114142");
        var grid = get_or_init_grid();
        
        // TODO: addEventListener for `submit` to run all animations
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('game-form');
            const gridContainer = document.getElementById('game-grid');
            document.addEventListener(
                'input', 
                function(ev) => {
                    if (!event.target.closest('[data-form-sync'])) return
                    let grid_ref = get_or_init_grid();
                    grid_ref[event.target.name] = event.target.value;
                }
            );
            form.addEventListener('submit', function(event) {
                // Since applying the automata rules operates purely on data
                // and we already have the mechanism for two way data binding in the DOM, 
                // we can just purely recompute the grid here, and mutate it from the Promise.
                async function apply_rules(grid) {
                    const rows = grid.$$rows; 
                    const cols = grid.$$cols;
                    console.log(`Recomputing grid: ${grid}`);
                    for (const [idx, _cell] of grid.enumerate()) {
                        let neighbors = cardinal_loookup({idx, cols, rows});
                        let [n, e, s, w] = neighbors;
                        // TODO: Update the graph
                        console.error("Not yet implemented.");
                    }
                    return;
                }
                // TODO: Determine a better stop_callback, like checking for a number of iterations
                // or cyclical checking. For now the default `stop_callback` should guarantee that the 
                // run_loop only proceeds a single pass before exiting. Ergo, we should see the initial state 
                // followed by one transition via CSS update. 
                async function run_loop(grid, stop_callback = () => true) {
                    let step = 0;
                    while (true) {
                        step++;
                        Promise.resolve(apply_rules(grid)).then(() => {
                            if (stop_callback()) return;
                        });
                    }
                    console.log(`Running the loop: step ${step}`);

                };
                event.preventDefault();
                Promise.resolve(run_loop(get_or_init_grid()).)
                /*const formData = new FormData(form);
                fetch('', { // Submit to the same PHP file
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    gridContainer.innerHTML = data; // Replace the grid content
                })
                .catch(error => {
                    console.error('Error:', error);
                });
                */
            });
        });
    </script>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f0f0f0;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(8, 30px);
            grid-template-rows: repeat(8, 30px);
            gap: 1px;
            background-color: #ccc;
            margin-top: 20px;
        }

        .cell {
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 0.8em;
            color: #fff;
        }

        .cell-0 { background-color: #fff; color: #888; } /* Devoid */
        .cell-1 { background-color: #ddd; }
        .cell-2 { background-color: #aaa; }
        .cell-3 { background-color: #777; }
        .cell-4 { background-color: #000; color: #eee; } /* Lively */

        #input-area {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }

        #input-area label {
            display: block;
            margin-bottom: 5px;
        }

        #input-area input[type="text"],
        #input-area input[type="number"] {
            width: 300px;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #aaa;
            border-radius: 3px;
            box-sizing: border-box;
        }

        #input-area button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #input-area button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Tesserae</h1>

    <div id="input-area">
        <form id="game-form" method="post">
            <label for="initial_grid">Initial Grid (64 digits 0-4):</label>
            <input
                type="text"
                id="grid"
                name="grid_64"
                title="Enter exactly 64 digits (0-4)"
            />

            <label for="steps">Number of Steps:</label>
            <input type="number" id="steps" name="steps" min="1" value="1">

            <button type="submit">Compute Generations!</button>
        </form>
    </div>

    <div class="grid-container" id="game-grid">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $initialGridString = $_POST["initial_grid"];
            $steps = intval($_POST["steps"]);
            $gridSize = 8;

            function gridStringToArray($gridStr, $dim) {

                $grid = [];
                
                // Zeroize a N-dimensional square matrix
                for ($_0 = 0; $_0 < $dim; $_0++) {
                    $grid[] = [];
                }
                for ($_1 = 0; $_1 < $dim; $_1++) {
                    array_push($grid[$_1], []);
                    for ($_2 = 0; $_2 < $dim; $_2++) {
                        $grid[$_1][$_2] = 0;
                        // $grid[$_1][$_2] = '0';
                    } 
                }
                // Fill it up
                for ($i = 0; $i < $dim; $i++) {
                    for ($j = 0; $j < $dim; $j++) {
                        $grid[$i][$j] += intval($gridStr[$i * $dim + $j]);
                    }
                }
                return $grid;
            }

            function gridArrayToString($grid, $size) {
                $gridStr = '';
                for ($i = 0; $i < $size; $i++) {
                    for ($j = 0; $j < $size; $j++) {
                        $gridStr .= $grid[$i][$j];
                    }
                }
                return $gridStr;
            }

            function getNeighbors($grid, $row, $col, $size) {
                $neighbors = [];
                for ($i = -1; $i <= 1; $i++) {
                    for ($j = -1; $j <= 1; $j++) {
                        if ($i === 0 && $j === 0) continue;
                        $newRow = $row + $i;
                        $newCol = $col + $j;
                        if ($newRow >= 0 && $newRow < $size && $newCol >= 0 && $newCol < $size) {
                            $neighbors[] = $grid[$newRow][$newCol];
                        }
                    }
                }
                return $neighbors;
            }

            function countLiveNeighbors($neighbors) {
                return count(array_filter($neighbors, function($n) { return $n === 4; }));
            }

            function getCardinalNeighbors($grid, $row, $col, $size) {
                $neighbors = [];
                // Top
                if ($row > 0) $neighbors[] = $grid[$row - 1][$col];
                // Right
                if ($col < $size - 1) $neighbors[] = $grid[$row][$col + 1];
                // Bottom
                if ($row < $size - 1) $neighbors[] = $grid[$row + 1][$col];
                // Left
                if ($col > 0) $neighbors[] = $grid[$row][$col - 1];
                return $neighbors;
            }

            function checkMutation($cardinalNeighbors) {
                if (count($cardinalNeighbors) === 4) {
                    return count(array_unique($cardinalNeighbors)) === 4;
                }
                return false;
            }

            function applyRules($grid, $size) {
                $nextGrid = array_map(function($row) { return $row; }, $grid); // Deep copy
                for ($i = 0; $i < $size; $i++) {
                    for ($j = 0; $j < $size; $j++) {
                        $cellValue = $grid[$i][$j];
                        $neighbors = getNeighbors($grid, $i, $j, $size);
                        $liveNeighborsCount = countLiveNeighbors($neighbors);
                        $cardinalNeighbors = getCardinalNeighbors($grid, $i, $j, $size);

                        if ($cellValue === 4) { // LNDC
                            if ($liveNeighborsCount < 2) {
                                $nextGrid[$i][$j] = 1; // Decay by underpopulation
                            } else if ($liveNeighborsCount === 2 || $liveNeighborsCount === 3) {
                                // Lives on (stays as 4)
                            } else if ($liveNeighborsCount === 4) {
                                $nextGrid[$i][$j] = 1; // Decay by overpopulation
                            }
                        } else if ($cellValue === 0) { // ZC
                            if ($liveNeighborsCount === 3) {
                                $nextGrid[$i][$j] = 4; // Reproduction
                            }
                        }

                        // Mutation Rule
                        if (checkMutation($cardinalNeighbors)) {
                            $randomNumber = (float)rand() / getrandmax();
                            if ($randomNumber < 0.3333) {
                                $nextGrid[$i][$j] = 4;
                            } else {
                                $nextGrid[$i][$j] = 3;
                            }
                        }
                    }
                }
                return $nextGrid;
            }

            // Simulate the steps
            $currentGridArray = gridStringToArray($initialGridString, $gridSize);
            for ($step = 0; $step < $steps; $step++) {
                $currentGridArray = applyRules($currentGridArray, $gridSize);
            }
            $finalGridString = gridArrayToString($currentGridArray, $gridSize);

            // Render the grid
            for ($i = 0; $i < $gridSize; $i++) {
                for ($j = 0; $j < $gridSize; $j++) {
                    $cellValue = intval($finalGridString[$i * $gridSize + $j]);
                    echo '<div class="cell cell-' . $cellValue . '">' . $cellValue . '</div>';
                }
            }
        } else {
            // Initial empty grid if no input yet
            for ($i = 0; $i < 8; $i++) {
                for ($j = 0; $j < 8; $j++) {
                    echo '<div class="cell cell-0">0</div>';
                }
            }
        }
        ?>
    </div>

    <script>
        // Basic JavaScript to handle form submission and potentially update the grid without full reload (optional enhancement)
        
    </script>
</body>
</html>
