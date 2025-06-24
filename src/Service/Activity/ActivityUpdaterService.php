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

    public function update(string $name, string $nameActivity1, string $description1, string $childrenSchedules1, string $youthSchedules1,
    string $nameActivity2, string $description2, string $childrenSchedules2, string $youthSchedules2,
    string $nameActivity3, string $description3, string $childrenSchedules3, string $youthSchedules3, int $id): void
    {
        $activity = $this->finder->find($id);

        $activity->modify($name, $nameActivity1, $description1, $childrenSchedules1, $youthSchedules1,
        $nameActivity2, $description2, $childrenSchedules2, $youthSchedules2,
        $nameActivity3, $description3, $childrenSchedules3, $youthSchedules3);

        $this->repository->update($activity);
    }
}