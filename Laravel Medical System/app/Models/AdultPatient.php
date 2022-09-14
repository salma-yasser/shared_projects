<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\adultNotes;
use App\Models\Department;
use App\Models\Nationality;
use App\Models\AdultPackage;
use App\Models\AdultEvaluation;
use App\Models\AdultAppointment;
use App\Models\AdultRevaluation;
use App\Models\AdultCancelRequest;
use App\Models\AdultPatientIncome;
use App\Models\AdultPatientOutcome;
use App\Models\AdultDiscountRequest;
use App\Models\AdultExtraRebookRequest;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdultChangeAppointmentRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdultPatient extends Model
{
    use HasFactory;

    protected $fillable = [
    'name', 'email', 'password', 'profile_photo_path', 'fullname', 'kind', 'birthdate', 'nationality_id',
    'address', 'work', 'mobile_1', 'sa_id', 'entry_date', 'department_id', 'required_session_number', 'deleted'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // /**
    //  * The accessors to append to the model's array form.
    //  *
    //  * @var array
    //  */
    // protected $appends = [
    //     'profile_photo_url',
    // ];

    public function getBirthdateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function setBirthdateAttribute($value)
    {
        $this->attributes['birthdate'] = is_null($value)?null:Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function getEntryDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function setEntryDateAttribute($value)
    {
        $this->attributes['entry_date'] = is_null($value)?null:Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function getAge()
    {
        return Carbon::parse($this->attributes['birthdate'])->diff(Carbon::now())->format('%y');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function adult_packages()
    {
        return $this->hasMany(AdultPackage::class)->orderBy('supscription_date', 'desc');
    }

    public function active_packages()
    {
        return $this->hasMany(AdultPackage::class)
              ->where('status', config('enums.patient_package_status_values.active'));
    }

    public function cancelled_packages()
    {
        return $this->hasMany(AdultPackage::class)
              ->where('status', config('enums.patient_package_status_values.cancelled'));
    }

    public function not_refunded_packages()
    {
        return $this->hasMany(AdultPackage::class)
            ->where('status', config('enums.patient_package_status_values.cancelled'))
            ->where('refund', '>', '0')
            ->where('is_refunded', '0');
    }

    public function adult_appointments()
    {
        return $this->hasMany(AdultAppointment::class)->orderBy('time', 'desc');
    }

    public function adult_patient_incomes()
    {
        return $this->hasMany(AdultPatientIncome::class);
    }

    public function adult_patient_outcomes()
    {
        return $this->hasMany(AdultPatientOutcome::class);
    }

    public function adult_extra_rebook_requests()
    {
        return $this->hasMany(AdultExtraRebookRequest::class)->latest();
    }

    public function adult_discount_requests()
    {
        return $this->hasMany(AdultDiscountRequest::class)->latest();
    }

    public function adult_change_appointment_requests()
    {
        return $this->hasMany(AdultChangeAppointmentRequest::class)->latest();
    }

    public function adult_cancel_requests()
    {
        return $this->hasMany(AdultCancelRequest::class)->latest();
    }

    public function adult_evaluations()
    {
        return $this->hasMany(AdultEvaluation::class);
    }
    public function adult_revaluations()
    {
        return $this->hasMany(AdultRevaluation::class);
    }
    public function Adult_notes()
    {
        return $this->hasMany(adultNotes::class);
    }
}
