<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__ . '/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Load Environment Variables
|--------------------------------------------------------------------------
|
| Load all environment variables from .env file
|
*/

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
//$dotenv->required(['MYSQL_DB_CONNECTION', 'MYSQL_DB_HOST', 'MYSQL_DB_PORT', 'MYSQL_DB_DATABASE', 'MYSQL_DB_USERNAME', 'MYSQL_DB_PASSWORD']);

/*
|--------------------------------------------------------------------------
| Set Default Environment Variables
|--------------------------------------------------------------------------
|
| Set default environment variables if they are not set
|
*/

# MySQL Database
$_ENV['MYSQL_DB_HOST'] = $_ENV['MYSQL_DB_HOST'] ?? 'localhost';
$_ENV['MYSQL_DB_PORT'] = $_ENV['MYSQL_DB_PORT'] ?? '3306';
$_ENV['MYSQL_DB_DATABASE'] = $_ENV['MYSQL_DB_DATABASE'] ?? 'test';
$_ENV['MYSQL_DB_USERNAME'] = $_ENV['MYSQL_DB_USERNAME'] ?? 'root';
$_ENV['MYSQL_DB_PASSWORD'] = $_ENV['MYSQL_DB_PASSWORD'] ?? '';

# ScyllaDB Database
$_ENV['SCYLLA_DB_CONTACT_POINTS'] = $_ENV['SCYLLA_DB_CONTACT_POINTS'] ?? 'localhost';
$_ENV['SCYLLA_DB_PORT'] = $_ENV['SCYLLA_DB_PORT'] ?? '9042';
$_ENV['SCYLLA_DB_KEYSPACE'] = $_ENV['SCYLLA_DB_KEYSPACE'] ?? 'test';
$_ENV['SCYLLA_DB_USERNAME'] = $_ENV['SCYLLA_DB_USERNAME'] ?? 'root';
$_ENV['SCYLLA_DB_TIMEOUT'] = $_ENV['SCYLLA_DB_TIMEOUT'] ?? 15.0;
