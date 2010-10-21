<?php

class User extends Model {
	var $id = 0;
	var $email = '';
	var $password = '';
	var $displayname = '';

  function User()
  {
      parent::Model();
  }
    
	function check_email_exists($email)
	{
		$email = $this->db->escape_str($email);
		
		//$query = $this->db->query("SELECT * FROM `users` WHERE `email` = ?", array($email));
		$query = $this->db->select('*')->from('users')->where('email', $email);

    if ($query->num_rows() > 0) return true;
    else return false;
	}

	function auth_user($email, $password)
	{
		$email = $this->db->escape_str($email);
		$password = $this->db->escape_str($password);
    	
		//$query = $this->db->query("SELECT * FROM `users` WHERE `email` = ? AND `password` = ? AND `active` = 1", array($email, $password));
		$query = $this->db->select('*')->from('users')->where('email', $email)->where('password', $password)->where('active', 1);

		if ($query->num_rows() == 1) return true;
		else return false;
	}
    
	function get_user_by_email($email)
	{
		$query = $this->db->query("SELECT * FROM `users` WHERE `email` = $email");
		
		if ($query->num_rows() == 1) {
			$post = new Post;
			$row = $query->row();
			
			$post->id = $row->id;
			$post->email = $row->email;
			$post->displayname = $row->displayname;
			
			return $post;
		} else return array();
	}
	
	function get_user_by_id($id)
	{
	  $query = $this->db->from('users')->where('id', $id);
		//$query = $this->db->query("SELECT * FROM `users` WHERE `id` = $id");
		
		foreach ($query->result() as $row) {
			$post = new Post;
			
			$post->id = $row->id;
			$post->email = $row->email;
			$post->displayname = $row->displayname;
			
			return $post;
		} else return array();
	}

  function insert()
  {
      $this->db->insert('users', $this);
  }

  function update()
  {
      $this->db->update('users', $this);
  }
}
