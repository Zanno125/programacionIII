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
        $nameActivity1 = ControllerUtils::getPost("nameActivity1");
        $description1 = ControllerUtils::getPost("description1");
        $childrenSchedules1 = ControllerUtils::getPost("childrenSchedules1");
        $youthSchedules1 = ControllerUtils::getPost("youthSchedules1");
        $nameActivity2 = ControllerUtils::getPost("nameActivity2");
        $description2 = ControllerUtils::getPost("description2");
        $childrenSchedules2 = ControllerUtils::getPost("childrenSchedules2");
        $youthSchedules2 = ControllerUtils::getPost("youthSchedules2");
        $nameActivity3 = ControllerUtils::getPost("nameActivity3");
        $description3 = ControllerUtils::getPost("description3");
        $childrenSchedules3 = ControllerUtils::getPost("childrenSchedules3");
        $youthSchedules3 = ControllerUtils::getPost("youthSchedules3");

        $this->service->update($name, $nameActivity1, $description1, $childrenSchedules1, $youthSchedules1,
        $nameActivity2, $description2, $childrenSchedules2, $youthSchedules2,
        $nameActivity3, $description3, $childrenSchedules3, $youthSchedules3, $id);
    }
}