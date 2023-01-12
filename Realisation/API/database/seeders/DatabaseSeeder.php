<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Formateur;
use App\Models\AnneFormation;
use App\Models\Groupes;
use App\Models\Apprenant;
use App\Models\PreparationBrief;
use App\Models\PreparationTache;
use App\Models\GroupesApprenant;
use App\Models\Brief;
use App\Models\Tache;
use App\Models\GroupesPreparationBrief;

// use Database\Factories\FormateurFactory;
// use Database\Factories\AnneFormationFactory;
// use Database\Factories\GroupesFactory;
// use Database\Factories\ApprenantFactory;
// use Database\Factories\PreparationBriefFactory;
// use Database\Factories\PreparationTacheFactory;
// use Database\Factories\GroupesApprenantFactory;
// use Database\Factories\BriefFactory;
// use Database\Factories\TacheFactory;
// use Database\Factories\GroupesPreparationBriefFactory;

class DatabaseSeeder extends Seeder
{
  public function run (){
    Formateur::factory(2)->create();
    AnneFormation::factory(2)->create();
    Groupes::factory(2)->create();
    Apprenant::factory(5)->create();
    PreparationBrief::factory(4)->create();
    PreparationTache::factory(6)->create();
    GroupesApprenant::factory(2)->create();
    Brief::factory(4)->create();
    Tache::factory(6)->create();
    GroupesPreparationBrief::factory(6)->create();
  }
}
