<?php 

declare(strict_types = 1);

namespace Src\Infrastructure\Repository\Activity;

use Src\Infrastructure\PDO\PDOManager;
use Src\Entity\Activity\Activity;

final readonly class ActivityRepository extends PDOManager implements ActivityRepositoryInterface {

    public function find(int $id): ?Activity 
    {
        $query = "SELECT * FROM activity WHERE id = :id AND deleted = 0";

        $parameters = [
            "id" => $id
        ];

        $result = $this->execute($query, $parameters);
        
        return $this->primitiveToActivity($result[0] ?? null);
    }

    public function search(): array
    {
        $query = "SELECT * FROM activity WHERE deleted = 0";
        $results = $this->execute($query);

        $activityResults = [];
        foreach ($results as $result) {
            $activityResults[] = $this->primitiveToActivity($result);
        }

        return $activityResults;
    }

    public function insert(Activity $activity): void
    {
        $query = "INSERT INTO activity (name, id_club, max_participants, deleted) VALUES (:name, :id_club,:max_participants, :deleted) ";

        $parameters = [
            "name" => $activity->name(),
            "id_club" => $activity->id_club(),
            "max_participants" => $activity->max_participants(),
            "deleted" => $activity->isDeleted()
        ];

        $this->execute($query, $parameters);
    }

    public function update(Activity $activity): void
    {
        $query = <<<UPDATE_QUERY
                        UPDATE
                            activity
                        SET
                            name = :name,
                            id_club = :id_club,
                            max_participants = :max_participants,
                            deleted = :deleted
                        WHERE
                            id = :id
                    UPDATE_QUERY;

        $parameters = [
            "name" => $activity->name(),
            "id_club" => $activity->id_club(),
            "max_participants" => $activity -> max_participants(),
            "deleted" => $activity->isDeleted(),
            "id" => $activity->id()
        ];

        $this->execute($query, $parameters);
    }

    private function primitiveToActivity(?array $primitive): ?Activity
    {
        if ($primitive === null) {
            return null;
        }

        return new Activity(
            $primitive["id"],
            $primitive["name"],
            $primitive["id_club"],
            $primitive["max_participants"],
            (bool) $primitive["deleted"]
        );
    }
}