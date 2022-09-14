<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdultPatient;
use App\Models\AdultEvaluationFile;
use Carbon\Carbon;

class AdultEvaluation extends Model
{
    use HasFactory;

    protected $fillable = [
      'adult_patient_id', 'file_path', 'smoke', 'pregnant', 'pacemaker', 'allergies', 'medical_diagnoses', 'onset_date', 'if_any_surgery', 'if_any_surgery_name', 'if_any_surgery_date', 'medication', 'previous_complaints_surgeries', 'previous_diagnoses_medications', 'major_complaint', 'start_date', 'mechanism_injury', 'symptoms', 'pain_duration', 'pain_level',
      'condition', 'your_symptoms', 'pain_level_best', 'pain_level_worst', 'decreases_makes', 'increases_makes', 'previous_intervention', 'previous_interventiony_other', 'previous_interventiony_file', 'following_today', 'discomfort_area','file_path'
    ];

    public function adult_patient()
    {
        return $this->belongsTo(AdultPatient::class);
    }

    public function adult_evaluation_files()
    {
        return $this->hasMany(AdultEvaluationFile::class);
    }

    public function getOnsetDateAttribute($value)
    {
         if($value != null){
           return Carbon::parse($value)->format('m/d/Y');
         }
         return null;
    }

     public function setOnsetDateAttribute($value)
     {
         if($value != null){
           $this->attributes['onset_date'] = is_null($value)?null:Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
         }
     }

    public function getStartDateAttribute($value)
    {
        if($value != null){
            return Carbon::parse($value)->format('m/d/Y');
        }
        return null;
    }

    public function setStartDateAttribute($value)
    {
        if($value != null){
            $this->attributes['start_date'] = is_null($value)?null:Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        }
    }

    public function getIfAnySurgeryDateAttribute($value)
    {
        if($value != null){
            return Carbon::parse($value)->format('m/d/Y');
        }
        return null;
    }

    public function setIfAnySurgeryDateAttribute($value)
    {
        if($value != null){
            $this->attributes['if_any_surgery_date'] = is_null($value)?null:Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        }
    }

    public function getFollowingTodayAttribute($value)
    {
        return explode (",", $value);
    }

    public function setFollowingTodayAttribute($value)
    {
        if($value != null){
            $this->attributes['following_today'] = implode(",", $value);
        }
    }

    public function getDecreasesMakesAttribute($value)
    {
        return explode (",", $value);
    }

    public function setDecreasesMakesAttribute($value)
    {
        if($value != null){
            $this->attributes['decreases_makes'] = implode(",", $value);
        }
    }

    public function getIncreasesMakesAttribute($value)
    {
        return explode (",", $value);
    }

    public function setIncreasesMakesAttribute($value)
    {
        if($value != null){
            $this->attributes['increases_makes'] = implode(",", $value);
        }
    }

    public function getPreviousInterventionAttribute($value)
    {
        return explode (",", $value);
    }

    public function setPreviousInterventionAttribute($value)
    {
        if($value != null){
            $this->attributes['previous_intervention'] = implode(",", $value);
        }
    }
}
