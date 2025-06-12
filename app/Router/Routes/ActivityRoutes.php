<?php 

final readonly class ActivityRoutes {
  public static function getRoutes(): array {
    return [
      [
        "name" => "activity_get",
        "url" => "/activities",
        "controller" => "Activity/ActivityGetController.php",
        "method" => "GET",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
      ],
      [
        "name" => "activities_get",
        "url" => "/activities",
        "controller" => "Activity/ActivitiesGetController.php",
        "method" => "GET"
      ],
      [
        "name" => "activity_post",
        "url" => "/activities",
        "controller" => "Activity/ActivityPostController.php",
        "method" => "POST"
      ],
      [
        "name" => "activity_put",
        "url" => "/activities",                      
        "controller" => "Activity/ActivityPutController.php",
        "method" => "PUT",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
      ],
      [
        "name" => "activity_delete",
        "url" => "/activities",
        "controller" => "Activity/ActivityDeleteController.php",
        "method" => "DELETE",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
      ]
    ];
  }
}
