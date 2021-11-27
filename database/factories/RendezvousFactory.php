<?php

namespace Database\Factories;

use App\Models\Rendezvous;
use Illuminate\Database\Eloquent\Factories\Factory;

class RendezvousFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rendezvous::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->firstName($gender = null|'male'|'female'),
            'prenom' => $this->faker->lastName,
            'telephone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'date' => $this->faker->date($format = 'Y-m-d', $min = 'now'),
            'heure' => $this->faker->randomElement($array = array ('8:00 - 9:00','9:00 - 10:00','10:00 - 11:00','11:00 - 12:00','13:00 - 14:00','14:00 - 15:00','15:00 - 16:00','16:00 - 17:00','17:00 - 18:00','19:00 - 20:00')),
            /* 'email' => $this->faker->freeEmail,    */    
            'commentaire' => $this->faker->text($maxNbChars = 20),    
            'statut' => $this->faker->randomElement($array = array ('Accepté','Refusé')),
            
        ];
    }
}
