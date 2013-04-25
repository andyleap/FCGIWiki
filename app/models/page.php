<?php

class Page extends Model
{
	public function set_title($title)
	{
		$this->slug = $this->Slugify($title);
		var_dump($this->slug);
		$this->assign_attribute('title', $title);
	}
	
	public function set_contentmd($content)
	{
		$this->content = $this->Markdown($content);
		$this->assign_attribute('contentmd', $content);
	}
	
	static function Slugify($title)
	{
		return preg_replace('/\W+/','-', $title);
	}
	
	static function Deslugify($slug)
	{
		return preg_replace('/-/',' ', $slug);
	}
	
	static function Markdown($content)
	{
		return Framework::GetInstance()->Markdown->Transform($content);
	}
}