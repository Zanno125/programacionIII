<?php 

namespace Src\Entity\Club\Exception;

use Exception;

final class ClubNotFoundException extends Exception {
    public function __construct(int $id) {
        parent::__construct('No se encontro el club correspondiente con id: '.$id);
    }
}