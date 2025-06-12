<?php 


declare(strict_types = 1);

namespace Src\Service\Activity;

use Src\Entity\Activity\Activity;
use Src\Entity\Activity\Exception\ActivityNotFoundException;
use Src\Infrastructure\Repository\Activity\ActivityRepository;

final readonly class ActivityFinderService {

    private ActivityRepository $activityRepository;

    public function __construct() 
    {
        $this->activityRepository = new ActivityRepository();
    }

    public function find(int $id): Activity
    {
        $activity = $this->activityRepository->find($id);

        if ($activity === null) {
            throw new ActivityNotFoundException($id);
        }

        return $activity;
    }

}
