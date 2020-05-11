<?php

namespace App\Entity\Traits;

use Ramsey\Uuid\UuidInterface;

trait UuidTrait
{
    private UuidInterface $id;

    public function getId(): UuidInterface
    {
        return $this->id;
    }
}
