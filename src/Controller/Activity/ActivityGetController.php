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
            "id_club" => $activity->id_club(),
            "max_participants" => $activity->max_participants(),
        ], true);
    }
}
