<?php

namespace App\Entity\Stuff;

enum Type : string
{
    case EPEE = 'Épée';
    case LAME = 'Lame courte';
    case HACHE = 'Hache';
    case CONTONDANTE = 'Arme contondante';
    case HAST = 'Arme d\'hast';
    case BATON = 'Bâton';
    case JET = 'Arme de jet';
    case ARC = 'Arc';
    case ARBALETE = 'Arbalète';
    case PROJECTILE = 'Projectile';
}
