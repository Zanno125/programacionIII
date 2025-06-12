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
        $query = "INSERT INTO club (name, address, number_members, deleted) VALUES (:name, :address, :number_members, :deleted) ";

        $parameters = [
            "name" => $club->name(),
            "address" => $club->address(),
            "number_members" => $club->number_members(),
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
                            address = :address,
                            number_members = :number_members,
                            deleted = :deleted
                        WHERE
                            id = :id
                    UPDATE_QUERY;

        $parameters = [
            "name" => $club->name(),
            "address" => $club->address(),
            "number_members" => $club->number_members(),
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
            $primitive["address"],
            $primitive["number_members"],
            (bool) $primitive["deleted"]
        );
    }
}