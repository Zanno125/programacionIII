<?php 

namespace Src\Service\Club;

use Src\Infrastructure\Repository\Club\ClubRepository;

final readonly class ClubUpdaterService {
    private ClubRepository $repository;
    private ClubFinderService $finder;

    public function __construct() {
        $this->repository = new ClubRepository();
        $this->finder = new ClubFinderService();
    }

    public function update(string $name, string $description, string $address, string $activities, string $hours, int $id): void
    {
        $club = $this->finder->find($id);

        $club->modify($name, $description, $address, $activities, $hours);

        $this->repository->update($club);
    }
}