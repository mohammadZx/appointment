<?php

namespace Database\Seeders;

use App\Models\Attachment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City, App\Models\Province, App\Models\Category, App\Models\Service, App\Models\SubService;
use App\Models\Listing;
use Faker\Generator;
use Illuminate\Container\Container;

class DatabaseSeeder extends Seeder
{

    public $provinceIds = [];
    public $cityIds = [];
    public $categoryIds = [];
    public $serviceIds = [];
    public $subServiceIds = [];
    public $attachmentIds = [];
    public $lisingIds = [];
    public $listingExceptionIds = [];
    public $listingTimeIds = [];
    public $listingServiceIds = [];
    public $appointmentIds = [];


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(40)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->province();
        $this->city();
        $this->category();
        $this->attachments();
        $this->listings();
        $this->listingTimes();
        $this->listingExceptions();
        $this->listingServices();
        $this->appointments();
    }

    public function province(){
        $provinces = json_decode(file_get_contents(__DIR__ . '/province.json'), true);
        foreach($provinces as $province){
            $obj = new Province();
            $obj->id = $province['id'];
            $obj->name = $province['name'];
            $obj->save();
            $this->provinceIds[] = $obj->id;
        }
        return;
    }

    public function city(){

        $cities = json_decode(file_get_contents(__DIR__ . '/city.json'), true);
        foreach($cities as $city){
            $obj = new City();
            $obj->id = $city['id'];
            $obj->province_id = $city['province_id'];
            $obj->name = $city['name'];
            $obj->save();
            $this->cityIds[] = $obj->id;
        }
        return;

    }

    public function category(){

        $categories = json_decode(file_get_contents(__DIR__ . '/categories.json'), true);

        foreach($categories as $category){
            $cat = new Category();
            $cat->title = $category['category'];
            $cat->save();
            $this->categoryIds[] = $cat->id;

            foreach($category['childs'] as $service){
                $sObj = new Service();
                $sObj->category_id = $cat->id;
                $sObj->title = $service['service'];
                $sObj->save();
                $this->serviceIds[] = $sObj->id;
                
                if(isset($service['childs'])){
                    foreach($service['childs'] as $subservice){
                        $ssObj = new SubService();
                        $ssObj->service_id = $sObj->id;
                        $ssObj->title = $subservice['sub_service'];
                        $ssObj->save();
                        $this->subServiceIds[] = $ssObj->id;
                    }
                }
            }
        }

    }

    public function attachments(){

        for($i = 0; $i < 9; $i++){
            $attachment = new Attachment();
            $attachment->src = '2022/06/0' . $i . '.jpg';
            $attachment->save();
            $this->attachmentIds[] = $attachment->id;
        }
        return;

    }

    public function listings(){
        $faker = Container::getInstance()->make(Generator::class);
        for($i = 1; $i < 30; $i++){
            $listing = new Listing();
            $listing->user_id = rand(1, 40);
            $listing->service_id = $this->serviceIds[array_rand($this->serviceIds)];
            $listing->city_id = $this->cityIds[array_rand($this->cityIds)];
            $listing->status = rand(0, 1);
            $listing->flexibility = rand(0, 10);
            $listing->name = $faker->company;
            $listing->address = $faker->address;
            $listing->content = $faker->text;
            $listing->save();
            for($i = 0; $i < 5; $i++){
                $listing->setMeta('thumbnail_id', $this->attachmentIds[array_rand($this->attachmentIds)]);
            }
            $this->lisingIds[] = $listing->id;
        }

        return;
    }

    public function listingExceptions(){


    }

    public function listingServices(){

    }

    public function listingTimes(){

    }

    public function appointments(){

    }
    

    
}
