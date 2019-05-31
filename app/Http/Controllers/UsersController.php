<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class UsersController extends Controller

{

    //APPROVED DRIVER AGENTS
    public function approved_driver_agent()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebaseService.json');
        $firebase = (new Factory)->withServiceAccount($serviceAccount)->create();
        $database = $firebase->getDatabase();

        $status_approved = $database->getReference("Users/Drivers/")->orderByChild('accountStatus')->equalTo('approved')->getValue();
        $items = $database->getReference("Users/Drivers")->getValue();
        if($status_approved==true){
            foreach ($items as $drivers) {
                $approvedDrivers[] = $drivers;}
            return view('pages.allApprovedDriverAgents', compact('approvedDrivers'));}
        else echo 'No agent approved yet!';}


    //UNAPPROVED DRIVER AGENTS
    public function unapproved_driver_agent()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebaseService.json');
        $firebase = (new Factory)->withServiceAccount($serviceAccount)->create();
        $database = $firebase->getDatabase();

        $status = $database->getReference("Users/Drivers/")->orderByChild('accountStatus')->equalTo('waitingApproval')->getValue();
        $items = $database->getReference("Users/Drivers")->getValue();
        if ($status == true) {
            foreach ($items as $drivers) {
                $nDrivers[] = $drivers;
            }
            return view('pages.allUnapprovedDriverAgents', compact('nDrivers'));
        }
        else
            echo 'No request pending approval';
    }

//UNAPPROVED BODABODA RIDERS
    public function unapproved_boda_agent()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebaseService.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $database = $firebase->getDatabase();
        $status = $database->getReference("Users/BodaBodaAgents/")->orderByChild('accountStatus')->equalTo('waitingApproval')->getValue();
        $bodas = $database->getReference("Users/BodaBodaAgents");
        $dr = $bodas->getValue();
        if ($status == true) {
            foreach ($dr as $bodaboda) {
                $all_bodas[] = $bodaboda;
            }

            return view('pages.allUnapprovedBodaAgents', compact('all_bodas'));
        }
        else
            echo 'Agent already approved';
    }

    //APPROVED BODABODA RIDERS
    public function approved_boda_agent()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebaseService.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $database = $firebase->getDatabase();

        $status_approved = $database->getReference("Users/BodaBodaAgents")->orderByChild('accountStatus')->equalTo('approved');
        $state_a = $status_approved->getValue();
        $bodas = $database->getReference("Users/BodaBodaAgents");
        $dr = $bodas->getValue();
        if($state_a==true){
            foreach ($dr as $bodaboda) {
                $all_bodas[] = $bodaboda;
            }
            return view('pages.allApprovedBodaAgents', compact('all_bodas'));
        }
        else
            echo 'No BodaBoda Agent approved yet';
    }

