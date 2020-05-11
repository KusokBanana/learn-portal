<?php

namespace App\Entity\Traits;

trait DescriptionTrait
{
    private string $description;

    public function getDescription(): string
    {
        return $this->description;
    }
}
