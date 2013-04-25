<?php

class Page extends Model
{
	public function set_title($title)
	{
		if(empty($this->slug))
		{
			$this->slug = $this->Slugify($title);
		}
		$this->assign_attribute('title', $title);
	}
	
	public function set_slug($slug)
	{
		$this->assign_attribute('slug', $this->Slugify($slug));
	}
	
	public function set_contentmd($content)
	{
		$this->content = $this->Markdown($content);
		$this->assign_attribute('contentmd', $content);
	}
	
	static function Slugify($title)
	{
		return preg_replace('/\W+/','-', strtolower($title));
	}
	
	static function Deslugify($slug)
	{
		return ucwords(preg_replace('/-/',' ', $slug));
	}
	
	static function Markdown($content)
	{
		return Framework::GetInstance()->Markdown->Transform($content);
	}
}