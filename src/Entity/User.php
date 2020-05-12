<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTrait;
use Assert\Assertion;

abstract class User
{
    use CreatedAtTrait;

    public const GENDER_MALE = 'M';
    public const GENDER_FEMALE = 'F';

    protected string $login;
    protected string $email;
    protected string $name;
    protected ?string $gender = null;

    public function __construct(string $email, string $name, ?string $gender)
    {
        Assertion::email($email);
        Assertion::inArray($gender, [self::GENDER_MALE, self::GENDER_FEMALE]);

        $this->createdAt = new \DateTime();

        $this->login  = $this->extractLogin($email);
        $this->email  = $email;
        $this->name   = $name;
        $this->gender = $gender;
    }

    private function extractLogin(string $email): string
    {
        [$login] = explode('@', $email);
        return $login;
    }
}
