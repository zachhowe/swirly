<?php

class Post extends Model {
  var $id = 0;
  var $title = '';
  var $author = 0;
  var $content = '';
  var $date = '';

  function Post()
  {
      parent::Model();
  }
  
  function get_recent_posts()
	{
		$query = $this->db->query("SELECT * FROM `posts` ORDER BY `date` DESC LIMIT 10");
		$posts = array();
		
		foreach ($query->result() as $row) {
			$post = new Post;
			$post->id = $row->id;
			$post->title = $row->title;
			$post->date = $row->date;
			$post->author = $row->author;
			$post->content = $row->content;
			
			array_push($posts, $post);
		}
		
		return $posts;
	}
	
	function get_posts_by_author($author)
	{
		$query = $this->db->query("SELECT * FROM `posts` WHERE `author` = $author ORDER BY `date` DESC");
		$posts = array();
		
		foreach ($query->result() as $row) {
			$post = new Post;
			$post->id = $row->id;
			$post->title = $row->title;
			$post->date = $row->date;
			$post->author = $row->author;
			$post->content = $row->content;
			
			array_push($posts, $post);
		}
		
		return $posts;
	}
    
	function get_post_by_id($id)
	{
		$query = $this->db->query("SELECT * FROM `posts` WHERE `id` = $id");
		
		if ($query->num_rows() == 1) {
			$post = new Post;
			$row = $query->row();
			
			$post->id = $row->id;
			$post->title = $row->title;
			$post->date = $row->date;
			$post->author = $row->author;
			$post->content = $row->content;
			
			return $post;
		} else return array();
	}

  function insert()
  {
  	$this->db->insert('posts', $this);
  }

  function update()
  {
      $this->db->update('posts', $this);
  }
}
