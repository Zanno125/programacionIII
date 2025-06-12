<?php

use Src\Utils\ControllerUtils;
use Src\Service\Activity\ActivityCreatorService;

final readonly class ActivityPostController {
    private ActivityCreatorService $service;

    public function __construct() {
        $this->service = new ActivityCreatorService();
    }

    public function start(): void
    {
        $name = ControllerUtils::getPost("name");
        $id_club = ControllerUtils::getPost("id_club");
        $max_participants = ControllerUtils ::getPost("max_participants");

        $this->service->create($name, $id_club, $max_participants);
    }
}