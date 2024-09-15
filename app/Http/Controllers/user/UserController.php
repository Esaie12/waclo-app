<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;
use App\Models\Administrateur;
use App\Models\Devi;
use App\Models\Travail;
use App\Models\Employe;
use App\Models\Contrat;
use App\Models\Programme;

class UserController extends Controller
{
    function home_user(){

        $contrat = DB::table('contrats')
        ->where('id_client', Auth::user()->id)
        ->first();

        $programme = DB::table('programmes')
        ->join('contrats', 'programmes.id_contrat','contrats.id')
        ->where('contrats.id_client',Auth::user()->id)
        //->where('programmes.effectuer',0)
        ->orderBy('programmes.date_passage')
        ->limit(5)
        ->get(['programmes.*']);

        return view('userView.home',['contrat'=>$contrat , 'programmes'=>$programme]);
    }

    function mesprogrammes(){

        $programme = DB::table('programmes')
        ->join('contrats', 'programmes.id_contrat','contrats.id')
        ->where('contrats.id_client',Auth::user()->id)
        ->where('programmes.date_passage','>=', date('Y-m-d'))
        ->orderBy('programmes.date_passage')
        ->get(['programmes.*']);

        return view('userView.mesProgrammes',['programmes'=>$programme, 'result'=>0]);
    }

    function confirm_programmes(Request $request , $id){

        $r = Programme::find($id);
        $r->effectuer = 1;
        $r->remarques = $request['remarques'];
        $r->save();

        return redirect()->back();
    }

    function programmes_search(Request $req){

        //"date_min":null,"date_max":null,"type"
        $req->validate([
            'date_min'=>['nullable', 'date'],
            'date_max'=>['nullable', 'date'],
            'type'=>['required', 'numeric', 'min:0', 'max:2'],
        ]);

        $data = Programme::query();

        $data = $data->join('contrats', 'programmes.id_contrat','contrats.id')
        ->where('contrats.id_client',Auth::user()->id);


        if( !empty($req['date_min']) ){

            $data = $data->where('programmes.date_passage','>=', $req['date_min']);
        }
        if( !empty($req['date_max'])){

            $data = $data->where('programmes.date_passage','<=', $req['date_min']);
        }
        if( $req['type'] < 2 ){
            $data = $data->where('programmes.effectuer',$req['type']);
        }

        $data = $data->orderBy('programmes.date_passage')
        ->get(['programmes.*']);

        return view('userView.mesProgrammes',['programmes'=>$data, 'result'=>1, 'date_max'=>$req['date_max'], 'type'=>$req['type'] ,'date_min'=>$req['date_min'] ]);
    }

    function mesContrats(){

        $contrat = DB::table('contrats')
        ->where('id_client', Auth::user()->id)
        ->get();

        return view('userView.mesContrats',['contrats'=>$contrat]);

    }

    function mesProgrammes_Contrats($id){

        $programme = DB::table('programmes')
        ->join('contrats', 'programmes.id_contrat','contrats.id')
        ->where('contrats.id_client',Auth::user()->id)
        ->where('contrats.id',$id)
        ->where('programmes.date_passage','>=', date('Y-m-d'))
        ->orderBy('programmes.date_passage')
        ->get(['programmes.*']);

        return view('userView.mesContratsProgramme',['programmes'=>$programme, 'result'=>0]);
    }
}
