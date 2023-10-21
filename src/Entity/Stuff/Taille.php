<?php

namespace App\Entity\Stuff;

enum Taille: string
{
    case MINUSCULE = 'Minuscule';
    case PETITE = 'Petite';
    case GRANDE = 'Grande';
    case GEANT = 'Impossible à cacher';
}
