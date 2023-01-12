<?php

namespace App\Http\Controllers;

use App\Models\PreparationTache;
use Illuminate\Http\Request;

class BriefController extends Controller
{
    public function index(Request $request)
    {
        $showinput=true;
        
        $tachee =PreparationTache::latest()->paginate(3);

        if($request->searchtask){
            if($request->ajax()){
                $showinput=false;
                
            }
           $searchtask= $request->searchtask;
           
            $tache=PreparationTache::where('Nom_tache','Like','%'.$request->searchtask.'%')
            ->orderBy('id','desc')->paginate(3)->withQueryString();
            if($tache->count() >= 1){
                return view('aa', compact('tache','showinput','searchtask'));
            }
            else{
                return response()->json([
                    'status'=>'nothing_found'
                ]);
            }
        }
        else{
            $tache=$tachee;
            return view('aa', compact('tache','showinput'));
            // return redirect('/exemple');
        }
    }
    
    public function search(Request $request){
    
        // $tachee =PreparationTache::latest()->paginate(3);
        // if($request->searchtask){
        //     $tache=PreparationTache::where('Nom_tache','Like','%'.$request->searchtask.'%')
        //     ->orderBy('id','desc')->paginate(3)->withQueryString();
        //     if($tache->count() >= 1){
        //         return view('cc', compact('tache'));
        //     }
        //     else{
        //         return response()->json([
        //             'status'=>'nothing_found'
        //         ]);
        //     }
        // }
        // else{
        //     $tache=$tachee;
        //     return view('cc', compact('tache'));
        //     // return redirect('/exemple');
        // }
       
        

    }
}
