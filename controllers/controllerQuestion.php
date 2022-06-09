<?php

class controllerQuestion extends controllerBase {
    private static $tabla;

    public function __construct() {
        parent::__construct();
        self::$tabla = 'question';
    }

    public function form () {
        if (isset($_GET['r'])) {
            $user = $_GET['r'];

            $question = new questionsModel;
            $allquestion = $question->get();

            $searchQuestion = $this->filterValue($allquestion, 'user_que', $user);

            $this->view('questionView/question', array(
                'user' => $user,
                'question' => $searchQuestion,
                'title' => 'Preguntas de Seguridad'
            ));
        }
    }

    public function crear () {
        if (isset($_POST['user'])) {
            $question = new questionsModel;
            $idQuestion = $question->post();

            //Datos e inserción de auditoria
            $auditoria = new auditoriaModel;
            $accion = 'Creación de preguntas de seguridad para el nuevo usuario';
            $user = $_SESSION['user_id'];
            $datatime = date('Y-m-d H:i:s');
            $auditoria->postIndie(self::$tabla, $accion, $idQuestion, $user, $datatime);
            
            $response = $this->JSONResponse('Success', 'El nuevo elemento ha sido agregado');
            echo json_encode($response);
        }
        // $this->redirect('usuario', '4');
    }

    public function update () {
        if (isset($_POST['user'])) {
            $question = new questionsModel;
            $idQuestion = $question->update();
            
            //Datos e inserción de auditoria
            $auditoria = new auditoriaModel;
            $accion = 'Actualización de preguntas de seguridad para el nuevo usuario';
            $user = $_SESSION['user_id'];
            $datatime = date('Y-m-d H:i:s');
            $auditoria->postIndie(self::$tabla, $accion, $idQuestion, $user, $datatime);

            $response = $this->JSONResponse('Success', 'El elemento ha sido actualizaco');
            echo json_encode($response);
        }
        // $this->redirect('usuario', '4');
    }
}