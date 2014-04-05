<?php

class Comment extends \Eloquent {

    // Don't forget to fill this array
	protected $fillable = ['comment', 'commentable_id', 'commentable_type'];

    /**
     * Polymorphic relationship
     */
    public function commentable() {
        return $this->morphTo();
    }
}