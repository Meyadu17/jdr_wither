<?php

namespace App\Entity\DonsAuCombat;

enum NiveauSort : string
{
    case NOVICE = 'Sort de novice';
    case COMPAGNON = 'Sort de compagnon';
    case MAITRE = 'Sort de maitre';
}
