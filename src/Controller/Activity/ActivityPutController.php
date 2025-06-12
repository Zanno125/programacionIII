<?php 

use Src\Utils\ControllerUtils;
use Src\Service\Activity\ActivityUpdaterService;

final readonly class ActivityPutController {
    private ActivityUpdaterService $service;

    public function __construct() {
        $this->service = new ActivityUpdaterService();
    }

    public function start(int $id): void
    {
        $name = ControllerUtils::getPost("name");
        $id_club = ControllerUtils::getPost("id_club");
        $max_participants = ControllerUtils ::getPost("max_participants");

        $this->service->update($name, $id_club, $max_participants, $id);
    }
}