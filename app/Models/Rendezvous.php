<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Rendezvous extends Model
{
    use HasFactory;
    use Exportable;
    use Notifiable;
    
    protected $table = "Rendezvous";

    protected $fillable = ["nom","prenom","telephone","email","date","heure","statut","commentaire"];
}
