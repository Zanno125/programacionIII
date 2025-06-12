<?php 

declare(strict_types = 1);

namespace Src\Infrastructure\Repository\Club;

use Src\Entity\Club\Club;

interface ClubRepositoryInterface {
    public function find(int $id): ?Club;

    /** @return Club[] */
    public function search(): array;

    public function insert(Club $club): void;

    public function update(Club $club): void;
}