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
        $promo = groupes::all();
        $brief = PreparationBrief::all();
        // $apprenants = apprenant::paginate(4);
        $apprenants = apprenant::all();
        return view('assign.index', ['brief' => $brief, 'promo' => $promo, 'apprenants' => $apprenants]);
    }

    public function filter_par_group(Request $request)
    {
        if ($request->has('filter') && !empty($request->filter)) {

            $apprenants = DB::table('apprenant')
                ->select("*")
                ->join('groupes_apprenant', 'apprenant.id', '=', 'groupes_apprenant.apprenant_id')
                ->join('Groupes', 'groupes_apprenant.Groupe_id', '=', 'Groupes.id')
                ->where('Groupes.id', 'Like', '%' . $request->filter . '%')
                ->get();

            return response(['apprenants' => $apprenants]);
        } else {
            $apprenants = Apprenant::all();
            return response(['apprenants' => $apprenants]);
            dd($apprenants);
        }
    }

    public function form_save(Request $request)
    {
        if ($request->has('select') && !empty($request->select)) {
            $briefs = DB::table('preparation_brief')
                ->where('preparation_brief.id', $request->select)
                ->first();

            // dd($request); 
            // dd($briefs);
            // dd($request->input('check'));
            $arrayApprenant = implode(',', $request->input('check'));
            print_r($arrayApprenant);
            print_r($briefs->id);

            // foreach ($request->checkbox as $key) {
                $insert = [
                    'Apprenant_id' => $arrayApprenant,
                    'Preparation_brief_id' => $request->$briefs->id,
                    'Date_affectation' => ''
                ];
                DB::table('apprenant_preparation_brief')->insert($insert);
            // }

            // return redirect()->back();

        }else {
            return view('welcome');
        }
    }
}
