<?php

namespace Madapaja\Ray\Di\Sample01\Tests\Model;

use Madapaja\Ray\Di\Sample01\Tests\BaseTest;
use Madapaja\Ray\Di\Sample01\Model\User;

/**
 * @property    User    $user
 * @property    \PDO    $db
 */
class UserTest extends BaseTest
{
    protected $user;
    protected $db;

    public function setUp()
    {
        $this->db = new \PDO('sqlite::memory:', null, null);
        $this->user = new User($this->db);
    }

    /**
     * @test
     */
    public function init()
    {
        $this->assertInstanceOf('PDOStatement', $this->user->init(), 'PDOStatement が返されるか');

        $test = $this->db->query('SELECT COUNT(*) + 1 FROM User', \PDO::FETCH_NUM);
        $this->assertInstanceOf('PDOStatement', $test, 'Userテーブルの存在テスト');

        $this->assertGreaterThanOrEqual(1, $test->fetch()[0], 'UserテーブルのCOUNT値をテスト');
    }

    /**
     * @test
     */
    public function createUser()
    {
        $this->user->init();

        $name = 'madapaja';
        $age = 30;
        $this->assertTrue($this->user->createUser($name, $age), '挿入できるか');

        $id = $this->db->lastInsertId();
        $sth = $this->db->prepare('SELECT Name, Age FROM User WHERE id = :id');
        $sth->execute(array(':id' => $id));
        $user = $sth->fetch(\PDO::FETCH_NUM);

        $this->assertEquals($name, $user[0], '挿入された名前のテスト');
        $this->assertEquals($age, $user[1], '挿入された年齢のテスト');
    }

}
