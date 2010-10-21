<?php

class Welcome extends Controller {
	function Welcome()
	{
		parent::Controller();	
	}
	
	function index()
	{
	  $this->load->view('header', array('title' => 'SwirlyBlog'));
		$this->load->view('welcome/index');
		$this->load->view('footer');
	}
}
