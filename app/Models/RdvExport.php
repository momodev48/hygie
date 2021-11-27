<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RdvExport implements FromCollection, WithHeadings, WithColumnFormatting
{
    use HasFactory;

    public function columnFormats(): array
    {
        return [
            'F' => NumberFormat::FORMAT_DATE_DMYMINUS,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nom',
            'Prénom',
            'Téléphone',
            'E-mail',
            'Date' ,
            'Heure',
            'Commentaire',
            'Statut',
            'Création',
            'Dernière modification',
        ];
    }
    
    public function collection()
    {
        return Rendezvous::all();
    }

    
}
