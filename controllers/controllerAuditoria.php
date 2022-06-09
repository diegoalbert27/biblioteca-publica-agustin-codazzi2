<?php

class controllerAuditoria extends controllerBase {

    public function __construct () {
        parent::__construct();
    }

    public function index () {
        $auditoria = new auditoriaModel;
        $allAuditoria = $auditoria->get();
        $this->view('auditoria', array(
            '$allAuditoria' => $allAuditoria,
            'title' => 'Auditoria'
        ));
    }
}