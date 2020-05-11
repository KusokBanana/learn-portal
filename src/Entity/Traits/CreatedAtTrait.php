<?php

namespace App\Entity\Traits;

trait CreatedAtTrait
{
    protected \DateTime $createdAt;

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }
}
