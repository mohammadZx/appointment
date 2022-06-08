<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public $categoriesId;
    public $servicesId;
    public $subServicesId;
    public $cityesId;
    public $provincesId;
    public $listingsId;
    public $appointmentsId;

    public function run()
    {
        User::factory()->count(40)->create();

        $this->makeOptions();
        $this->importCities();
        $this->importProvinces();
        $this->importLisings();
        $this->importLisingsTime();
        $this->importLisingsService();
        $this->importAppointments();

    }

    public function makeOptions(){

    }

    public function importCities(){
        $data = json_decode(file_get_contents(__DIR__ . '/city.json'), true);
    }

    public function importProvinces(){
        $data = json_decode(file_get_contents(__DIR__ . '/province.json'), true);
        
    }

    public function importLisings(){

    }

    public function importLisingsTime(){

    }

    public function importLisingsService(){

    }

    public function importAppointments(){

    }
}
