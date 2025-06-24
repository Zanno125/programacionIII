<?php 

declare(strict_types = 1);

namespace Src\Infrastructure\Repository\Club;

use Src\Infrastructure\PDO\PDOManager;
use Src\Entity\Club\Club;

final readonly class ClubRepository extends PDOManager implements ClubRepositoryInterface {

    public function find(int $id): ?Club 
    {
        $query = "SELECT * FROM club WHERE id = :id AND deleted = 0";

        $parameters = [
            "id" => $id
        ];

        $result = $this->execute($query, $parameters);
        
        return $this->primitiveToClub($result[0] ?? null);
    }

    public function search(): array
    {
        $query = "SELECT * FROM club WHERE deleted = 0";
        $results = $this->execute($query);

        $clubResults = [];
        foreach ($results as $result) {
            $clubResults[] = $this->primitiveToClub($result);
        }

        return $clubResults;
    }

    public function insert(Club $club): void
    {
        $query = "INSERT INTO club (name, description, address, activities, hours, deleted) VALUES (:name, :description, :address, :activities, :hours, :deleted) ";

        $parameters = [
            "name" => $club->name(),
            "description" => $club->description(),
            "address" => $club->address(),
            "activities" => $club->activities(),
            "hours" => $club->hours(),
            "deleted" => $club->isDeleted()
        ];

        $this->execute($query, $parameters);
    }

    public function update(Club $club): void
    {
        $query = <<<UPDATE_QUERY
                        UPDATE
                            club
                        SET
                            name = :name,
                            description = :description,
                            address = :address,
                            activities = :activities,
                            hours = :hours,
                            deleted = :deleted
                        WHERE
                            id = :id
                    UPDATE_QUERY;

        $parameters = [
            "name" => $club->name(),
            "description" => $club->description(),
            "address" => $club->address(),
            "activities" => $club->activities(),
            "hours" => $club->hours(),
            "deleted" => $club->isDeleted(),
            "id" => $club->id()
        ];

        $this->execute($query, $parameters);
    }

    private function primitiveToClub(?array $primitive): ?Club
    {
        if ($primitive === null) {
            return null;
        }

        return new Club(
            $primitive["id"],
            $primitive["name"],
            $primitive["description"],
            $primitive["address"],
            $primitive["activities"],
            $primitive["hours"],
            (bool) $primitive["deleted"]
        );
    }
}