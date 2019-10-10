<?php 

namespace App\Repositories;
use App\Interfaces\UserInterface;
use App\User;
class UserRepository implements UserInterface
{
	protected $usermodel;
	public function __construct(User $user)
	{
		$this->usermodel=$user;
	}//end of function
	public function getAllUserWithRole()
	{
		// User::all();
		return $this->usermodel->all();
	}
	public function getUserWithRole($id)
	{
		return $this->usermodel->findorfail($id);
	}
	
}
