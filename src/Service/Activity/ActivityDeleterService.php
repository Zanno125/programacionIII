<?php 

namespace Src\Service\Activity;

use Src\Infrastructure\Repository\Activity\ActivityRepository;

final readonly class ActivityDeleterService {
    private ActivityRepository $repository;
    private ActivityFinderService $finder;

    public function __construct() {
        $this->repository = new ActivityRepository();
        $this->finder = new ActivityFinderService();
    }

    public function delete(int $id): void
    {
        $activity = $this->finder->find($id);

        $activity->delete();

        $this->repository->update($activity);
    }
}