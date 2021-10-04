<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\CategoriesExport;
use App\Imports\CategoriesImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportExportController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('pages.admin-import');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new CategoriesExport, 'Categories.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new CategoriesImport,request()->file('file'));
        return back();
    }

}
