<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StudentsExport implements FromView
{
    public function __construct(protected $report, protected $data)
    {
    }

    public function view(): View
    {
        return view($this->report, ['data' => $this->data]);
    }
}
