<?php 

use Src\Service\Activity\ActivityDeleterService;

final readonly class ActivityDeleteController {
    private ActivityDeleterService $service;

    public function __construct() {
        $this->service = new ActivityDeleterService();
    }

    public function start(int $id): void
    {
        $this->service->delete($id);
    }
}