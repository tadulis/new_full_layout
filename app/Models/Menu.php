<?php

class Menu
{

	private $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function getLinks() {

		$menu = [
			["name" => "Home", "link" => "/"],
			["name" => "Hello Universe", "link" => "/Page/hello"]
		];

		// We could also use database
		// $menu = $this->db->select("SELECT * FROM pages");

		return $menu;
	}
}