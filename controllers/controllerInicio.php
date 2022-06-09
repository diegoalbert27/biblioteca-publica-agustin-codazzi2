<?php

class controllerInicio extends controllerBase {

    public function __construct () {
        parent::__construct();
    }

    public function index () {
        $usuario = new inicioModel;
        $pendiente = new inicioModel;
        $libro = new inventarioModel;
        $allusuario = $usuario->getById();
        $allpendientes = $pendiente->get();
        $alllibros = $libro->getTotal();
        $this->view('inicio', array(
            '$allusuario' => $allusuario,
            '$allpendientes' => $allpendientes,
            '$alllibros' => $alllibros,
            'title' => 'Biblioteca Pública Central'
        ));
    }
}
