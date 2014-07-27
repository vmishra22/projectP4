<?php


class Task extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tasks';

	# Relationship method...
    public function user() {
    
    	# Books belongs to Author
	    return $this->belongsTo('User');
    }
}
