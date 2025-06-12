<?php 

namespace Src\Service\Club;

use Src\Infrastructure\Repository\Club\ClubRepository;

final readonly class ClubDeleterService {
    private ClubRepository $repository;
    private ClubFinderService $finder;

    public function __construct() {
        $this->repository = new ClubRepository();
        $this->finder = new ClubFinderService();
    }

    public function delete(int $id): void
    {
        $club = $this->finder->find($id);

        $club->delete();

        $this->repository->update($club);
    }
}