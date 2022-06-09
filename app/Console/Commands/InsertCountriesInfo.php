<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class InsertCountriesInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'country:insert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $countries = Http::withHeaders([
            'content-type' => 'application/json'
        ])->get('https://restcountries.com/v3.1/all')->collect()->each(function ($c) {
           $country = new Country();
           $country->english_name = $c['name']['common'];
//           $cLang = array_keys($c['languages']);
//           $cLang = $cLang['0'];
//           if ($cLang != 'eng') {
//
//           }
//           $country->official_name = $c['name']['nativeName'][$cLang]['common'];
            if (isset($c['cca3'])){
                //Unknown code
                $country->code = $c['cca3'];
            } else {
                $country->code = $c['ccn3'];
            }
           $country->flag = $c['flags']['png'];
           $country->save();
        });

        return 0;
    }
}
