<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use \Cassandra;
use \Cassandra\Cluster;
use \Cassandra\DefaultCluster;
use \Cassandra\DefaultSession;

class ScyllaDatabaseConnectionTest extends TestCase
{
    /**
     * The Cassandra builder.
     */
    private $builder;

    /**
     * The Cassandra connection handler.
     */
    private $session;

    protected function connect(): void
    {
        // Retrieve database credentials from environment variables

        if (empty($_ENV['SCYLLA_DB_CONTACT_POINTS'])) {
            $this->markTestSkipped('SCYLLA_DB_CONTACT_POINTS is not set');
        }
       
        $dbContactPoints = $_ENV['SCYLLA_DB_CONTACT_POINTS'];
        $dbPort = $_ENV['SCYLLA_DB_PORT'];
        $dbKeyspace = $_ENV['SCYLLA_DB_KEYSPACE'];
        $dbUsername = $_ENV['SCYLLA_DB_USERNAME'];
        $dbPassword = $_ENV['SCYLLA_DB_PASSWORD'];
        $dbTimeout = $_ENV['SCYLLA_DB_TIMEOUT'];

        
        $this->builder = Cassandra::cluster()
            ->withContactPoints($dbContactPoints)
            ->withPort($dbPort)
            ->withCredentials($dbUsername, $dbPassword)
            ->withPersistentSessions(true)
            ->withTokenAwareRouting(true)
            ->withConnectTimeout($dbTimeout)
            ->build();

        try {
            $this->session = $this->builder->connect($dbKeyspace);
        } catch (\Exception $e) {
            $this->fail("Could not connect to the database: " . $e->getMessage());
        }
    }

    public function testCassandraExtensionLoaded()
    {
        $this->assertTrue(
            extension_loaded('cassandra'),
            'The Cassandra extension is not loaded.'
        );
    }

    public function testConnectionIsValid()
    {
        $this->connect();
        
        // Assert that the PDO instance is not null
        $this->assertNotNull($this->session, "Failed to create ScyllaDB/Cassandra Session instance");

        // Assert that the builder is a Cassandra\DefaultCluster instance
        $this->assertInstanceOf(Cassandra\DefaultCluster::class, $this->builder, "The builder is not a Cassandra\DefaultCluster instance");

        // Assert that the session is a Cassandra\DefaultSession instance
        $this->assertInstanceOf(Cassandra\DefaultSession::class, $this->session, "The session is not a Cassandra\DefaultSession instance");
    }

    protected function tearDown(): void
    {
        $this->session = null;
    }
}
