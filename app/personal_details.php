<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personal_details extends Model
{
	public function academic_details() {
	    return $this->hasOne('academic_details', 'personal_details');
	}
	// public function academic_details()
	// {
	// 	return $this->belongsTo(\App\academic_details::class);
	// }

}
