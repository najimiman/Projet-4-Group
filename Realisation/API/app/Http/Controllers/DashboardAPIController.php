<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnneFormation;
use App\Models\Groupes;
use App\Models\PreparationBrief;
use App\Models\Tache;


class DashboardAPIController extends Controller
{
    // KPw@4qsx2sM4A9x
    public function index()
    {
        return AnneFormation::all();
    }

    public function formation(Request $request, $id)
    {
        $year = AnneFormation::findOrFail($id);
        $group = Groupes::where('Annee_formation_id', $year->id)
            ->first();
        $studentCount = $group->students->count();
        $total_done = Tache::where('Etat', '=', 'terminer')
            ->get()->count();
        $total_pause = Tache::where('Etat', '=', 'en pause')
            ->get()->count();
        $total_standby = Tache::where('Etat', '=', 'en cours')
            ->get()->count();
        $total_states = ($total_done + $total_pause + $total_standby);
        $group_progress = ($total_done * 100) / $total_states;

        return [
            'year' => $year,
            'group' => $group,
            'studentCount' => $studentCount,
            'group_av' => intval($group_progress),
        ];

    }
    
}
