<?php 

namespace Src\Entity\Club;

final class Club {

    public function __construct(
        private readonly ?int $id,
        private string $name,
        private string $address,
        private int $number_members,
        private bool $deleted
    ) {
    }

    public static function create(string $name, string $address, int $number_members): self
    {
        return new self(null, $name, $address, $number_members, false);
    }

    public function modify(string $name, string $address, int $number_members): void
    {
        $this->name = $name;
        $this->address = $address;
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

    public function address(): string
    {
        return $this->address;
    }

    public function number_members(): string
    {
        return $this->number_members;
    }

    public function isDeleted(): int
    {
        return $this->deleted ? 1 : 0;
    }
}