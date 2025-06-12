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

        $address = ControllerUtils::getPost("address");
        
        $number_members = ControllerUtils::getPost("number_members");

        $this->service->create($name, $address, $number_members);
    }
}