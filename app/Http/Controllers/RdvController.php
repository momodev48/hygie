<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\RendezvousDataTable;
use App\Models\Rendezvous;
use App\Repository\RendezVousRepository;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\RendezvousUpdate;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\RdvExport;
use App\Notifications\RdvUpdateUserNotification;
use Illuminate\Support\Facades\Session;
use Illuminate\Notifications\Notifiable;

class RdvController extends Controller

{

    protected $rendezVousRepository;
    /* public function listerdv()
    {
         //recuperer les données des rdv
        return view('listerdv');

    } */
   /* public function listerdv(RendezvousDataTable $dataTable)
    {
         return $dataTable->render('listerdv');

    }*/

    public function __construct(RendezVousRepository $rendezVousRepository)
    {
        $this->rendezVousRepository= $rendezVousRepository;

    }

    public function index()
    {

        $rdv = Rendezvous::all();

        return view('listerdv', compact('rdv'));
    }


    public function show($id) {
        $rdv = $this->rendezVousRepository->getById($id);
        return view('detailsrdv', compact('rdv'));
    }s

    public function updateRdv($id, RendezvousUpdate $request)
    {
        //dd($request->all());

        $rdv = $this->rendezVousRepository->getById($id);
        $this->rendezVousRepository->saveModel($rdv, $request->all());
        //appeler la notification
        $rdv->notify(new RdvUpdateUserNotification($rdv, Session::get('msg')));
        Session::forget('msg');
       return redirect()->route('data')
       ->with('success','Modifications enregistrer avec succès');
    }

    public function destroy($id){
        $rdv = $this->rendezVousRepository->getById($id);
        $this->rendezVousRepository->destroy($rdv);
        return redirect()->route('data')
        ->with('success','Rendez-vous supprimé avec succès');
    }

    public function export()
    {
        return Excel::download(new RdvExport, 'Rendezvous.xlsx');
    }

    /*public function listerdv() {
        $rdv = Rendezvous::query();
        return DataTables::eloquent($rdv)->addColumn('Actions', function(Rendezvous $rendezvous) {
            return '<a href="'.route('detailsrdv', $rendezvous->id).'">Détails</a>';
        })->toJson();
    }*/
}
