<?php

    class controllerSession extends controllerBase {
        public function __construct() {
            parent::__construct();
        }

        public function index () {
            if (!isset($_SESSION['user_id'])) {
                $this->view('sessionView/session', array(
                    'title' => 'Iniciar sesión',
                    'msg' => ''
                ));
            } else {
                $usuario = new inicioModel;
                $pendiente = new inicioModel;
                $allusuario = $usuario->getById();
                $allpendientes = $pendiente->get();
                $this->view('inicio', array(
                    '$allusuario' => $allusuario,
                    '$allpendientes' => $allpendientes,
                    'title' => 'Biblioteca Pública Central'
                ));
            }
        }

        public function signup () {
            $this->view('sessionView/session', array(
                'title' => 'Registrarse'
            ));
        }

        public function cuenta () {
            $this->view('sessionView/session', array(
                'title' => 'Recuperar cuenta'
            ));
        }

        public function question () {
            if (isset($_POST['user'])) {
                $user = $_POST['user'];
                $users = new usuarioModel;
                $allUsers = $users->get();

                foreach ($allUsers as $userBd) {
                    if ($userBd['name_user'] === $user || $userBd['email_user'] === $user || $userBd['correo_user'] === $user) {
                        $question = new questionsModel;
                        $allQuestion = $question->get();
                        $filterQuestion = $this->filterValue($allQuestion, 'user_que', $userBd['id_user']);

                        $this->view('sessionView/session', array(
                            'question' => $filterQuestion,
                            'title' => 'Preguntas de Seguridad' 
                        ));

                        return true;
                    }
                }

                $this->redirect('session&action=cuenta', '1');
            }
        }

        public function confirmar () {
            if (isset($_POST['user'])) {
                $question = new questionsModel;
                $usuario = new usuarioModel;
                
                $allusuario = $usuario->get();    
                $allQuestion = $question->get();
                
                $user = $_POST['user'];
                $response1 = $_POST['respuesta1'];
                $response2 = $_POST['respuesta2'];

                $filterQuestion = $this->filterValue($allQuestion, 'user_que', $user);

                if ($response1 === $filterQuestion[0]['respuesta'] && ($response2 === $filterQuestion[1]['respuesta'] || $response2 === $filterQuestion[2]['respuesta'])) {
                    $searchSession = $this->searchValue($allusuario, 'id_user', $filterQuestion[0]['user_que']);

                    if (count($searchSession) > 0) {
                        $_SESSION['user_id'] = $searchSession['id_user'];
                        $_SESSION['nivel_user'] = $searchSession['nivel_user'];
                        $this->redirect('inicio', '1');

                        return true;
                    }
                }
                $this->redirect('session&action=cuenta', '1');
            }
        }

        public function crear () {
            if (isset($_POST['name'])) {
                $session = new sessionModel;
                $session->post();
            }
            $this->redirect('session', '2');
        }

        public function iniciar () {
            if (isset($_POST['email'])) {
                $session = new sessionModel;
                $allsession = $session->getById();
                if (count($allsession) > 0 && password_verify($_POST['password'], $allsession[0]['passwd_user'])) {
                    if (isset($_SESSION['intents'])) unset($_SESSION['intents']);
                    $_SESSION['user_id'] = $allsession[0]['id_user'];
                    $_SESSION['nivel_user'] = $allsession[0]['nivel_user'];
                    $this->redirect('inicio', '1');
                } else {
                    $user = count($allsession) > 0;
                    $is_pass = $user ? password_verify($_POST['password'], $allsession[0]['passwd_user']) : null;

                    if (!is_null($is_pass)) {
                        if (!$is_pass) {
                            if (!isset($_SESSION['intents'])) {
                                $_SESSION['intents'] = 3;
                                $intents = $_SESSION['intents'];
                                $this->redirect('session', '2&intents=' . $intents);
                                return;
                            } else {
                                $intents = $_SESSION['intents'] - 1;
                                unset($_SESSION['intents']);
                                $_SESSION['intents'] = $intents;

                                if ($intents <= 0) {
                                    $id = $allsession[0]['id_user'];
                                    $session->blockAccount($id);
                                    $this->redirect('session', '3');
                                    return;
                                }

                                $this->redirect('session', '2&intents=' . $intents);
                                return;
                            }
                        }
                    }
                    
                    $this->redirect('session', '1');
                }
            }
        }

        public function cerrar () {
            session_unset();
            session_destroy();
            $this->redirect('session');
        }
    }