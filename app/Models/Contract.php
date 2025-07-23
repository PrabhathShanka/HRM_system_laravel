<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = ['employee_id', 'designation_id', 'start_date', 'end_date', 'rate_type', 'rate'];

    protected $appends = ['duration'];

    protected $casts = [
        'start_date',
        'end_date'
    ];
    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function scopeInCompany($query)
    {
        return $query->whereHas('designation', function ($q) {
            $q->inCompany();
        });
    }
    public function getDurationAttribute()
    {
        return Carbon::parse($this->start_date)->diffForHumans($this->end_date);
    }

    public function scopeSearchByEmployee($query, $name)
    {
        return $query->whereHas('employee', function ($q) use ($name) {
            $q->where('name', 'like', "%$name%");
        });
    }

    public function getTotalEarnings($monthYear)
    {
        return $this->rate_type == 'monthly' ? $this->rate : $this->rate * Carbon::parse($monthYear)->daysInMonth;
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
