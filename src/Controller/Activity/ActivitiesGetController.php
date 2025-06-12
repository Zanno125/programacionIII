<?php 

use Src\Service\Activity\ActivitiesSearcherService;

final readonly class ActivitiesGetController {
    private ActivitiesSearcherService $service;

    public function __construct() {
        $this->service = new ActivitiesSearcherService();
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
                "id_club" => $response->id_club(),
                "max_participants" => $response -> max_participants()
            ];
        }

        return $result;
    }
}
