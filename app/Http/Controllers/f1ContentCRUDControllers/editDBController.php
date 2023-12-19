<?php

namespace App\Http\Controllers\f1ContentCRUDControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;

use App\Http\Controllers\Controller;
use App\Http\Controllers\f1ContentCRUDControllers\loadDBController;
use App\Models\F1_larav;




class editDBController extends Controller
{

        // add one DB Entry
        public function editDBEntry(Request $request){

            // Log::info('Gesamter Request:', ['request' => $request->all()]);
            if($request->input('checkbox')){
                $checkedCheckboxes = [];
                $ids = $request->input('checkbox', []);

                foreach($ids as $id =>$value) {
                    if ($value === '0'){
                        array_push($checkedCheckboxes, $id);
                    }
                }

                if($request->input('submit_edit')){
                    $switch = 'EDIT';
                    $dataArray = $this->editHandler($checkedCheckboxes);
                    return view('content', compact('switch'),[ 'dataArray'=>$dataArray]);
                }elseif($request->input('submit_delete')){
                    $this->deleteHandler($checkedCheckboxes);
                    return redirect()->action('App\Http\Controllers\f1ContentCRUDControllers\loadDBController@loadDBContent');
                } else {
                    return error_log('irgendwas ist schief gelaufen...');;

                }
            } else {
                $dataArray = 'true';
                return view('ErrorDialog',['dataArray'=>$dataArray]);
            }
        }

        public function editHandler($checkedCheckboxes) {
                $dataArray = [];
                // error_log(print_r($checkedCheckboxes));
                // Daten aus der Datenbank abrufen
                foreach($checkedCheckboxes as $id){
                    $data = F1_Larav::where('id', 'like', $id)->select(['id', 'driverId', 'url', 'givenName', 'familyName', 'dateOfBirth', 'nationality'])->first();
                    if ($data) {
                        // Fügen Sie die Daten zu $dataArray hinzu (wenn vorhanden)
                        $dataArray[] = $data->toArray();
                    }
                }
                return $dataArray;
        }

        // save changes to the db entrys
        public function saveChangesToDB(request $request){

            $updatedData = [];
            // finde heraus, welche einträge markiert wurden
            // verbinde die einträge des formulars mit den id's und erstelle ein Array

            $ids = $request->input('id', []);
            $driverIds = $request->input('driver-id', []);
            $urls = $request->input('url', []);
            $givenNames = $request->input('given-name', []);
            $familyNames = $request->input('family-name', []);
            $dateOfBirths = $request->input('date-of-birth', []);
            $nationalitys = $request->input('nationality', []);



            error_log(print_r($ids));

            for($i = 0; $i < count($ids); $i++){
                 $arr = array([$ids[$i],
                               $driverIds[$i],
                               $urls[$i],
                               $givenNames[$i],
                               $familyNames[$i],
                               $dateOfBirths[$i],
                               $nationalitys[$i]]);
                $updatedData [] = $arr;
            }

            error_log(print_r($updatedData));




            // suche die einträge
            /*foreach($ids as $id){
                $dataToUpdate = F1_larav::where('id', $id)->update(['driverId' => $request->input('driver-id')])->
                                                                    update([ 'url' => $request->input('url')])->
                                                                    update([ 'given-name' => $request->])
            }*/
            // ändere die einträge

            return redirect()->action('App\Http\Controllers\f1ContentCRUDControllers\loadDBController@loadDBContent');
        }

        // delete the db entrys
        public function deleteHandler($checkedCheckboxes) {
            foreach($checkedCheckboxes as $id){
                $data = F1_Larav::destroy('id', 'like', $id);
            }
        }

}
