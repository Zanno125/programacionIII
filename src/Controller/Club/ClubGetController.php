<?php 

use Src\Service\Club\ClubFinderService;

final readonly class ClubGetController {
    private ClubFinderService $service;

    public function __construct() {
        $this->service = new ClubFinderService();
    }

    public function start(int $id): void 
    {
        $club = $this->service->find($id);

        echo json_encode([
            "id" => $club->id(),
            "name" => $club->name(),
            "description" => $club->description(),
            "address" => $club->address(),
            "activities" => $club->activities(),
            "hours" => $club->hours(),
        ], true);
    }
}
