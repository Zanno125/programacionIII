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

    public function update(string $name, string $address, int $number_members, int $id): void
    {
        $club = $this->finder->find($id);

        $club->modify($name, $address, $number_members);

        $this->repository->update($club);
    }
}