<?php

namespace ModelTest\DataMapperTest;

use Model\DataMapper\UserMapper;
use Model\DataBase\DatabaseConnection;
use Model\Entity\User;
use TestCase;
use PDO;

class UserMapperTest extends TestCase
{
    private $connection;

    public function setUp()
    {
        $this->connection = new DatabaseConnection('sqlite::memory:');
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connection->exec(<<<SQL
CREATE TABLE IF NOT EXISTS USER (
      user_id INT PRIMARY KEY NOT NULL,
      user_name VARCHAR(100) NOT NULL,
      user_password VARCHAR(100) NOT NULL
);
SQL
        );
    }

    public function testPersist()
    {
        $mapper = new UserMapper($this->connection);
        $rows = $this->connection->query('SELECT COUNT(*) FROM USER')->fetch(PDO::FETCH_NUM);
        $this->assertEquals(0, $rows[0]);
        $user = new User(null, 'picharles', 'message', date('Y-m-d H:i:s'));
        $mapper->persist($user);
        $rows = $this->connection->query('SELECT COUNT(*) FROM USER')->fetch(PDO::FETCH_NUM);
        $this->assertEquals(1, $rows[0]);
    }

    public function testRemove()
    {
        $mapper = new userMapper($this->connection);
        $rows = $this->connection->query('SELECT COUNT(*) FROM USER')->fetch(\PDO::FETCH_NUM);
        $this->assertEquals(0, $rows[0]);
        $user = new User('1', 'picharles', 'p4ssw0rd');
        $mapper->persist($user);
        $rows = $this->connection->query('SELECT COUNT(*) FROM USER')->fetch(\PDO::FETCH_NUM);
        $this->assertEquals(1, $rows[0]);
        $mapper->remove($user->getUserId());
        $rows = $this->connection->query('SELECT COUNT(*) FROM USER')->fetch(\PDO::FETCH_NUM);
        $this->assertEquals(0, $rows[0]);
    }
}