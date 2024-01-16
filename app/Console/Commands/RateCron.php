<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Models\Rate;
use AmrShawky\LaravelCurrency\Facade\Currency;

class RateCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rate:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $USD = Currency::convert()->from('KES')->to('USD')->get();
        $EUR = Currency::convert()->from('KES')->to('EUR')->get();
        $GBP = Currency::convert()->from('KES')->to('GBP')->get();
        $Rate = Rate::all();
        if($Rate->isEmpty()){
           $data = array(
                array('rates'=>$USD, 'currency'=> "USD"),
                array('rates'=>$EUR, 'currency'=> "EUR"),
                array('rates'=>$GBP, 'currency'=> "GBP"),
                //...
            );
            Rate::insert($data);
        }else{
             $updateUSD = array(
                  "rates"=>$USD
             );

             $updateEUR = array(
                "rates"=>$EUR
             );

             $updateGBP = array(
                "rates"=>$GBP
             );
        }
        DB::table('rates')->where('currency','USD')->update($updateUSD);
        DB::table('rates')->where('currency','EUR')->update($updateEUR);
        DB::table('rates')->where('currency','GBP')->update($updateGBP);
        return Command::SUCCESS;
    }
}
