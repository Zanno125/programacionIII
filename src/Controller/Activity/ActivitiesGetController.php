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
                "nameActivity1" => $response->nameActivity1(),
                "description1" => $response->description1(),
                "childrenSchedules1" => $response->childrenSchedules1(),
                "youthSchedules1" => $response->youthSchedules1(),
                "nameActivity2" => $response->nameActivity2(),
                "description2" => $response->description2(),
                "childrenSchedules2" => $response->childrenSchedules2(),
                "youthSchedules2" => $response->youthSchedules2(),
                "nameActivity3" => $response->nameActivity3(),
                "description3" => $response->description3(),
                "childrenSchedules3" => $response->childrenSchedules3(),
                "youthSchedules3" => $response->youthSchedules3()
            ];
        }

        return $result;
    }
}
