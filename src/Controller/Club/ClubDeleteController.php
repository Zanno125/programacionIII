<?php 

use Src\Service\Club\ClubDeleterService;

final readonly class ClubDeleteController {
    private ClubDeleterService $service;

    public function __construct() {
        $this->service = new ClubDeleterService();
    }

    public function start(int $id): void
    {
        $this->service->delete($id);
    }
}