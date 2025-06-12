<?php 


declare(strict_types = 1);

namespace Src\Service\Club;

use Src\Entity\Club\Club;
use Src\Entity\Club\Exception\ClubNotFoundException;
use Src\Infrastructure\Repository\Club\ClubRepository;

final readonly class ClubFinderService {

    private ClubRepository $clubRepository;

    public function __construct() 
    {
        $this->clubRepository = new ClubRepository();
    }

    public function find(int $id): Club
    {
        $club = $this->clubRepository->find($id);

        if ($club === null) {
            throw new ClubNotFoundException($id);
        }

        return $club;
    }

}
