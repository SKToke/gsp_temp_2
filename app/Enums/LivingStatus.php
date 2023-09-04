<?php

namespace App\Enums;

enum LivingStatus: string
{
    case Alive = 'Alive';
    case Dead = 'Dead';
    case Separated = 'Separated';
}
