# Beta site
server {
    server_name beta.rustforgeconf.com;

    root /home/tim/rustforgeconf/beta.rustforgeconf.com;

    index index.html;

	location /sign-up {
	    limit_except POST {
	    	deny all;
	    }

	    client_max_body_size 10k;

	    proxy_pass https://script.google.com/macros/s/AKfycbw-j5Ly0AIJlbyOKtkUl1GLw6sHno3DYHPayzruEhMjA5pG7qyiDSc55xvSxVofaqgr/exec;
	    proxy_set_header Host script.google.com;
	    proxy_set_header X-Real-IP $remote_addr;
	    proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
	    proxy_set_header X-Forwarded-Proto $scheme;

	}

    location /-update {
        proxy_pass http://localhost:9000/hooks/update-rustforgeconf;
        proxy_set_header Host $host;
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header X-Forwarded-Proto $scheme;

        client_max_body_size 16k;
    }

    location / {
        try_files $uri $uri/ =404;
    }

    add_header X-Content-Type-Options "nosniff";
    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-XSS-Protection "1; mode=block";
    // add_header Referrer-Policy "strict-origin-when-cross-origin";
    add_header Permissions-Policy "geolocation=(), microphone=(), camera=()";

    listen [::]:443 ssl ipv6only=on; # managed by Certbot
    listen 443 ssl; # managed by Certbot
    ssl_certificate /etc/letsencrypt/live/rustforgeconf.com/fullchain.pem; # managed by Certbot
    ssl_certificate_key /etc/letsencrypt/live/rustforgeconf.com/privkey.pem; # managed by Certbot
    include /etc/letsencrypt/options-ssl-nginx.conf; # managed by Certbot
    ssl_dhparam /etc/letsencrypt/ssl-dhparams.pem; # managed by Certbot
    add_header Strict-Transport-Security "max-age=31536000" always; # managed by Certbot
}

# Prod
server {
    server_name www.rustforgeconf.com rustforgeconf.com;
    
    root /home/tim/rustforgeconf/www.rustforgeconf.com;

    index index.html;

	location /sign-up {
	    limit_except POST {
	    	deny all;
	    }
	    
	    client_max_body_size 10k;

	    proxy_pass https://script.google.com/macros/s/AKfycbw-j5Ly0AIJlbyOKtkUl1GLw6sHno3DYHPayzruEhMjA5pG7qyiDSc55xvSxVofaqgr/exec;
	    proxy_set_header Host script.google.com;
	    proxy_set_header X-Real-IP $remote_addr;
	    proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
	    proxy_set_header X-Forwarded-Proto $scheme;

	}

    location /-update {
        proxy_pass http://localhost:9000/hooks/update-rustforgeconf;
        proxy_set_header Host $host;
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header X-Forwarded-Proto $scheme;

        client_max_body_size 16k;
    }
    
    location / {
        try_files $uri $uri/ =404;
    }

    add_header X-Content-Type-Options "nosniff";
    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-XSS-Protection "1; mode=block";
    // add_header Referrer-Policy "strict-origin-when-cross-origin";
    add_header Permissions-Policy "geolocation=(), microphone=(), camera=()";

    listen [::]:443 ssl ipv6only=on; # managed by Certbot
    listen 443 ssl; # managed by Certbot
    ssl_certificate /etc/letsencrypt/live/rustforgeconf.com/fullchain.pem; # managed by Certbot
    ssl_certificate_key /etc/letsencrypt/live/rustforgeconf.com/privkey.pem; # managed by Certbot
    include /etc/letsencrypt/options-ssl-nginx.conf; # managed by Certbot
    ssl_dhparam /etc/letsencrypt/ssl-dhparams.pem; # managed by Certbot
    add_header Strict-Transport-Security "max-age=31536000" always; # managed by Certbot
}

# Upgrade HTTP to HTTPS
server {
    if ($host = beta.rustforgeconf.com) {
        return 301 https://$host$request_uri;
    } # managed by Certbot


    if ($host = www.rustforgeconf.com) {
        return 301 https://$host$request_uri;
    } # managed by Certbot


    if ($host = rustforgeconf.com) {
        return 301 https://$host$request_uri;
    } # managed by Certbot

    listen 80;
    listen [::]:80;
    
    server_name beta.rustforgeconf.com www.rustforgeconf.com rustforgeconf.com;
    return 404; # managed by Certbot
}
