<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
/*The Laravel query builder uses PDO parameter binding to protect the application against SQL injection attacks.
There is no need to clean strings being passed as bindings*/
class currencies extends Model
{
  public static function Retrieve_record($request){
    //Retrieve from table "currencies": the record of the currency conversion from "currencyFrom" (eg.Euro) to "currencyTo" (eg.US Dollar)
    $record = DB::table('currencies')
    ->Where(function ($query) use($request) {
               $query ->where('currencyFrom', $request['currency_from'])
                      ->where('currencyTo',$request['currency_to']);
    })
    ->orWhere(function ($query) use($request) {
               $query->where('currencyTo',$request['currency_from'])
                     ->where('currencyFrom', $request['currency_to']);
    })
    ->get();
    /* equivalent sql query:
    select * from currencies where
    (currencyFrom  = $request['currency_from'] AND currencyTo = $request['currency_to']) OR
    (currencyFrom= $request['currency_to']  AND currencyTo = $request['currency_from']) */
    return $record;
  }
  public static function Insert_Record($request){
    //Insert into table "currencies": new currency conversion, return the id of the new record
    $id=DB::table('currencies')
    ->insertGetId([
    'currencyFrom'=>$request['New_currencyFrom'],
    'currencyTo'=>$request['New_currencyTo'],
    'ratio'=>$request['New_ratio']
    ]);
    return ["New_ID"=>$id,"New_currencyFrom"=>$request['New_currencyFrom'],"New_currencyTo"=>$request['New_currencyTo'],"New_ratio"=>$request['New_ratio']];
  }
  public static function Delete_Record($request){
    //Delete from table "currencies": the record of the currency conversion chosen by the user, return [true,id of te deleted record] if the procedure is successful
    $deleted=DB::table('currencies')
    ->where('id',$request['id'])
    ->delete();
    return ["success"=>$deleted,"deleted_id"=>$request['id']];
  }
  public static function Retrieve_all(){
    //Retrieve all data from table "currencies"
    $currencies= \App\currencies::all();
    return $currencies;
  }
  public static function Update_Record($request){
    //Update table "currencies" according to user inputs
    $updateDetails=array(
    'ratio' => $request['currency_ratio_new'],
    'currencyFrom'=> $request['currency_from_new'],
    'currencyTo'=> $request['currency_to_new']
    );
    $update=DB::table('currencies')
    ->where('id', $request['id'])
    ->update($updateDetails);
    return $update;
  }
}
