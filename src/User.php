<?php
declare(strict_types = 1);

namespace Dark\PW\Schedule;

class User
{
    /**
     * @var UserNickname
     */
    private $nickname;

    /**
     * @var UserEmail
     */
    private $email;

    public function __construct(UserNickname $nickname, UserEmail $email)
    {
        $this->nickname = $nickname;
        $this->email = $email;
    }

    public function getNickname(): string
    {
        return $this->nickname->getName();
    }

    public function getEmail(): string
    {
        return $this->email->getEmail();
    }

}