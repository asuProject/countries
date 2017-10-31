<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'towns';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['country_id', 'name'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

	public function Country()
	{
		return $this->belongsTo('App\Country');
	}

	public function Sponsor()
	{
		return $this->hasMany('App\Sponsor');
	}

}