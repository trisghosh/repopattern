<?php 
use Illuminate\Support\Facades\Mail;
if(!function_exists('img'))
{
	function img($path,$options='')
	{
		$attributes="";
		if(isset($options) && $options!='')
		{
			foreach ($options as $key => $value) {
				$attributes.=' '.$key.'="'.$value.'"';
			}			
		}
		echo  '<img src="'.$path.'" '.$attributes.'>';
	}
}
if(!function_exists('sendEmail'))
{
	function sendEmail($user,$template,$subject)
	{
		$from_email=env('MAIL_FROM_ADDRESS');
		$from_name=env('MAIL_FROM_NAME');
		Mail::send('welcome', ['user' => $user], function ($m) use ($user,$from_email,$from_name,$subject) {
           $m->from($from_email, $from_name);
           $m->to($user->email, $user->name)->subject($subject);
        });
	}//end of function
}
