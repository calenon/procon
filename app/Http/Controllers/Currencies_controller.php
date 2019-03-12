<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\currencies;

class Currencies_controller extends Controller
{

    public function Add()
    {
        //invokes the Insert_Record() method of the "currencies" model in order to store a new currency conversion into database
        $currencies_model= new currencies();
        //receive the request data
        $request = request()->all();
        //invoke Insert_Record + output escape
        $respone = array_map ('htmlspecialchars' ,$currencies_model->Insert_Record($request));
        return $respone;
    }
    public function Exchange_results()
    {
        //invokes the Retrieve_record() method of the "currencies" model in order to retrieve a specific currency conversion record from database
        $currencies_model= new currencies();
        //receive the request data
        $request = request()->all();
        //invoke Retrieve_record()
        $record = $currencies_model->Retrieve_record($request);
        $record = json_decode($record,true);
        //calculate the converted amount based on the requested currency convertion (base currency, target currency, base currency amount )
        if($record[0]["currencyTo"]==$request["currency_to"] && $record[0]["currencyFrom"]==$request["currency_from"]){
          $converted_amount = $request['currency_amount']*$record[0]["ratio"];
        }
        else{
          $converted_amount = $request['currency_amount']*(1/$record[0]["ratio"]);
        }
        //return escaped converted amount 
        return htmlspecialchars($converted_amount);

    }
    public function Delete()
    {
        //invokes the Delete_Record() method of the "currencies" model in order to delete a stored currency conversion from database
        $currencies_model = new currencies();
        //receive the request data
        $request = request()->all();
        //invoke Delete_Record + output escape
        $response = array_map ('htmlspecialchars' ,$currencies_model->Delete_Record($request));
        return   $response;

    }
    public function Update()
    {
        //invokes the Update_Record() method of the "currencies" model in order to update currency conversion record
        $currencies_model = new currencies();
        //receive the request data
        $request = request()->all();
        // this is a boolean response - no need to escape anything
        return $currencies_model->Update_Record($request);
    }

}
