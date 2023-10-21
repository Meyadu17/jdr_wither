<?php

namespace App\Entity\DonsAuCombat;

enum Element : string
{
    case MIXTE = 'Mixte';
    case AIR = 'Air';
    case EAU = 'Eau';
    case TERRE = 'Terre';
    case FEU = 'Feu';
}
