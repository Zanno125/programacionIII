<?php 

namespace Src\Service\Club;

use Src\Entity\Club\Club;
use Src\Infrastructure\Repository\Club\ClubRepository;

final readonly class ClubCreatorService {
    private ClubRepository $repository;

    public function __construct() {
        $this->repository = new ClubRepository();
    }

    public function create(string $name, string $address, int $number_members): void
    {
        $club = Club::create($name, $address, $number_members);
        $this->repository->insert($club);
    }
}