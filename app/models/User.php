<?php

class User extends Model
{
	public function set_password($password)
	{
		$this->assign_attribute('password', password_hash($password, PASSWORD_DEFAULT));
	}
	
	public function verifyPassword($password)
	{
		return password_verify($password, $this->password);
	}
}
