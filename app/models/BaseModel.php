<?php

use Carbon\Carbon;

class BaseModel extends Eloquent {
	
	// Stuff goes here 
	public function getCreatedAtAttribute($value)
	{
    	$utc = Carbon::createFromFormat($this->getDateFormat(), $value);
    	return $utc->setTimezone(Config::get('app.localTimezone'));
	}

	public function getUpdatedAtAttribute($value)
	{
		$utc = Carbon::createFromFormat($this->getDateFormat(), $value);
		return $utc->setTimezone('Amercia/Chicago');
	}

}