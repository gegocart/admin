<?php

namespace App\Http\Controllers\Countries;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\StateResource;
use App\Http\Resources\RegionResource;
use App\Models\Country;
use App\Models\Region;
use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\CountryShippingMethod;
use App\Models\ShippingMethod;
use Exception;

class CountryController extends Controller
{
    public function index()
    {
        return CountryResource::collection(Country::get());
    }

    public function getState($country_id)
    {
       
        //$state=State::where('country_id',$country_id)->get();
        $state=StateResource::collection(State::where('country_id',$country_id)->get());
        return $state;
    }
public function getRegion($country_id)
    {

        $region=RegionResource::collection(Region::where('country_id',$country_id)->get());
        return $region;
    }
     public function getStatepincode($region_id)
    {

        //dd($region_id);
        //$state=State::where('country_id',$country_id)->get();
        $state=StateResource::collection(State::where('region_id',$region_id)->get());
        return $state;
    }

    public function getCity($state_id)
    {
        //dd($state_id);
        try
        {
            $city=CityResource::collection(City::where('state_id',$state_id)->get());
            //dd($city);
            return $city;
        }
        catch(Exception $e)
        {
            // dd($e->getMessage());
        }
    }
   
     public function loadCity(Request $request)
    {
    
        try
        {
            $city=CityResource::collection(City::whereIn('state_id',$request)->get());
            return $city;
        }
        catch(Exception $e)
        {
            //dd($e->getMessage());
        }
    }

   

    public function displayCountryShippingMethod()
    {
     
        $res=[];

        $countryshippingmethod=CountryShippingMethod::pluck('country_id')->toarray();
        
        $country=Country::where('status','active')->whereIn('id',$countryshippingmethod)->orderby('name','ASC')->get();

        $res['country']=$country;

        $state=State::WhereIn('country_id',$countryshippingmethod)->orderby('name','ASC')->get();

        $res['state']=$state;

        $stateid= $state->pluck('id')->toarray();

        $city=City::whereIn('state_id',$stateid)->orderby('name','ASC')->get();

        $res['city']=$city;


        return $res;
        // return CountryResource::collection(
        //      Country::where('status','active')->whereIn('id',$countryshippingmethod)->get()
        //  );

    }


}
