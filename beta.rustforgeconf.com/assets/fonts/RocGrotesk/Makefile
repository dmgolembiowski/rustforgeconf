.PHONY: all
all: RocGrotesk-WideBold.woff RocGrotesk-WideBold.woff2

RocGrotesk-WideBold.woff: setup RocGrotesk-WideBold-hinted.ttf
	uv run fonttools ttLib --flavor woff -o RocGrotesk-WideBold.woff RocGrotesk-WideBold-hinted.ttf

RocGrotesk-WideBold.woff2: setup RocGrotesk-WideBold-hinted.ttf
	uv run fonttools ttLib --flavor woff2 -o RocGrotesk-WideBold.woff2 RocGrotesk-WideBold-hinted.ttf

RocGrotesk-WideBold-hinted.ttf: RocGrotesk-WideBold.ttf
	ttfautohint --strong-stem-width="nnn" --no-info --windows-compatibility RocGrotesk-WideBold.ttf RocGrotesk-WideBold-hinted.ttf

.PHONY:
setup:
	uv venv --no-project --python='>=3.13'
	uv pip install brotli
	uv pip install fonttools

.PHONY:
clean:
	rm -f RocGrotesk-WideBold-hinted.ttf
	rm -f RocGrotesk-WideBold.woff
	rm -f RocGrotesk-WideBold.woff2

# fonttools.ttLib.sfnt2woff