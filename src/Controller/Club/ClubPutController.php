<?php 

use Src\Utils\ControllerUtils;
use Src\Service\Club\ClubUpdaterService;

final readonly class ClubPutController {
    private ClubUpdaterService $service;

    public function __construct() {
        $this->service = new ClubUpdaterService();
    }

    public function start(int $id): void
    {
        $name = ControllerUtils::getPost("name");
        $description = ControllerUtils::getPost("description");
        $address = ControllerUtils::getPost("address");
        $activities = ControllerUtils::getPost("activities");
        $hours = ControllerUtils::getPost("hours");

        $this->service->update($name, $description, $address, $activities, $hours, $id);
    }
}