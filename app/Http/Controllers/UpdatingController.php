<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class UpdatingController extends Controller
{
    public function updates(Request $request){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebaseService.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();

        $database = $firebase->getDatabase();
        $refs = $database->getReference("Users/Drivers")->shallow()->getValue();
        $static= $database->getReference("Users/Drivers")->orderByChild('accountStatus')->equalTo('waitingApproval');
        $state = $static->getValue();
        if(isset($_POST['id'])) {
            $update=[];
            foreach ($refs as $k =>$v){
                $update[$k."accountStatus"]="approved";
            }
            print_r($update);

            $database->getReference("Users/Drivers/")->update($update);
        }
        else
            echo 'an err';


    }
}
