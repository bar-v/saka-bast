<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arsip;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ManajemenExport;

class ManajemenController extends Controller
{
    public function export()
    {
        return Excel::download(new ManajemenExport, 'manajemen-arsip.xlsx');
    }
}
