<?php
declare(strict_types = 1);

namespace Dark\PW\Schedule;

/**
 * @covers \Dark\PW\Schedule\User
 * @uses \Dark\PW\Schedule\UserNickname
 * @uses \Dark\PW\Schedule\UserEmail
 */
class UserTest extends \PHPUnit_Framework_TestCase
{

    public function testUserWithValidNicknameAndValidEmailCanBeCreated()
    {
        $nickname = new UserNickname('nick');
        $email = new UserEmail('mail@mail.de');
        
        $user = new User($nickname, $email);

        $this->assertSame('nick', $user->getNickname());
        $this->assertSame('mail@mail.de', $user->getEmail());
    }

}