<?php

namespace App\Services;

use App\Contracts\Report;

class SalesReport implements Report
{
    public function generate()
    {
        return "Sales Report";
    }
}
