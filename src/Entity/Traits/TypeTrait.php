<?php

namespace App\Entity\Traits;

trait TypeTrait
{
    private string $type;

    public function getType(): string
    {
        return $this->type;
    }
}
