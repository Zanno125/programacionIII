<?php 

namespace Src\Entity\Club;

final class Club {

    public function __construct(
        private readonly ?int $id,
        private string $name,
        private string $clubLogo,
        private string $description,
        private int $number_members, //no se usa
        private bool $deleted
    ) {
    }

    public static function create(string $name, string $clubLogo, string $description, int $number_members): self
    {
        return new self(null, $name, $clubLogo, $description, $number_members, false);
    }

    public function modify(string $name, string $clubLogo, string $description, int $number_members): void
    {
        $this->name = $name;
        $this->clubLogo = $clubLogo;
        $this->description = $description;
        $this->number_members = $number_members;
    }

    public function delete(): void
    {
        $this->deleted = true;
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function clubLogo(): string
    {
        return $this->clubLogo;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function number_members(): int
    {
        return $this->number_members;
    }

    public function isDeleted(): int
    {
        return $this->deleted ? 1 : 0;
    }
}