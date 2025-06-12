<?php 

namespace Src\Service\Activity;

use Src\Infrastructure\Repository\Activity\ActivityRepository;

final readonly class ActivitiesSearcherService {
    private ActivityRepository $repository;

    public function __construct() {
        $this->repository = new ActivityRepository();
    }

    public function search(): array
    {
        return $this->repository->search();
    }
}