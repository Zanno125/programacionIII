<?php 

namespace Src\Entity\Club;

final class Club {

    public function __construct(
        private readonly ?int $id,
        private string $name,
        private string $clubLogo,
        private string $description,
        private string $contact,
        private string $hours,
        private string $address,
        private int $number_members, //no se usa
        private bool $deleted
    ) {
    }

    public static function create(string $name, string $clubLogo, string $description, string $contact, string $hours, string $address, int $number_members): self
    {
        return new self(null, $name, $clubLogo, $description, $contact, $hours, $address, $number_members, false);
    }

    public function modify(string $name, string $clubLogo, string $description, string $contact, string $hours, string $address, int $number_members): void
    {
        $this->name = $name;
        $this->clubLogo = $clubLogo;
        $this->description = $description;
        $this->contact = $contact;
        $this->hours = $hours;
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

    public function clubLogo(): string
    {
        return $this->clubLogo;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function contact(): string
    {
        return $this->contact;
    }

    public function hours(): string
    {
        return $this->hours;
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