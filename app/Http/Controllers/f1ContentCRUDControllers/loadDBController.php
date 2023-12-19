<?php

namespace App\Http\Controllers\f1ContentCRUDControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\F1_larav;

class loadDBController extends Controller
{
    public function loadDBContent(){

        $switch = 'DEFAULT';

        $dataArray = F1_larav::all();
        // Daten an die Ansicht übergeben
        return view('content', compact('switch', 'dataArray'));
}
}
