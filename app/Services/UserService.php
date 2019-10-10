<?php 
namespace App\Services;
use App\Interfaces\UserInterface;

class UserService 
{
	protected $user;

	public function __construct(UserInterface $user)
	{
		$this->user=$user;
	}//end of function
	function getUsersWithWordPressAvatar()
	{
		$users=$this->user->getAllUserWithRole();
		$gravatar_url=env('GRAVATAR_URL').'[hash]/?size=200&d=mp';
		foreach($users as $user)
		{			
			$emailhash=$this->getEmailHash($user->email);
			$user->avatar=str_replace('[hash]',$emailhash,$gravatar_url);
			$user->options=array('style'=>'border-radius:50%;border:2px  solid #000000;');
		}
		return $users;
	}
	function getUserWithWordPressAvatar($id='')
	{
		$user=$this->user->getUserWithRole($id);
		$gravatar_url=env('GRAVATAR_URL').'[hash]/?size=200&d=mp';
		$emailhash=$this->getEmailHash($user->email);
		$user->avatar=str_replace('[hash]',$emailhash,$gravatar_url);
		$user->options=array('style'=>'border-radius:50%;border:2px  solid #000000;');
		return $user;
	}
	public function getEmailHash($email)
	{
		return md5( strtolower( trim($email) ) );
	}	
	
}