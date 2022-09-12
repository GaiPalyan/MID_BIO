setup:
	composer install
	cp -n .env.example .env || true
	php artisan key:gen --ansi
	alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'

