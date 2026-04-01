<?php

namespace App\Services;

use App\Contracts\Report;

class UserReport implements Report
{
    public function generate()
    {
        return "User Report";
    }
}
