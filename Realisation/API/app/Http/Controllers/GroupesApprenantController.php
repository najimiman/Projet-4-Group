<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\PreparationBrief;
use App\Models\groupes;
use App\Models\apprenant;
use App\Models\ApprenantPreparationBrief;
use App\Models\GroupesApprenant;


class GroupesApprenantController extends Controller
{
    public function index()
    {
        $promo=groupes::all();
        $brief=PreparationBrief::all();
        // $apprenants=apprenant::paginate(5);
        $apprenants=apprenant::all();
        return view('assign.index',['brief'=>$brief,'promo'=>$promo,'apprenants'=>$apprenants]);
    }

    public function filter_par_group(Request $request)
    {    
        $apprenants = DB::table('apprenant')
        ->select("*" )
            ->join('groupes_apprenant', 'apprenant.id', '=', 'groupes_apprenant.apprenant_id')
            ->join('Groupes', 'groupes_apprenant.Groupe_id', '=', 'Groupes.id')
            ->where('Groupes.id','Like','%'.$request->filter.'%')
            ->get();
        return response(['apprenants'=>$apprenants]);
    }
    
    public function form_save(Request $request)
    {           
        // foreach($request->checkbox as $key=>$name){
            
            // if (is_null(PreparationBrief::find($request->Preparation_brief_id)->briefsApprenant()->find($request->Apprenant_id))) {

            //     $assign = ApprenantPreparationBrief::create([
            //         'Apprenant_id' => $request->ids$key],
            //         'Preparation_brief_id' => $request->Preparation_brief_id
            //     ]);
            // }

    
            // $insert =[
            //     'Apprenant_id' =>$request->ids$key],
            // ];
            // DB::table('apprenant_preparation_brief')->insert('$insert');

        // }

        print_r($request->ids);
        print_r($request->briefs);
        
        // $ids = $request->ids;
        // apprenant::whereIn('id',$ids)->delete();        
        // return redirect()->back();

    }
}
