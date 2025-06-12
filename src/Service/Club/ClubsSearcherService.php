<?php 

namespace Src\Service\Club;

use Src\Infrastructure\Repository\Club\ClubRepository;

final readonly class ClubsSearcherService {
    private ClubRepository $repository;

    public function __construct() {
        $this->repository = new ClubRepository();
    }

    public function search(): array
    {
        return $this->repository->search();
    }
}