<?php 

namespace Src\Service\Club;

use Src\Entity\Club\Club;
use Src\Infrastructure\Repository\Club\ClubRepository;

final readonly class ClubCreatorService {
    private ClubRepository $repository;

    public function __construct() {
        $this->repository = new ClubRepository();
    }

    public function create(string $name, string $description, string $address, string $activities, string $hours): void
    {
        $club = Club::create($name, $description, $address, $activities, $hours);
        $this->repository->insert($club);
    }
}