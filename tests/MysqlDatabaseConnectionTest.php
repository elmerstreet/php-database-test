<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class MysqlDatabaseConnectionTest extends TestCase
{
    private $pdo;

    protected function connect(): void
    {
        // Retrieve database credentials from environment variables

        if (empty($_ENV['MYSQL_DB_HOST'])) {
            $this->markTestSkipped('MYSQL_DB_HOST is not set');
        }

        $dbHost = $_ENV['MYSQL_DB_HOST'];
        $dbPort = $_ENV['MYSQL_DB_PORT'];
        $dbName = $_ENV['MYSQL_DB_DATABASE'];
        $dbUsername = $_ENV['MYSQL_DB_USERNAME'];
        $dbPassword = $_ENV['MYSQL_DB_PASSWORD'];

        // set port
        if ($dbPort) {
            $dbHost .= ':' . $dbPort;
        }

        $dsn = 'mysql:host=' . $dbHost . ':' . $dbPort . ';' . 'dbname=' . $dbName;

        try {
            $this->pdo = new \PDO($dsn, $dbUsername, $dbPassword);
        } catch (\PDOException $e) {
            $this->fail("Could not connect to the database: " . $e->getMessage());
        }
    }

    public function testPdoMysqlExtensionLoaded()
    {
        $this->assertTrue(
            extension_loaded('pdo_mysql'),
            'The PDO MySQL extension is not loaded.'
        );
    }
    public function testConnectionIsValid()
    {
        $this->connect();

        // Assert that the PDO instance is not null
        $this->assertNotNull($this->pdo, "Failed to create PDO instance");

        // Assert that the connection is a PDO instance
        $this->assertInstanceOf(\PDO::class, $this->pdo, "The connection is not a PDO instance");
    }

    protected function tearDown(): void
    {
        $this->pdo = null;
    }
}
