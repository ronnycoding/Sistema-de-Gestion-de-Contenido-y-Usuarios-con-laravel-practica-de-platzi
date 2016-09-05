<?php

namespace laravelapplication;

use Illuminate\Database\Eloquent\Model;

class UserRegistered extends Model
{
    private $user;
    
    public function __construct(User $user)
    {
    	$this->user;
    }
    
    public function user(){
    	return $this->user;
    }
}
