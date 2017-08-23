<?php

use Illuminate\Database\Seeder;
use App\Models\Hobby;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $hobbies = ["lecture","Regarder la télévision","Passer Du temps en famille","Aller aux cinema","Pêche","Ordinateur","Jardinage","Location de films","Marcher","faire du sport","Ecouter de la Music","Divertissant","Chasse","Sports en equipe","Shopping","Voyager","Dormir","Socialiser","Couture","Golf","Activités de l'église","Relaxer","Travaux ménagers","Artisanat","Regarder des sports","Faire du vélo","Jouer aux cartes","Randonnée","Preparer","Rencontre en ligne","La natation","Camper","Ski","Travailler sur les voitures","L'écriture","Faire de la moto","Prendre Soins des animaux","Bowling","La peinture","Courir","Dancer","Équitation","Tennis","Theatre","Billiards","Plage","Bénévolat"];



        foreach ($hobbies as $hobby){
            Hobby::create([
                'name' => $hobby
            ]);
        }


    }
}
