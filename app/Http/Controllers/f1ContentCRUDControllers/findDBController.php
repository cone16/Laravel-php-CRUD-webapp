<?php
namespace App\Http\Controllers\f1ContentCRUDControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\F1_larav;
use DateTime;

class findDBController extends Controller
{
    public function searchDB(Request $request){

        $searchedString = $request->input('search');

            // check if searched string is a date format.
            // if true, reformat searched string to readable format
            if(preg_match( "/[0-9][0-9](.|-)[0-9][0-9](.|-)[0-9][0-9][0-9][0-9]/", $searchedString) === 1){
                $date = new DateTime($searchedString);
                $string = $date->format('Y-m-d');
                $search = $string;
            } else {
                $search = $searchedString;
            }

             // Daten aus der Datenbank abrufen
            $data = F1_Larav::where('driverId', 'like', "$search")
            ->orWhere('url', 'like', "$search")
            ->orWhere('givenName', 'like', "$search")
            ->orWhere('familyName', 'like', "$search")
            ->orWhere('dateOfBirth', 'like', "$search")
            ->orWhere('familyName', 'like', "$search")
            ->orWhere('nationality', 'like', "$search")->get();

            $switch = 'DEFAULT';

            return view('content', ['dataArray' => $data, 'switch' => $switch]);

    }
}
