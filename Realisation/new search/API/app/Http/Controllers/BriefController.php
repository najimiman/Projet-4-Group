<?php

namespace App\Http\Controllers;

use App\Models\PreparationTache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BriefController extends Controller
{
    // public function index(Request $request)
    // {
    // $brief=PreparationBrief::all();
    // return view('tasks.index',['brief'=>$brief,'tasks'=>$tasks]);


    // $users = PreparationTache::where([
    //     ['Nom_tache', '!=', Null],
    //     [function ($query) use ($request) {
    //         if (($s = $request->s)) {
    //             $query->orWhere('Nom_tache', 'LIKE', '%' . $s . '%')
    //                 ->get();
    //         }

    //     }]
    // ])->paginate(3);
    //      $tache =PreparationTache::latest()->paginate(3);

    //     return view('aa', compact('tache'));
    // }

    // public function search(Request $request){
    //     $tache=PreparationTache::where('Nom_tache','Like','%'.$request->searchtask.'%')
    //     ->orderBy('id','desc')->paginate(3);
    //     if($tache->count() >= 1){
    //         return view('aa', compact('tache'))->render();
    //     }
    //     else{
    //         return response()->json([
    //             'status'=>'nothing_found'
    //         ]);
    //     }


    // }
    public function index()
    {
        $data = DB::table('preparation_tache')->orderBy('id', 'asc')->paginate(2);
        return view('pagination', compact('data'));
    }

    public function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $data = DB::table('preparation_tache')
                ->where('Nom_tache', 'like', '%' . $query . '%')
                // ->orWhere('Nom_tache', 'like', '%'.$query.'%')
                ->paginate(2);
            return view('pagination_data', compact('data'))->render();
        }
    }
}
