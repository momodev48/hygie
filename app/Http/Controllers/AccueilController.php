<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\RendezVousRepository;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RendezvousStore;
use App\Notifications\RdvCreationNotification;
use App\Notifications\RdvCreationUserNotification;
use App\Repository\UserRepository;

class AccueilController extends Controller
{


    protected $rendezVousRepository;

    public function __construct(RendezVousRepository $rendezVousRepository, UserRepository $userRepository)
    {
        $this->rendezVousRepository = $rendezVousRepository;
        $this->userRepository = $userRepository;
    }

    function index(){
        return view('accueil');
    }

    function add(RendezvousStore $request)
    {
        /* return $request->input(); */

        $rendezVous = $this->rendezVousRepository->store($request->all());



        if($rendezVous){
            // Fonction si dessous à placer dans le UserRepository
            // getAdmin();
            //$user =  \App\Models\User::find(1);
            $user =  $this->userRepository->getAdmin();
            //appeler la notification
            $user->notify(new RdvCreationNotification($rendezVous));

            //notification user
            $rendezVous->notify(new RdvCreationUserNotification());

            //return back()->with('success','Votre rendez-vous a été pris en compte');
            return view('confirmation');
        }
        else
        {
            return back()->with('fail','Veuillez ressayer');

        }
    }

}
