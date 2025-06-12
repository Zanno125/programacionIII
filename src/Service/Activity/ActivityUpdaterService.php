<?php 

namespace Src\Service\Activity;

use Src\Infrastructure\Repository\Activity\ActivityRepository;

final readonly class ActivityUpdaterService {
    private ActivityRepository $repository;
    private ActivityFinderService $finder;

    public function __construct() {
        $this->repository = new ActivityRepository();
        $this->finder = new ActivityFinderService();
    }

    public function update(string $name, int $id_club, int $max_participants, int $id): void
    {
        $activity = $this->finder->find($id);

        $activity->modify($name, $id_club, $max_participants);

        $this->repository->update($activity);
    }
}