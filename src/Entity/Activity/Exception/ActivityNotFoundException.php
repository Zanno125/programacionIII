<?php 

namespace Src\Entity\Activity\Exception;

use Exception;

final class ActivityNotFoundException extends Exception {
    public function __construct(int $id) {
        parent::__construct('No se encontro la actividad con id: '.$id);
    }
}