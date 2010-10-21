<?php

class Blog extends Controller {
	function Blog()
	{
		parent::Controller();
		
  	$this->load->model(array('Post', 'User'));
  	$this->load->helper('url');
	}
	
	function index()
	{
	  $data = array();
		$data['posts'] = $this->Post->get_recent_posts();
		foreach ($data['posts'] as $post) {
			$data['authors'][$post->id] = $this->User->get_user_by_id($post->author);
		}
		
		$this->load->view('header', array('title' => 'SwirlyBlog'));
		$this->load->view('blog/index', $data);
		$this->load->view('footer');
	}
	
	function author($user_id)
	{
  	$data = array();
		$data['posts'] = $this->Post->get_posts_by_author($user_id);
		$data['author'] = $this->User->get_user_by_id($user_id);
		
		$this->load->view('header', array('title' => 'SwirlyBlog'));
		$this->load->view('blog/author', $data);
		$this->load->view('footer');
	}
	
	function post($post_id)
	{
  	$data = array();
		$data['post'] = $this->Post->get_post_by_id($post_id);
		$data['author'] = $this->User->get_user_by_id($data['post']->author);
		
		$this->load->view('header', array('title' => $data['post']->title . ' - SwirlyBlog'));
		$this->load->view('blog/post', $data);
		$this->load->view('footer');
	}
}
