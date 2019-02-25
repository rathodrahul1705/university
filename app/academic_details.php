<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class academic_details extends Model
{
 // protected $fillable = array('academic_details_id') ;
	
	public function personal_details() {
	    return $this->hasOne('personal_details', 'academic_details');
	}

	public function address_type()
	{
		return $this->belongsTo(\App\personal_details::class);
	}


}