//UNAPPROVED CAR RENTAL AGENTS
    public function unapproved_car_rental_agent()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebaseService.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $database = $firebase->getDatabase();
        $status = $database->getReference("Users/CarRentalAgents/")->orderByChild('accountStatus')->equalTo('waitingApproval')->getValue();
        $rental = $database->getReference("Users/CarRentalAgents");
        $dr = $rental->getValue();
        if ($status == true){
            foreach ($dr as $rental_id) {
                $allUnapprovedCarRentalAgents[] = $rental_id;
            }
            return view('pages.allUnapprovedCarRentalAgents', compact('allUnapprovedCarRentalAgents'));
        }
        else
            echo 'All agents have already been approved';
    }


    //UNAPPROVED DELIVERY AGENTS
    public function unapproved_delivery_agent()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebaseService.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $database = $firebase->getDatabase();
        $ref = $database->getReference("Users/DeliveryAgents")->shallow()->getValue();
        $status = $database->getReference("Users/DeliveryAgents/")->orderByChild('accountStatus')->equalTo('waitingApproval')->getValue();

        $status_approved = $database->getReference("Users/DeliveryAgents")->orderByChild('accountStatus')->equalTo('approved');
        $state_a = $status_approved->getValue();
        $deliver = $database->getReference("Users/DeliveryAgents");
        $dr = $deliver->getValue();
        if ($status == true) {
            foreach ($dr as $delivery_id) {
                $allDeliveryAgents[] = $delivery_id;
            }
            return view('pages.allUnapprovedDeliveryAgents', compact('allDeliveryAgents'));
        }
        elseif($state_a==true)
            echo 'account has already been approved';
        else
            echo 'Documents not submitted yet';
    }

    //UNAPPROVED MASSAGE AGENTS
    public function unapproved_massage_agent()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebaseService.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $database = $firebase->getDatabase();
        $ref = $database->getReference("Users/MassageAgents")->shallow()->getValue();
        $status = $database->getReference("Users/MassageAgents/")->orderByChild('accountStatus')->equalTo('waitingApproval')->getValue();

        $status_approved = $database->getReference("Users/MassageAgents")->orderByChild('accountStatus')->equalTo('approved');
        $state_a = $status_approved->getValue();
        $massage = $database->getReference("Users/MassageAgents");
        $dr = $massage->getValue();
        if ($status == true) {
            foreach ($dr as $agent_id) {
                $allMassageAgents[] = $agent_id;
            }
            return view('pages.allUnapprovedMassageAgents', compact('allMassageAgents'));
        }
        elseif($state_a==true)
            echo 'account has already been approved';
        else
            echo 'Documents not submitted yet';
    }

    //UNAPPROVED MECHANICS AGENTS
    public function unapproved_mechanic_agent()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebaseService.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $database = $firebase->getDatabase();
        $ref = $database->getReference("Users/Mechanics")->shallow()->getValue();
        $status = $database->getReference("Users/Mechanics/")->orderByChild('accountStatus')->equalTo('waitingApproval')->getValue();

        $status_approved = $database->getReference("Users/Mechanics")->orderByChild('accountStatus')->equalTo('approved');
        $state_a = $status_approved->getValue();
        $mechanic = $database->getReference("Users/Mechanics");
        $dr = $mechanic->getValue();
        if ($status == true) {
            foreach ($dr as $agent_id) {
                $allMechanicAgents[] = $agent_id;
            }
            return view('pages.allUnapprovedMechanicAgents', compact('allMechanicAgents'));
        }
        elseif($state_a==true)
            echo 'account has already been approved';
        else
            echo 'Documents not submitted yet';
    }

    //UNAPPROVED PLUMBING AGENTS
    public function unapproved_plumbing_agent()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebaseService.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $database = $firebase->getDatabase();
        $ref = $database->getReference("Users/PlumbingAgents")->shallow()->getValue();
        $status = $database->getReference("Users/Mechanics/")->orderByChild('accountStatus')->equalTo('waitingApproval')->getValue();

        $status_approved = $database->getReference("Users/PlumbingAgents")->orderByChild('accountStatus')->equalTo('approved');
        $state_a = $status_approved->getValue();
        $plumbing = $database->getReference("Users/PlumbingAgents");
        $dr = $plumbing->getValue();
        if ($status == true) {
            foreach ($dr as $agent_id) {
                $allPlumbingAgents[] = $agent_id;
            }
            return view('pages.allUnapprovedPlumbingAgents', compact('allPlumbingAgents'));
        }
        elseif($state_a==true)
            echo 'account has already been approved';
        else
            echo 'Documents not submitted yet';
    }

    //Driver history.
    public function driver_hist()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebaseService.json');
        $firebase = (new Factory)->withServiceAccount($serviceAccount)->create();
        $database = $firebase->getDatabase();
        $reffirstKey = $database->getReference('Users/Drivers/')->getChildKeys();
        print_r($reffirstKey);
        $refID = $database->getReference('taxihistory')->orderByChild('driver')->getValue();
        foreach ($refID as $hist_id) {
            $allHistory[] = $hist_id;
        }
        return view('pages.hist', compact('allHistory'));
    }

    //Driver history.
    public function customer_wallet()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebaseService.json');
        $firebase = (new Factory)->withServiceAccount($serviceAccount)->create();
        $database = $firebase->getDatabase();
        $customer_ref = $database->getReference('CustomerMobileTopUpReference/')->getValue();
        foreach ($customer_ref as $customer_id) {
            $Customer[] = $customer_id;
        }
        return view('pages.customerwallet', compact('Customer'));
    }
}
