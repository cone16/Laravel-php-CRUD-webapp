<?php

namespace App\Http\Controllers\f1ContentCRUDControllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\f1ContentCRUDControllers\loadDBController;
use Illuminate\Http\Request;
use App\Models\F1_larav;

class addToDBController extends Controller
{
    // add one DB Entry
    public function addDBEntryField(){

        $switch = 'ADD_ENTRY';
        // Daten aus der Datenbank abrufen
        $data = F1_Larav::all();
        // Daten in ein Array konvertieren
        $dataArray = $data->toArray();

        return view('content', compact('switch','dataArray'));
    }


    public function addDBEntry(Request $request){
        // get Form data
        $newDriverId = $request->driver_id;
        $newUrl = $request->url;
        $newGivenName = $request->given_name;
        $newFamilyName = $request->family_name;
        $newDateOfBirth = $request->date_of_birth;
        $newNationality = $request->nationality;

        // check if data already existing in DB
        $data = F1_Larav::where('driverId', 'like', $newDriverId)
        ->orWhere('url', 'like', $newUrl)->get();

        // if there is not(!) an equivalent piece of Data, continue operation
        if(isset($data)){

            // write Data...
            F1_Larav::create([
                                'driverId' => $newDriverId,
                                'url' => $newUrl,
                                'givenName' => $newGivenName,
                                'familyName' => $newFamilyName,
                                'dateOfBirth' => $newDateOfBirth,
                                'nationality' => $newNationality
            ]);

            //refresh
            return view('content');
        } else {
            $error_msg = 'Bereits ein ähnlicher Datensatz enthalten!';
            return view('sidebar', compact($error_msg));
        }
    }
}
