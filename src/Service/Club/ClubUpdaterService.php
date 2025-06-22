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

    public function update(string $name, string $clubLogo, string $description, string $contact, string $hours, string $address, int $number_members, int $id): void
    {
        $club = $this->finder->find($id);

        $club->modify($name, $clubLogo, $description, $contact, $hours, $address, $number_members);

        $this->repository->update($club);
    }
}