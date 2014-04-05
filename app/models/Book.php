<?php

class Book extends \Eloquent {

	// Add your validation rules here
	public static $rules = [];

	// Don't forget to fill this array
	protected $fillable = ['name'];

    /**
     * Relationship with BookLibrary table
     */
    public function library()
    {
      return $this->belongsTo('BookLibrary');
    }

    /**
     * Relationship with Comment table
     */
    public function comments() {
        return $this->morphMany('Comment', 'commentable');
    }
}