<?php

use Src\Utils\ControllerUtils;
use Src\Service\Club\ClubCreatorService;

final readonly class ClubPostController {
    private ClubCreatorService $service;

    public function __construct() {
        $this->service = new ClubCreatorService();
    }

    public function start(): void
    {
        $name = ControllerUtils::getPost("name");
        $description = ControllerUtils::getPost("description");
        $address = ControllerUtils::getPost("address");
        $activities = ControllerUtils::getPost("activities");
        $hours = ControllerUtils::getPost("hours");
        
        $this->service->create($name, $description, $address, $activities, $hours);
    }
}