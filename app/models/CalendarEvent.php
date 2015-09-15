<?php

use \Esensi\Model\Model;

class CalendarEvent extends Model {
	
	protected $fillable = [];

	protected $table = 'events';

	public function user()
    {
        return $this->belongsTo('User');
    }

}