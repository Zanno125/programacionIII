<?php 

use Src\Service\Club\ClubsSearcherService;

final readonly class ClubsGetController {
    private ClubsSearcherService $service;

    public function __construct() {
        $this->service = new ClubsSearcherService();
    }

    public function start(): void 
    {
        $response = $this->service->search();
        echo json_encode($this->filterResponses($response), true);
    }

    private function filterResponses(array $responses): array
    {
        $result = [];

        foreach ($responses as $response) {
            $result[] = [
                "id" => $response->id(),
                "name" => $response->name(),
                "description" => $response->description(),
                "address" => $response->address(),
                "activities" => $response->activities(),
                "hours" => $response->hours()
            ];
        }

        return $result;
    }
}
