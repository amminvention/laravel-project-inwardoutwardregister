<?php

namespace App;

use Carbon\Carbon;
use Request;
use Illuminate\Database\Eloquent\Model;

class Inward extends Model
{
    protected $fillable = [
        'inward_no', 'inward_date', 'receive_date', 'letter_date', 'letter_ref_no', 'subject', 'from_details_name',
        'from_details_address', 'to_details_person_name', 'courier_details_courier_name', 'courier_details_description',
        'mode_id', 'outward_id', 'department_id', 'courier_id'
    ];

    public function mode()
    {
        return $this->belongsTo('App\Mode');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function courier()
    {
        return $this->belongsTo('App\Courier', 'courier_id');
    }

    public function outward()
    {
        return $this->belongsTo('App\Outward', 'outward_id');
    }

    public function setInwardDateAttribute($value)
    {
        $this->attributes['inward_date'] = date("Y-m-d", strtotime($value));
    }

    public function setReceiveDateAttribute($value)
    {
        $this->attributes['receive_date'] = date("Y-m-d", strtotime($value));
    }

    public function setLetterDateAttribute($value)
    {
        $this->attributes['letter_date'] = date("Y-m-d", strtotime($value));
    }

    public function scopeSearch($query, $fromDate, $toDate, $mode)
    {


        return empty(Request::anyFilled('from_letter_date', 'to_letter_date', 'mode_id')) ? $query : $query
            ->if($mode, 'mode_id', '=', $mode)
            ->when($fromDate == '' ? null : date("Y-m-d", strtotime($fromDate)), function ($query, $fromDate) {
                return $query->where('inward_date','>=', $fromDate);
            })
            ->when($toDate == '' ? null : date("Y-m-d", strtotime($toDate)), function ($query, $toDate) {
                return $query->where('inward_date','<=', $toDate);
            });

    }


}
