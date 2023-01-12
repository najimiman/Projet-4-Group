<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnneFormation;
use App\Models\Groupes;
use App\Models\PreparationBrief;
use App\Models\Tache;


class DashboardAPIController extends Controller
{
    public function years()
    {
        $years = AnneFormation::all();
        return $years;
    }

    public function formation(Request $request, $id)
    {
        $year = AnneFormation::findOrFail($id);
        $group = Groupes::where('Annee_formation_id', $year->id)
            ->first();

        // 
        $studentCount = $group->students
            ->count();

        // 
        $brief_aff = $group->students
            ->map(
                function ($student) {
                    return $student->student_preparation_brief;
                }
            )->unique('id');

        //
        $brief_info = [];
        $group->students()->get();

        // Calculer les portions
        $total_done = Tache::where('Etat', '=', 'terminer')->get()->count();
        $total_pause = Tache::where('Etat', '=', 'en pause')->get()->count();
        $total_standby = Tache::where('Etat', '=', 'en cours')->get()->count();

        // 
        $total_states = ($total_done + $total_pause + $total_standby);
        $group_progress = ($total_done * 100) / $total_states;

        // 
        $brief_name = PreparationBrief::all('Nom_du_Brief');
        $brief_id = PreparationBrief::all('id');

        // 
        $brief_count = PreparationBrief::all('id')->count();
        $total_done_task = Tache::where('Etat', '=', 'terminer')
            ->get()
            ->where('preparation_brief_id', '=', 4)
            ->count();

        $tasks = Tache::all();
        $tasks_ids = [];
        foreach ($tasks as $task) {
            $tasks_ids[] =  $task->id;
        }
        // dump($tasks_ids);

        foreach ($tasks_ids as $key => $val) {
            $total_done_task = Tache::where('Etat', '=', 'terminer')
                ->get()
                ->where('preparation_brief_id', '=', 4)
                ->count();
        }
    }


}

