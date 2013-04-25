<?php
include_once __DIR__ . DS . 'Markdown.php';

class Markdown implements PluginInit
{
	private $MD;
	private $framework;
	
	public function __construct($framework)
	{
		$this->framework = $framework;
	}
	
	public function Init()
	{
		$this->MD = new Michelf\Markdown();
	}
	
	public function Transform($markdown)
	{
		return $this->MD->transform($markdown);
	}
}