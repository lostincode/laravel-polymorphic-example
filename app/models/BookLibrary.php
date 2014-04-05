<?php

class BookLibrary extends \Eloquent {

    protected $table = 'BookLibraries';

	// Add your validation rules here
	public static $rules = [];

	// Don't forget to fill this array
	protected $fillable = ['name'];

    /**
     * Relationship with Book table
     */
    public function books()
    {
      return $this->hasMany('Book');
    }

    /**
     * Relationship with Comment table
     */
    public function comments() {
        return $this->morphMany('Comment', 'commentable');
    }
}