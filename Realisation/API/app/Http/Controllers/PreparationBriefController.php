<?php

namespace App\Http\Controllers;

use App\Models\Formateur;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PreparationBrief;

class PreparationBriefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $briefs = PreparationBrief::all();
      
        $briefs_page =PreparationBrief::paginate(3);
        
        // $pagination = PreparationTache::paginate($tasks);

        // $tasks =PreparationTache::count();
        // dd($count);
        return view('preparationBrief.index',['briefs'=>$briefs,'briefs_page'=>$briefs_page]);
    }


    // public function filter_bief(Request $request){
    //     $task=PreparationBrief::where('Preparation_brief_id','Like','%'.$request->filter.'%')->get();
    //     // $task =PreparationTache::paginate(3);
    //     return response(['dataTask'=>$task]);
    // }

    // public function search_tache(Request $request){
    //     $searchtask=PreparationBrief::where('Nom_tache','Like','%'.$request->searchtask.'%')->get();
    //     return response(['search'=>$searchtask]);

    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formateurs=Formateur::all();
        return view('preparationBrief.create',['formateurs'=>$formateurs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nom_du_brief'=>'required|max:50',
            'Duree'=>'required'
        ]);
        PreparationBrief::create([

            'Nom_du_brief'=>$request->Nom_du_brief,
            'Description'=>$request->Description,
            'Duree'=>$request->Duree,
            'Formateur_id '=>$request->Formateur_id 
        ]);

        return to_route('brief.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $edit=PreparationBrief::findOrFail($id);
    //     // $brief=PreparationBrief::all();
    //     // return view('tasks.edit',['edit'=>$edit,'brief'=>$brief]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'Nom_tache'=>'required|max:50',
    //         'Duree'=>'required'
    //     ]);
    //     $update=PreparationBrief::findOrFail($id);
    //     $update->Nom_tache=$request->get('Nom_tache');
    //     $update->Description=$request->get('Description');
    //     $update->Duree=$request->get('Duree');
    //     $update->Preparation_brief_id=$request->get('Preparation_brief_id');
    //     $update->save();


    //     return redirect('/task')->with('success');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $delete = PreparationBrief::findOrFail($id);
    //     $delete->delete();
    //     return redirect('/task');
    // }

     // export data format excel

    //  public function exportexcel(){
    //     return Excel::download(new TaskExport,'datapage.xlsx');
    // }

     // import data format excel
    //  public function importexcel(Request $request){

    //     Excel::import(new TaskImport, $request->file);
    //     return redirect()->back();

    // }

    //  Export data form PDF

    public function generatepdf(){

        $preparationBrief = PreparationBrief::all();
        $pdf = Pdf::loadView('pdf.preparationBrief', compact('preparationBrief'));
            return $pdf->download('preparationBrief.pdf');
        }
}
