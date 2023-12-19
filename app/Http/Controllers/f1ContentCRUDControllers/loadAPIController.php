<?php

namespace App\Http\Controllers\f1ContentCRUDControllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\F1_larav;

class loadAPIController extends Controller
{
    public function loadF1API()
    {
        // Set multible Options for cURL transfer API
         $fetchAPIData = Http::get('http://ergast.com/api/f1/drivers.json');

        //if curl can't connect/download
        if($fetchAPIData === false){
            echo '<p>couldn´t connect curlserver file!</p>';
        }

        $response = $fetchAPIData;
        // create new entrys or replaces the old ones in the
        // Database
        foreach ($response['MRData']['DriverTable']['Drivers'] as $item){
            F1_Larav::updateOrCreate([
                                'driverId' => $item['driverId'],
                                'url' => $item['url'],
                                'givenName' => $item['givenName'],
                                'familyName' => $item['familyName'],
                                'dateOfBirth' => $item['dateOfBirth'],
                                'nationality' => $item['nationality']
            ]);
        }
        $dataLoaded = 'F1 DriverData Successfully loaded to the Database.';

        $switch = 'DEFAULT';

        return view('content', compact('switch'), ['response' => $dataLoaded]);
    }
}
