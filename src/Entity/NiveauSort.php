<?php

namespace App\Entity;

enum NiveauSort : string
{
    case NOVICE = 'Sort de novice';
    case COMPAGNON = 'Sort de compagnon';
    case MAITRE = 'Sort de maitre';
}
