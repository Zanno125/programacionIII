<?php 

namespace Src\Entity\Club;

final class Club {

    public function __construct(
        private readonly ?int $id,
        private string $name,
        private string $description,
        private string $address,
        private string $activities,
        private string $hours,
        private bool $deleted
    ) {
    }

    public static function create(string $name, string $description, string $address, string $activities, string $hours): self
    {
        return new self(null, $name, $description, $address, $activities, $hours, false);
    }

    public function modify(string $name, string $description, $address, $activities, $hours): void
    {
        $this->name = $name;
        $this->description = $description;
        $this->address = $address;
        $this->activities = $activities;
        $this->hours = $hours;
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

    public function description(): string
    {
        return $this->description;
    }

    public function address(): string
    {
        return $this->address;
    }

    public function activities(): string
    {
        return $this->activities;
    }

    public function hours(): string
    {
        return $this->hours;
    }

    public function isDeleted(): int
    {
        return $this->deleted ? 1 : 0;
    }
}