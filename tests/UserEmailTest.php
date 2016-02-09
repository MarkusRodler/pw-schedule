<?php
declare(strict_types = 1);

namespace Dark\PW\Schedule;

use InvalidArgumentException;
use PHPUnit_Framework_TestCase;

/**
 * @covers \Dark\PW\Schedule\UserEmail
 */
class UserEmailTest extends PHPUnit_Framework_TestCase
{

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Empty email is not allowed
     */
    public function testEmailCannotBeEmpty()
    {
        new UserEmail('');
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Empty email is not allowed
     */
    public function testEmailCannotContainOnlySpaces()
    {
        new UserEmail('   ');
    }

    public function testEmailCanBeRetrieved()
    {
        $userEmail = new UserEmail('mail@mail.de');

        $this->assertSame('mail@mail.de', (string) $userEmail);
    }

    public function testWhitespacesWillBeTrimmed()
    {
        $userEmail = new UserEmail('  mail@mail.de  ');

        $this->assertSame('mail@mail.de', (string) $userEmail);
    }
    
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Invalid email
     */
    public function testDoesNotAcceptInvalidEmail()
    {
        new UserEmail('wrongemail');
    }
}