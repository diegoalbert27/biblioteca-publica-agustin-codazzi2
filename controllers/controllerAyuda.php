<?php

class controllerAyuda extends controllerBase {

    public function __construct () {
        parent::__construct();
    }

    public function index () {
        $this->view('ayuda', array(
            'title' => 'Ayuda'
        ));
    }
}