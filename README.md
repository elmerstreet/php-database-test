# PHP Database Test

## Description

A project to test PHP database connections for MySQL and ScyllaDB/Cassandra

## Requirements

- PHP 8.1+
- [PDO_MYSQL Driver](https://www.php.net/manual/en/ref.pdo-mysql.php)
- [ScyllaDB/CassandraDB PHP Driver by He4rt Developers](https://github.com/he4rt/scylladb-php-driver)
- [Composer](https://getcomposer.org/)


## Installation

### Clone Repository

```bash
git clone https://github.com/latublu/php-database-test.git
cd php-database-test
```

### Run Composer

```bash
composer install
``` 

### Build ScyllaDB/CassandraDB PHP Driver by He4rt Developers

[ScyllaDB/CassandraDB PHP Driver Build Instructions](https://github.com/he4rt/scylladb-php-driver)

### Set Environment Variables

Create a .env file in your project's root directory, based on the provided .env.example file. 

```
# MySQL Database
MYSQL_DB_HOST=localhost
MYSQL_DB_PORT=3306
MYSQL_DB_DATABASE=test
MYSQL_DB_USERNAME=root
MYSQL_DB_PASSWORD=cRtEg-39485

# ScyllaDB Database
SCYLLA_DB_CONTACT_POINTS=localhost
SCYLLA_DB_PORT=9042
SCYLLA_DB_KEYSPACE=test
SCYLLA_DB_USERNAME=root
SCYLLA_DB_PASSWORD=
SCYLLA_DB_TIMEOUT=15.0
```

## Usage

## Running Tests

This project uses PHPUnit for testing. Follow these steps to run the tests:

```bash
vendor/bin/phpunit
```

## Etc

### PHP_CodeSniffer Usage Example
To check your code style, run:

```bash
vendor/bin/phpcs --standard=PSR12 app
vendor/bin/phpcs --standard=PSR12 tests
```

To fix sniff violations, run:
```bash
vendor/bin/phpcbf --standard=PSR12 app
vendor/bin/phpcbf --standard=PSR12 tests
```

### PHPStan Usage Example
To perform static analysis, run:

```bash
vendor/bin/phpstan analyse app
vendor/bin/phpstan analyse tests
```

## License

Open-sourced software licensed under the [MIT license](https://opensource.org/license/mit/).