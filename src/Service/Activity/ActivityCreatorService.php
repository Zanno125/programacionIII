<?php 

namespace Src\Service\Activity;

use Src\Entity\Activity\Activity;
use Src\Infrastructure\Repository\Activity\ActivityRepository;

final readonly class ActivityCreatorService {
    private ActivityRepository $repository;

    public function __construct() {
        $this->repository = new ActivityRepository();
    }

    public function create(string $name, int $id_club, int $max_participants): void
    {
        $activity = Activity::create($name, $id_club, $max_participants);
        $this->repository->insert($activity);
    }
}