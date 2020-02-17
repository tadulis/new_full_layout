<?php

use Frame\Controller;

class Page extends Controller
{

    public function index()
    {
	    $menu = $this->model("Menu");

        $data['header'] = "Home";
        $data['body'] = "This is the homepage of µFrame.<br><i>Microframe</i> is the lightweight Model-View-Controller based PHP framework.";
        $data['menu'] = $menu->getLinks();

        $this->view("main", $data);
    }

    public function hello()
    {
	    $menu = $this->model("Menu");

        // Should we need some data from the database..
        // $page = $this->model("Page");
        // $data['page'] = $page->getSingle(1);

        $data['header'] = "Hello World";
        $data['body'] = "Be nice - say Hi!";
	    $data['menu'] = $menu->getLinks();

        $this->view("page", $data);
    }

}
