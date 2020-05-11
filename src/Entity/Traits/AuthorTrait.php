<?php

namespace App\Entity\Traits;

use App\Entity\User;

trait AuthorTrait
{
    private User $author;

    public function getAuthor(): User
    {
        return $this->author;
    }
}
