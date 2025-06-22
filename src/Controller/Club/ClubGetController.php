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
            "clubLogo" => $club->clubLogo(),
            "description" => $club->description(),
            "number_members" => $club->number_members(),
        ], true);
    }
}
