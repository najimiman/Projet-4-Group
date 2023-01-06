<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprenantPreparationBrief extends Model
{
    use HasFactory;
    protected $table = "apprenant_preparation_brief";
    public $timestamps= false;
    protected $fillable = [
    "Date_affectation",
    "Preparation_brief_id",
    "Apprenant_id"
    ];

    public function apprenantsBrief(){
        return $this->belongsToMany(PreparationBrief::class,'apprenant_preparation_brief');
    }

    public function briefsApprenant(){
        return $this->belongsToMany(apprenant::class,'apprenant_preparation_brief');
    }

}
