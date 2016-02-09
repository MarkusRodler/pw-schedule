<?php
declare(strict_types = 1);

namespace Dark\PW\Schedule;

use InvalidArgumentException;

final class UserEmail
{
    /**
     * @var string
     */
    private $email;

    public function __construct(string $email)
    {
        $trimmedEmail = trim($email);

        $this->ensureEmailIsNotEmpty($trimmedEmail);
        
        $this->ensureEmailIsValid($trimmedEmail);

        $this->email = $trimmedEmail;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @throws InvalidArgumentException
     */
    private function ensureEmailIsNotEmpty(string $email)
    {
        if (strlen($email) === 0) {
            throw new InvalidArgumentException('Empty email is not allowed');
        }
    }

    /**
     * @param string $email
     * @throws InvalidArgumentException
     */
    private function ensureEmailIsValid(string $email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidArgumentException('Invalid email');
        }
    }
}