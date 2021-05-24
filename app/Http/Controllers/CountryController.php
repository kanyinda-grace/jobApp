<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Http\Resources\lookups\CountryCollection;
use App\Http\Resources\CountryResource;
use Validator; 
class CountryController extends Controller
{
    public function index(){
    	return new CountryCollection(Country::all());
    }

    public function store(Request $request){

    	if ($this->validateInputs($request)->false()) {
    		return response([
    			'errors'=>$this->validateInputs($request)->errors()
    		], 422);
    	}

    $country=Country::create([
         'name'=>$request->name;
         'phone_code'=>$request->phoneCode,
         'country_code'=>$request->countryCode,
    	]);

    	return new CountryResource($country);
    }


    private function validateInputs(Request $request){
       return Validator::make($request->all() , [
       		'name'=>'required|string|max:255',
       		'phoneCode'=>'required|max:255',
       		'countryCode'=>'required|max:255',
       ]);
    }


    public function show(Country $country){
    	return new CountryResource($country);
    }

    public function update(Request $request , Country $country){
    	if ($this->validateInputs($request)->false()) {
    		
    		return response([
                'errors' => $this->validateInputs()->errors()
    		] , 422);
    	}

    	$country->update([
    		'name'=>$request->name,
    		'phone_code'=>$request->phoneCode,
    		'country_code'=>$request->name,

    	]);
    	return CountryResource($country);
    }
}
