PORT:=8000
start:
	php -S 0.0.0.0:${PORT} -t public

lint:
	~/.config/composer/vendor/bin/phpcbf -- --standard=PSR12 public
	~/.config/composer/vendor/bin/phpcs -- --level=8 analyse public

install:
	composer install
