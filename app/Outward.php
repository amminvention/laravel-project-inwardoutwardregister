<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Request;

class Outward extends Model
{
    protected $fillable = [
        'outward_no', 'outward_date', 'letter_date', 'letter_ref_no', 'subject', 'from_details_person_name',
        'to_details_name', 'to_details_place', 'to_details_address', 'courier_details_receipt_no', 'courier_details_receipt_date' ,
        'courier_details_amount', 'courier_details_is_return', 'courier_details_return_date', 'courier_details_description',
        'courier_details_return_reason', 'mode_id', 'inward_id', 'department_id', 'courier_id'
    ];

    public function mode()
    {
        return $this->belongsTo('App\Mode');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function inward()
    {
        return $this->belongsTo('App\Inward');
    }

    public function courier()
    {
        return $this->belongsTo('App\Courier', 'courier_id');
    }

    public function setOutwardDateAttribute($value)
    {
        $this->attributes['outward_date'] = date("Y-m-d", strtotime($value));
    }

    public function setLetterDateAttribute($value)
    {
        $this->attributes['letter_date'] = date("Y-m-d", strtotime($value));
    }

    public function setCourierDetailsReceiptDateAttribute($value)
    {
        $this->attributes['courier_details_receipt_date'] = date("Y-m-d", strtotime($value));
    }

    public function setCourierDetailsReturnDateAttribute($value)
    {
        $this->attributes['courier_details_return_date'] = date("Y-m-d", strtotime($value));
    }

    public function scopeSearch($query, $fromDate, $toDate, $mode)
    {
        return empty(Request::anyFilled('from_letter_date', 'to_letter_date', 'mode_id')) ? $query : $query
            ->if($mode, 'mode_id', '=', $mode)
            ->when($fromDate == '' ? null : date("Y-m-d", strtotime($fromDate)), function ($query, $fromDate) {
                return $query->where('outward_date','>=', $fromDate);
            })
            ->when($toDate == '' ? null : date("Y-m-d", strtotime($toDate)), function ($query, $toDate) {
                return $query->where('outward_date','<=', $toDate);
            });
    }

}
