<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    //initialize the Database with the following records.
    public function run()
    {
      $data=  array([
        'currencyFrom' => "Euro",
        'currencyTo' => "US Dollar",
        'ratio' => 1.3764,
      ],[
        'currencyFrom' => "Euro",
        'currencyTo' => "Swiss Franc",
        'ratio' => 1.2079,
      ],[
        'currencyFrom' => "Euro",
        'currencyTo' => "British Pound",
        'ratio' => 0.8731,
      ],[
        'currencyFrom' => "US Dollar",
        'currencyTo' => "JPY",
        'ratio' => 76.7200,
      ],[
        'currencyFrom' => "Swiss Franc",
        'currencyTo' => "US Dollar",
        'ratio' => 1.1379,
      ],[
        'currencyFrom' => "British Pound",
        'currencyTo' => "CAD",
        'ratio' => 1.5648,
      ]);
      foreach ($data as $value) {
        DB::table('currencies')
        ->insert([
          'currencyFrom' => $value['currencyFrom'],
          'currencyTo' => $value['currencyTo'],
          'ratio' => $value['ratio'],
        ]);
      }

    }
}
