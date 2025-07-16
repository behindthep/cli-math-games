install:
	composer install

even:
	bin/even

calc:
	bin/calc

gcd:
	bin/gcd

progression:
	bin/progression

prime:
	bin/prime

console:
	composer exec --verbose psysh

lint:
	composer exec --verbose phpcs -- src bin
	composer exec --verbose phpstan

lint-fix:
	composer exec --verbose phpcbf -- src bin
