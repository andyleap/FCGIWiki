<?php

class UserController extends Controller
{
	public $loginTemplate;
	public $createTemplate;
	
	function Init()
	{
		$this->loginTemplate = $this->templates['user/login'];
		$this->createTemplate = $this->templates['user/create'];
	}
	
	function index()
	{
		
		$this->loginTemplate->Render();
	}
	
	function create()
	{
		
		$this->createTemplate->Render();
	}
}