<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\currencies;
class Screen_controller extends Controller
{

    public function Display_Crud_screen()
    {
        //Display view "Crud_screen" (manage currencies view)
        $currencies_model= new currencies();
        //Retrieve all currencies conversion data from the DB,  eg: $currencies=[{'id'=> 1,'currencyFrom'=>'euro','currencyTo'=>'us dollar', 'ratio' => 1.2},{},..]
        $currencies= $currencies_model->Retrieve_all();
        $currencies=json_decode($currencies,true);
        //output escaping
        foreach($currencies as $key => $value){
          $currencies[$key]=array_map ('htmlspecialchars' ,$value);
        }
        //pass all currencies data to the view
        return view('Crud_screen',compact('currencies'));
    }
    public function Display_Calculator_screen()
    {
        //Display view "Calculator_screen" (currency conversion calculator view)
        $options=array();
        $currencies_model= new currencies();
        //Retrieve all currencies conversion data from the DB
        $currencies= $currencies_model->Retrieve_all();
        $currencies=json_decode($currencies,true);
        //output escaping
        foreach($currencies as $key => $value){
          $currencies[$key]=array_map ('htmlspecialchars' ,$value);
        }
        //cretate a list ($options) with all the distinct currencies eg.[euro,us dollar,british pound,..]
        for ($i=0; $i<count($currencies); $i++){
          if(!in_array($currencies[$i]["currencyFrom"],$options)){
            array_push($options,$currencies[$i]["currencyFrom"]);
          }
          if(!in_array($currencies[$i]["currencyTo"],$options)){
            array_push($options,$currencies[$i]["currencyTo"]);
          }
        }
        //pass all currencies data + options to the view
        return view('Calculator_screen',compact('options'),compact('currencies'));
    }

}
