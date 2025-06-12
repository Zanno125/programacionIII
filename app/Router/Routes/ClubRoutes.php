<?php 

final readonly class ClubRoutes {
  public static function getRoutes(): array {
    return [
      [
        "name" => "club_get",
        "url" => "/clubs",
        "controller" => "Club/ClubGetController.php",
        "method" => "GET",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
      ],
      [
        "name" => "clubs_get",
        "url" => "/clubs",
        "controller" => "Club/ClubsGetController.php",
        "method" => "GET"
      ],
      [
        "name" => "club_post",
        "url" => "/clubs",
        "controller" => "Club/ClubPostController.php",
        "method" => "POST"
      ],
      [
        "name" => "club_put",
        "url" => "/clubs",
        "controller" => "Club/ClubPutController.php",
        "method" => "PUT",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
      ],
      [
        "name" => "club_delete",
        "url" => "/clubs",
        "controller" => "Club/ClubDeleteController.php",
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
