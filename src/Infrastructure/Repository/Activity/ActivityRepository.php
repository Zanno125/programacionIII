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
        $query = "INSERT INTO activity (name, nameActivity1, description1, childrenSchedules1, youthSchedules1,
        nameActivity2, description2, childrenSchedules2, youthSchedules2,
        nameActivity3, description3, childrenSchedules3, youthSchedules3, deleted) VALUES (:name, :nameActivity1, :description1, :childrenSchedules1, :youthSchedules1,
        :nameActivity2, :description2, :childrenSchedules2, :youthSchedules2,
        :nameActivity3, :description3, :childrenSchedules3, :youthSchedules3, :deleted) ";

        $parameters = [
            "name" => $activity->name(),
            "nameActivity1" => $activity->nameActivity1(),
            "description1" => $activity->description1(),
            "childrenSchedules1" => $activity->childrenSchedules1(),
            "youthSchedules1" => $activity->youthSchedules1(),
            "nameActivity2" => $activity->nameActivity2(),
            "description2" => $activity->description2(),
            "childrenSchedules2" => $activity->childrenSchedules2(),
            "youthSchedules2" => $activity->youthSchedules2(),
            "nameActivity3" => $activity->nameActivity3(),
            "description3" => $activity->description3(),
            "childrenSchedules3" => $activity->childrenSchedules3(),
            "youthSchedules3" => $activity->youthSchedules3(),
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
                            nameActivity1 = :nameActivity1,
                            description1 = :description1,
                            childrenSchedules1 = :childrenSchedules1,
                            youthSchedules1 = :youthSchedules1,
                            nameActivity2 = :nameActivity2,
                            description2 = :description2,
                            childrenSchedules2 = :childrenSchedules2,
                            youthSchedules2 = :youthSchedules2,
                            nameActivity3 = :nameActivity3,
                            description3 = :description3,
                            childrenSchedules3 = :childrenSchedules3,
                            youthSchedules3 = :youthSchedules3,
                            deleted = :deleted
                        WHERE
                            id = :id
                    UPDATE_QUERY;

        $parameters = [
            "name" => $activity->name(),
            "nameActivity1" => $activity->nameActivity1(),
            "description1" => $activity->description1(),
            "childrenSchedules1" => $activity->childrenSchedules1(),
            "youthSchedules1" => $activity->youthSchedules1(),
            "nameActivity2" => $activity->nameActivity2(),
            "description2" => $activity->description2(),
            "childrenSchedules2" => $activity->childrenSchedules2(),
            "youthSchedules2" => $activity->youthSchedules2(),
            "nameActivity3" => $activity->nameActivity3(),
            "description3" => $activity->description3(),
            "childrenSchedules3" => $activity->childrenSchedules3(),
            "youthSchedules3" => $activity->youthSchedules3(),
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
            $primitive["nameActivity1"],
            $primitive["description1"],
            $primitive["childrenSchedules1"],
            $primitive["youthSchedules1"],
            $primitive["nameActivity2"],
            $primitive["description2"],
            $primitive["childrenSchedules2"],
            $primitive["youthSchedules2"],
            $primitive["nameActivity3"],
            $primitive["description3"],
            $primitive["childrenSchedules3"],
            $primitive["youthSchedules3"],
            (bool) $primitive["deleted"]
        );
    }
}