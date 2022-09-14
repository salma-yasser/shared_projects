<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\ChildNotes;
use App\Models\Nationality;
use App\Models\ChildPackage;
use App\Models\ChildProgram;
use App\Models\ChildDepartment;
use App\Models\ChildEvaluation;
use App\Models\ChildAppointment;
use App\Models\ChildRevaluation;
use App\Models\ChildCancelRequest;
use App\Models\ChildPatientIncome;
use App\Models\ChildPatientOutcome;
use App\Models\ChildDiscountRequest;
use App\Models\ChildExtraRebookRequest;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChildChangeAppointmentRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChildPatient extends Model
{
    use HasFactory;

    protected $fillable = [
    'name', 'email', 'password', 'profile_photo_path', 'fullname', 'kind', 'birthdate', 'nationality_id',
    'address', 'sa_id', 'fullname_parent', 'work_parent', 'mobile_1', 'mobile_2', 'sa_id_parent', 'relation_parent', 'entry_date', 'previous_session', 'previous_session_place', 'previous_session_number', 'deleted'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
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

    public function child_departments()
    {
        return $this->hasMany(ChildDepartment::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function child_packages()
    {
        return $this->hasMany(ChildPackage::class)->orderBy('supscription_date', 'desc');
    }

    public function active_packages()
    {
        return $this->hasMany(ChildPackage::class)
              ->where('status', config('enums.patient_package_status_values.active'));
    }

    public function cancelled_packages()
    {
        return $this->hasMany(ChildPackage::class)
              ->where('status', config('enums.patient_package_status_values.cancelled'));
    }

    public function not_refunded_packages()
    {
        return $this->hasMany(ChildPackage::class)
            ->where('status', config('enums.patient_package_status_values.cancelled'))
            ->where('refund', '>', '0')
            ->where('is_refunded', '0');
    }

    public function child_appointments()
    {
        return $this->hasMany(ChildAppointment::class)->orderBy('time', 'desc');
    }

    public function child_patient_incomes()
    {
        return $this->hasMany(ChildPatientIncome::class);
    }

    public function child_patient_outcomes()
    {
        return $this->hasMany(ChildPatientOutcome::class);
    }

    public function child_extra_rebook_requests()
    {
        return $this->hasMany(ChildExtraRebookRequest::class)->latest();
    }

    public function child_discount_requests()
    {
        return $this->hasMany(ChildDiscountRequest::class)->latest();
    }

    public function child_change_appointment_requests()
    {
        return $this->hasMany(ChildChangeAppointmentRequest::class)->latest();
    }

    public function child_cancel_requests()
    {
        return $this->hasMany(ChildCancelRequest::class)->latest();
    }
    
    public function child_notes()
    {
        return $this->hasMany(ChildNotes::class);
    }

}
