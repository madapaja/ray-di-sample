<?php

namespace Madapaja\Ray\Di\Sample01\Tests\Model;

use Madapaja\Ray\Di\Sample01\Tests\BaseTest;
use Madapaja\Ray\Di\Sample01\Model\User;

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
}
