<?php 

declare(strict_types = 1);

namespace Src\Infrastructure\Repository\Activity;

use Src\Entity\Activity\Activity;

interface ActivityRepositoryInterface {
    public function find(int $id): ?Activity;

    /** @return Activity[] */
    public function search(): array;

    public function insert(Activity $activity): void;

    public function update(Activity $activity): void;
}