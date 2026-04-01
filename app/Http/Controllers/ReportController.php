<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Tag;

class ReportController extends Controller
{
    public function __construct(
        #[Tag('reports')] protected iterable $reports
    ) {}

    public function index()
    {
        return collect($this->reports)->map(fn($r) => $r->generate());
    }
}
