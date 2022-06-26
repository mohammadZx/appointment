<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Attachment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City, App\Models\Province, App\Models\Category, App\Models\Service, App\Models\SubService;
use App\Models\Listing;
use App\Models\ListingException;
use App\Models\ListingService;
use App\Models\ListingTime;
use Carbon\CarbonPeriod;
use DateTime;
use Faker\Generator;
use Illuminate\Container\Container;

class DatabaseSeeder extends Seeder
{
    public $days = [
        'sunday',
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday'
    ];

    public $provinceIds = [];
    public $cityIds = [];
    public $categoryIds = [];
    public $serviceIds = [];
    public $subServiceIds = [];
    public $attachmentIds = [];
    public $listingIds = [];
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
            for($n = 0; $n < 5; $n++){
                $listing->setMeta('thumbnail_id', $this->attachmentIds[array_rand($this->attachmentIds)]);
            }

            $this->listingIds[] = $listing->id;
        }

        return;
    }

    public function listingExceptions(){

        $period = CarbonPeriod::create('2022-01-01', '2023-01-01');
        $dates = $period->toArray();

        foreach($this->listingIds as $listing){
            for($i = 0; $i < rand(0, 10); $i++){
                $exp = new ListingException();
                $exp->listing_id = $listing;
                $exp->exception_date = $dates[array_rand($dates)];
                $exp->save();

                $this->listingExceptionIds[] = $exp->id;
            }
        }

        return;

    }

    public function listingServices(){

        foreach($this->listingIds as $listing){
                    for($i = 1; $i < rand(2, 5); $i++){
                        $lsubservice = new ListingService();
                        $lsubservice->listing_id = $listing;
                        $lsubservice->sub_service_id = $this->subServiceIds[array_rand($this->subServiceIds)];
                        $lsubservice->capacity = rand(1, 3);
                        $lsubservice->time = rand(5, 100);
                        $lsubservice->price = rand(0, 10000);
                        $lsubservice->is_price_from = rand(0, 1);
                        $lsubservice->save();
                        $this->listingServiceIds[] = $lsubservice->id;
                    }
                }   

        return;

    }

    public function listingTimes(){
        foreach($this->listingIds as $listing){
            foreach($this->days as $day){
                $randDate = new DateTime();
                $randDate->setTime(mt_rand(0, 23), mt_rand(0, 59));

                
                $listingTime = new ListingTime();
                $listingTime->listing_id = $listing;
                $listingTime->time_start = $randDate->format('H:i');
                $listingTime->time_end =$randDate->format('H:i');
                $listingTime->week_day = $day;
                $listingTime->save();

                $this->listingTimeIds[] = $listingTime->id;

            }
        }

        return;
        
    }

    public function appointments(){
        $status = [
            'none',
            'approve',
            'late',
            'finish',
        ];

        
        
        for($i= 0; $i < rand(10, 50); $i++){
            $int= mt_rand(1262055681,1262055681);
            $string = date("Y-m-d H:i:s",$int);

            $appoinment = new Appointment();
            $appoinment->user_id = rand(1, 40);
            $appoinment->listing_id = $this->listingIds[array_rand($this->listingIds)];
            $appoinment->date_start = $string;
            $appoinment->date_end = $string;
            $appoinment->status = $status[array_rand($status)];
            $appoinment->save();
        }

        return;
    }
    

    
}
