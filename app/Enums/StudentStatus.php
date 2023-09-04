<?php

namespace App\Enums;

enum StudentStatus
{
    case Running;
    case Ongoing;
    case Completed;
    case Surrender;
    case Postponed;
    case Cancelled;
    case Death;
    case Transfer;
}
