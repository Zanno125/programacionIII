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
        $address = ControllerUtils::getPost("address");
        $number_members = ControllerUtils::getPost("number_members");

        $this->service->update($name, $address, $number_members, $id);
    }
}