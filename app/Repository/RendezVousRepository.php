<?php 

namespace App\Repository;

use App\Models\Rendezvous;
use Illuminate\Support\Facades\Session;

class RendezVousRepository 
{

    protected $rendezvous;

    public function __construct(Rendezvous $rendezvous)
    {
        $this->rendezvous = $rendezvous;
    }


 /*    function store(Request $request) {
        
        $r=$request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'telephone' => 'required',
        'email' => 'required',
        'date' => 'required',
        'heure' => 'required',
        'commentaire' => 'required',
        'statut' => 'required',
        ]);
        
        $rid = $request->user_id;
        Rendezvous::updateOrCreate(['id' => $rid],['nom' => $request->nom, 'prenom' => $request->prenom, 'telephone' => $request->telephone, 'email' => $request->email, 'date' => $request->date, 'heure' => $request->heure, 'commentaire' => $request->commentaire, 'statut' => $request->statut]);
        if($request->user_id)
        $msg = 'Mise à jour avec succés.';
        else
        $msg = 'Erreur lors de la mise à jour';
        return redirect()->route('users.index')->with('success',$msg);
    
            $this->saveModel($this->rendezvous, $request);
        }
 */
        
    function store($inputs) {
        $rendezvous = $this->saveModel($this->rendezvous, $inputs);
        return $rendezvous;

    }

    public function getByDate() {
        return $this->rendezvous->all()->orderBy('created_at', 'DESC');
    }

    
    


    public function saveModel($rendezvous, $inputs) {

        //dd($inputs);
        if(isset($inputs['nom'])) 
        {
            $rendezvous->nom = $inputs['nom'];
        }
        if(isset($inputs['prenom'])) 
        {
            $rendezvous->prenom = $inputs['prenom'];
        }
        if(isset($inputs['telephone'])) 
        {
            $rendezvous->telephone = $inputs['telephone'];
        }
        if(isset($inputs['email'])) 
        {
            $rendezvous->email = $inputs['email'];
        }
        if(isset($inputs['date'])) 
        {
            $rendezvous->date = $inputs['date'];
        }
        if(isset($inputs['heure'])) 
        {
            $rendezvous->heure = $inputs['heure'];
        }
        if(isset($inputs['commentaire'])) 
        {
            $rendezvous->commentaire = $inputs['commentaire'];
        }

        if(isset($inputs['statut'])) {
            $rendezvous->statut = $inputs['statut'];
        }
        if(isset($inputs['messagepatient'])) {
            Session::put('msg', $inputs['messagepatient']);
        }
        $rendezvous->save();
        return $rendezvous;


    }

    public function edit(Rendezvous $rdv)
    {
        return view('detailsrdv');
    }

    public function getById($id)
    {
        return $this->rendezvous->where('id', $id)->firstOrFail();
    }



    public function destroy($rdv)
    {
        $rdv->delete();
        
    }


}
?>