<?php

namespace App\Entities;

class GameListEntity
{
    protected int $id;
    protected ?string $name;
    protected ?string $link;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }
}
