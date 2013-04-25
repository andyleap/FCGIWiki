<?php

class WikiController extends Controller
{
	public $viewTemplate;
	public $editTemplate;
	
	function Init()
	{
		$this->viewTemplate = $this->templates['view'];
		$this->editTemplate = $this->templates['edit'];
	}
	
	function view($slug)
	{
		$page = $this->cache->Get('page', $slug, function() use ($slug){
			return Page::find_by_slug($slug);
		}, 5);
		if($page)
		{
			$this->viewTemplate->extract($page->attributes());
		}
		else
		{
			$this->viewTemplate->title = Page::Deslugify($slug);
			$this->viewTemplate->slug = $slug;
			$this->viewTemplate->content = 'Page doesn\'t exist, goto Edit to create.';
		}
		$this->viewTemplate->Render();
	}
	
	function edit($slug)
	{
		if($this->request->SERVER['REQUEST_METHOD'] == 'POST')
		{
			$page = $this->cache->Get('page', $slug, function() use ($slug){
				return Page::find_by_slug($slug);
			}, 5);
			if(!$page)
			{
				$page = new Page();
			}
			$page->slug = $slug;
			$page->title = $this->request->POST['title'];
			$page->contentmd = $this->request->POST['content'];
			$page->save();
			$this->request->Header('Location', '/' . $page->slug);
		}
		else
		{
			$page = $this->cache->Get('page', $slug, function() use ($slug){
				return Page::find_by_slug($slug);
			}, 5);
			if($page)
			{
				$this->editTemplate->extract($page->attributes());
			}
			else
			{
				$this->editTemplate->slug = $slug;
				$this->editTemplate->title = Page::Deslugify($slug);
				$this->editTemplate->contentmd = '';
			}
			$this->editTemplate->Render();
		}
	}
}