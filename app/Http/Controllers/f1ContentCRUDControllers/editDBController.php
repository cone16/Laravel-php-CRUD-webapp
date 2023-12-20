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
        public function saveChangesToDB(Request $request){

            // find out wich entrys were checked
            $ids =[];

            // get Data from all form Elements
            $driverId = $request->input('driver-id');
            $url = $request->input('url');
            $givenName = $request->input('given-name');
            $familyName = $request->input('family-name');
            $dateOfBirth = $request->input('date-of-birth');
            $nationality = $request->input('nationality');

            // join the entrys of the formular with the id's and update the DB entrys
            $id = $request->input('id', []);

            foreach($id as $index => $value){

                // If any of the form input is empty don't update.
                $updateData = [];
                if (!empty($driverId[$index])) {
                    $updateData['driverId'] = $driverId[$index];
                }
                if (!empty($url[$index])) {
                    $updateData['url'] = $url[$index];
                }
                if (!empty($givenName[$index])) {
                    $updateData['givenName'] = $givenName[$index];
                }
                if (!empty($familyName[$index])) {
                    $updateData['familyName'] = $familyName[$index];
                }
                if (!empty($dateOfBirth[$index])) {
                    $updateData['dateOfBirth'] = $dateOfBirth[$index];
                }
                if (!empty($nationality[$index])) {
                    $updateData['nationality'] = $nationality[$index];
                }

                // change Data.
                F1_Larav::where('id', $value)->update($updateData);
            }

            return redirect()->action('App\Http\Controllers\f1ContentCRUDControllers\loadDBController@loadDBContent');
        }

        // delete the db entrys
        public function deleteHandler($checkedCheckboxes) {
            foreach($checkedCheckboxes as $id){
                $data = F1_Larav::destroy('id', 'like', $id);
            }
        }

}
