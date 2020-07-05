<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $fillable = [
        'role_id', 'email', 'firstname', 'lastname', 'activation_token'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['fullname'];



    /*
     *  Relationships
     *  -----------------------------------------------
     */

    public function role()
    {
    	return $this->belongsTo(Role::class);
    }

    public function picture()
    {
    	return $this->morphOne(Picture::class, 'picturable');
    }



    /*
     *  Custom Attributes
     *  ----------------------------------------------
     */

    public function getFullnameAttribute()
    {
    	return $this->firstname . ' ' . $this->lastname;
    }



    /*
     *  Helpers
     *  ----------------------------------------------
     */

    public function isAdmin()
    {
    	return $this->role->level == 1;
    }

    public function isGM()
    {
    	return $this->role->level == 2;
    }

	public function getPicture()
	{
		$picture = $this->picture()->first();

		if($picture != null)
		{
			return asset('img/users/' . $picture->filename);
		}

		return asset('img/default.png');
	}

}
