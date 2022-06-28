<?php

namespace App\Http\Controllers;

use App\Http\Resources\CountryResource;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FlagController extends Controller
{

    public function getCountries()
    {
        $countries = Country::all();

        return CountryResource::collection($countries);
    }

    public function checkAnswer(Request $request)
    {
        $answer = $request->get('answer');
        $country = Country::where('code', $request->get('code'))->first();

        $answer = strtolower($answer);
        $country->english_name = strtolower($country->english_name);
        if ($answer == $country->english_name){
            return response()->json(true);
        }
        return response()->json(false);
    }
}
