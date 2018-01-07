<?php

use PHPUnit\Framework\TestCase;
use Laravist\Hasher\MD5Hasher;

class MD5HasherTest extends TestCase
{
    protected $hasher;

    public function setUp()
    {
        $this->hasher = new MD5Hasher();
    }

    public function testMD5HasherMake()
    {
        $password = md5('password');
        $passwordTwo = $this->hasher->make('password');

        $this->assertEquals($password, $passwordTwo);
    }

    public function testMD5HasherMakeWithSalt()
    {
        $passwordTwo = $this->hasher->make('password',['salt'=>'allen']);
        $password = md5('passwordallen');

        $this->assertEquals($password, $passwordTwo);
    }

    public function testMD5HasherCheck()
    {
        $password = md5('password');
        $passwordCheck = $this->hasher->check('password',$password);
        $this->assertTrue($passwordCheck);
    }
}