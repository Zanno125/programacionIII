<?php 

namespace Src\Entity\Activity;

final class Activity {

    public function __construct(
        private readonly ?int $id,
        private string $name,
        private int $id_club,
        private int $max_participants,
        private bool $deleted
    ) {
    }

    public static function create(string $name, int $id_club, int $max_participants): self
    {
        return new self(null, $name, $id_club, $max_participants, false);
    }

    public function modify(string $name, int $id_club, int $max_participants): void
    {
        $this->name = $name;
        $this->id_club = $id_club;
        $this->max_participants= $max_participants;
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

    public function id_club(): int
    {
        return $this->id_club;
    }

    
    public function max_participants(): int
    {
        return $this->max_participants;
    }

    public function isDeleted(): int
    {
        return $this->deleted ? 1 : 0;
    }
}