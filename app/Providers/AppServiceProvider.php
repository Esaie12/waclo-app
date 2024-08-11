<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;
use App\Models\Devi;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        view()->composer(['siteweb.*', 'layout.*'], function ($view) {
            $siteweb = DB::table('sitewebs')->first();
            $view->with('siteweb',$siteweb);
        });

        view()->composer(['adminView.document.*', 'adminView.direction.*' , 'adminView.team.*','personnalView.archive.*'], function ($view)
        {
            $direc = DB::table('directions')->where('etat',true)->get(['nameDirection','id']);
            $view->with('les_directions', $direc );
        });

        view()->composer(['adminView.*', 'app_layout.menu'], function ($view)
        {
            if(Auth::check() == true){
                $data1 = DB::table('devis')->where('traiter',0)->count();
                $data2= DB::table('travails')->where('traiter',0)->count();

                $data3 = DB::table('users')->get(['name', 'id']);
                $data4 = DB::table('employes')->get(['id','name']);

                $nbre =[
                    'devis'=>$data1,
                    'job'=>$data2
                ];
                $view->with(['les_nbre'=>$nbre , 'les_clients'=>$data3, 'les_employes'=>$data4]);
            }


        });


    }
}
