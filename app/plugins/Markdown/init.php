<?php
include_once __DIR__ . DS . 'Markdown.php';

class Markdown implements PluginInit
{
	private $MD;
	public function Init()
	{
		$this->MD = new Michelf\Markdown();
	}
	
	public function Transform($markdown)
	{
		return $this->MD->transform($markdown);
	}
}