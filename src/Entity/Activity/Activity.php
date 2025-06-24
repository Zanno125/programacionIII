<?php 

namespace Src\Entity\Activity;

final class Activity {

    public function __construct(
        private readonly ?int $id,
        private string $name,
        private string $nameActivity1,
        private string $description1,
        private string $childrenSchedules1,
        private string $youthSchedules1,
        private string $nameActivity2,
        private string $description2,
        private string $childrenSchedules2,
        private string $youthSchedules2,
        private string $nameActivity3,
        private string $description3,
        private string $childrenSchedules3,
        private string $youthSchedules3,
        private bool $deleted
    ) {
    }

    public static function create(string $name, string $nameActivity1, string $description1, string $childrenSchedules1, string $youthSchedules1,
    string $nameActivity2, string $description2, string $childrenSchedules2, string $youthSchedules2,
    string $nameActivity3, string $description3, string $childrenSchedules3, string $youthSchedules3): self
    {
        return new self(null, $name, $nameActivity1, $description1, $childrenSchedules1, $youthSchedules1,
     $nameActivity2, $description2, $childrenSchedules2, $youthSchedules2,
     $nameActivity3, $description3, $childrenSchedules3, $youthSchedules3, false);
    }

    public function modify(string $name, string $nameActivity1, string $description1, string $childrenSchedules1, string $youthSchedules1,
    string $nameActivity2, string $description2, string $childrenSchedules2, string $youthSchedules2,
    string $nameActivity3, string $description3, string $childrenSchedules3, string $youthSchedules3): void
    {
        $this->name = $name;
        $this->nameActivity1 = $nameActivity1;
        $this->description1 = $description1;
        $this->childrenSchedules1 = $childrenSchedules1;
        $this->youthSchedules1 = $youthSchedules1;
        $this->nameActivity2 = $nameActivity2;
        $this->description2 = $description2;
        $this->childrenSchedules2 = $childrenSchedules2;
        $this->youthSchedules2 = $youthSchedules2;
        $this->nameActivity3 = $nameActivity3;
        $this->description3 = $description3;
        $this->childrenSchedules3 = $childrenSchedules3;
        $this->youthSchedules3 = $youthSchedules3;
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

    public function nameActivity1(): string
    {
        return $this->nameActivity1;
    }

    public function description1(): string
    {
        return $this->description1;
    }

    public function childrenSchedules1(): string
    {
        return $this->childrenSchedules1;
    }

    public function youthSchedules1(): string
    {
        return $this->youthSchedules1;
    }

    public function nameActivity2(): string
    {
        return $this->nameActivity2;
    }

    public function description2(): string
    {
        return $this->description2;
    }

    public function childrenSchedules2(): string
    {
        return $this->childrenSchedules2;
    }

    public function youthSchedules2(): string
    {
        return $this->youthSchedules2;
    }

    public function nameActivity3(): string
    {
        return $this->nameActivity3;
    }

    public function description3(): string
    {
        return $this->description3;
    }

    public function childrenSchedules3(): string
    {
        return $this->childrenSchedules3;
    }

    public function youthSchedules3(): string
    {
        return $this->youthSchedules3;
    }

    public function isDeleted(): int
    {
        return $this->deleted ? 1 : 0;
    }
}