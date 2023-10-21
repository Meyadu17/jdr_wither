<?php

namespace App\Entity\DonsAuCombat;

enum TypeDon : string
{
    case ARME = 'Attaque avec une arme';
    case SIGNE = 'Attaque avec un signe';
    case ANCIEN = 'Don des anciennes races';
}
