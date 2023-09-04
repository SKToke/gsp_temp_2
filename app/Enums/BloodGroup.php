<?php

namespace App\Enums;

enum BloodGroup: string
{
    case Unknown = 'Unknown';
    case APositive = 'A+';
    case ANegative = 'A-';
    case ABPositive = 'AB+';
    case ABNegative = 'AB-';
    case BPositive = 'B+';
    case BNegative = 'B-';
    case OPositive = 'O+';
    case ONegative = 'O-';
    case H = 'H';
}
