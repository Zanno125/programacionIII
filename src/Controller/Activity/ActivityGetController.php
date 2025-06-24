<?php 

use Src\Service\Activity\ActivityFinderService;

final readonly class ActivityGetController {
    private ActivityFinderService $service;

    public function __construct() {
        $this->service = new ActivityFinderService();
    }

    public function start(int $id): void 
    {
        $activity = $this->service->find($id);

        echo json_encode([
            "id" => $activity->id(),
            "name" => $activity->name(),
            "nameActivity1" => $activity->nameActivity1(),
            "description1" => $activity->description1(),
            "childrenSchedules1" => $activity->childrenSchedules1(),
            "youthSchedules1" => $activity->youthSchedules1(),
            "nameActivity2" => $activity->nameActivity2(),
            "description2" => $activity->description2(),
            "childrenSchedules2" => $activity->childrenSchedules2(),
            "youthSchedules2" => $activity->youthSchedules2(),
            "nameActivity3" => $activity->nameActivity3(),
            "description3" => $activity->description3(),
            "childrenSchedules3" => $activity->childrenSchedules3(),
            "youthSchedules3" => $activity->youthSchedules3(),
        ], true);
    }
}
