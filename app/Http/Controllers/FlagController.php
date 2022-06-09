<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FlagController extends Controller
{
        //TODO use this for front API
//    public function getFlag()
//    {
//        $country = $this->getRandomCountryName();
//        $data = Http::get('https://countryflagsapi.com/svg/'. $country);
//    }

    public function getRandomCountryName()
    {
        $countries = Http::withHeaders([
            'content-type' => 'application/json'
        ])->get('https://restcountries.com/v3.1/all')->collect()->each(function ($country) {
            dd($country);
        });

    }

    public function checkAnswer(Request $request)
    {
        $answer = $request->get('answer');

    }
}
