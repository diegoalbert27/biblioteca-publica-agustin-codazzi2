<?php

    class controllerEvents extends controllerBase {
        private static $tabla;

        public function __construct () {
            parent::__construct();
            self::$tabla = 'events';
        }
 
        public function index () {
            $events = new eventsModel;
            $allEvents = $events->get();
            $this->view('eventsView/events', array(
                '$allEvents' => $allEvents,
                'title' => 'Eventos'
            ));
        }

        public function viewbyid () {
            if (isset($_GET['id'])) {
                $events = new eventsModel;
                $participant = new eventsModel;
                $total = new eventsModel;
                $idParticipants = new eventsModel;
                $allevents = $events->getById();
                $idParticipant = $idParticipants->getParticipantsEvent($_SESSION['user_id']);
                $participantEvent = $participant->getByIdPartipant($_SESSION['user_id']);
                $allEvents = $this->filterValue($allevents, 'state_event', 'Pendiente');
        
                $totalArray = [];
                
                
                foreach ($allEvents as $event) 
                {
                    $totalArray[$event['id_event']] = $total->getParticipantsByEvent($event['id_event']);
                }
                
                $this->view('eventsView/events', array(
                    '$allevents' => $allevents,
                    '$allparticipant' => $participantEvent,
                    '$totalparticipant' => $totalArray,
                    '$idParticipant' =>  $idParticipant,
                    'title' => 'Informacion'
                ));
            }
        }

        public function form () {
            $organizer = new Organizer();
            $events = new depFunc('events');
            $asunto = new depFunc('asunto_event');
            $allEvents = $events->get();
            $allAsunto = $asunto->get();
            $organizadores = $organizer->getAllByState(1);
   
            $this->view('eventsView/events', array(
                '$allEvents' => $allEvents,
                '$allAsunto' => $allAsunto,
                '$allOrganizadores' => $organizadores,
                'title' => 'Registrar'
            ));
        }

        public function formupdate () {
            $events = new eventsModel;
            $asunto = new depFunc('asunto_event');
            $allEvents = $events->getById();
            $allAsunto = $asunto->get();

            $this->view('eventsView/events', array(
                '$allEvents' => $allEvents,
                '$allAsunto' => $allAsunto,
                'title' => 'Cambiar Datos'
            ));
        }

        public function crear () {
            if (isset($_POST['id'])) {
                $events = new eventsModel;
                $idEvent = $events->post();

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Creación de Nuevo Evento';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $auditoria->postIndie(self::$tabla, $accion, $idEvent, $user, $datatime);
            }
            $this->redirect('events', '3');
        }

        public function actualizar () {
            if (isset($_POST['id'])) {
                $events = new eventsModel;
                $events->update();

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Actualización de evento';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $idEvent = $_POST['id'];
                $auditoria->postIndie(self::$tabla, $accion, $idEvent, $user, $datatime);
            }
            $this->redirect('events', '4');
        }

        public function interesado () {
            if (isset($_GET['id'])) {
                $events = new eventsModel;
                $user = (int)$_SESSION['user_id'];
                $events->postInteresado($user);
            }
            
            $nivel = $_SESSION['nivel_user'];
            
            if ($nivel == 5 || $nivel == 10) : 
                $this->redirect('events', '4');
             endif;
                $this->redirect('client&action=events', '3');
        }

        public function participar () {
            if (isset($_GET['id'])) {
                $events = new eventsModel;
                $user = (int)$_SESSION['user_id'];
                $events->postPartipant($user);
            }
            $nivel = $_SESSION['nivel_user'];

            if ($nivel == 5 || $nivel == 10) : 
                $this->redirect('events', '4');
             endif;
                $this->redirect('client&action=events', '3');
        }

        public function cancelar () {
            if (isset($_GET['id'])) {
                $participant = new eventsModel;
                $participant->cancelar();

                //Datos e inserción de auditoria
                $auditoria = new auditoriaModel;
                $accion = 'Cancelar participacion en el evento';
                $user = $_SESSION['user_id'];
                $datatime = date('Y-m-d H:i:s');
                $idEvent = $_GET['id'];
                $auditoria->postIndie(self::$tabla, $accion, $idEvent, $user, $datatime);
            }
            $nivel = $_SESSION['nivel_user'];

            if ($nivel == 5 || $nivel == 10) : 
                $this->redirect('events', '4');
             endif;
                $this->redirect('client&action=events', '4');
        
        }

        public function events () {
            $events = new eventsModel;
            $participant = new eventsModel;
            $total = new eventsModel;
            $idParticipants = new eventsModel;
            $allEvents = $events->get();
            $idParticipant = $idParticipants->getParticipantsEvent($_SESSION['user_id']);
            $participantEvent = $participant->getByIdPartipant($_SESSION['user_id']);
            $allEvents = $this->filterValue($allEvents, 'state_event', 'Pendiente');
    
            $totalArray = [];
            
            
            foreach ($allEvents as $event) 
            {
                $totalArray[$event['id_event']] = $total->getParticipantsByEvent($event['id_event']);
            }
            
            $this->view('eventsView/events', array(
                '$allEvents' => $allEvents,
                '$idParticipant' =>  $idParticipant,
                '$allparticipant' => $participantEvent,
                '$totalparticipant' => $totalArray,
                'title' => 'Eventos'
            ));
        }

        public function participants () {
            if (isset($_GET['id'])) {
                $events = new eventsModel;
                $participants = new eventsModel;
                $allEvents = $events->get();
                $allParticipants = $participants->getParticipants();
                $this->view('eventsView/events', array(
                    '$allParticipants' => $allParticipants,
                    'title' => 'Participantes'
                ));
            }
        }

        public function participantsPDF () {
            if (isset($_GET['id'])) {
                $participants = new eventsModel;
                $allParticipants = $participants->getParticipants();
                $this->view('eventsView/events', array(
                    '$allParticipants' => $allParticipants,
                    'title' => 'Participantes'
                ));
            }
        }

        public function get() {
            $events = new eventsModel;
            $allEvents = $events->get();

            $user = (int)$_SESSION['user_id'];
            
            if(isset($user)) {

                if (!isset($_GET['query'])) {
                    $events = [];
                    foreach($allEvents as $i => $event) {
                        $list = [];
                        foreach($event as $k => $v) $list[$k] = utf8_encode($v);
                        $events[] = $list;
                    }
                    $response = $this->JSONResponse('Success', $events);
                    echo json_encode($response);
                }
                
                if(isset($_GET['query'])) {
                    $query = $_GET['query'];

                    if ($query === 'new') {
                        $events = [];
                        foreach($allEvents as $i => $event) {
                            $list = [];
                            foreach($event as $k => $v) {
                                if ($k === 'date_created_event') {
                                    preg_match('/^\d{4}-\d{2}-\d{2}/', $v, $matches);
                                    $list[$k] = isset($matches[0]) ? $matches[0] : $v;
                                    
                                    continue;
                                }
                                $list[$k] = utf8_encode($v);
                            }

                            $year_date = date('Y');
                            $month_date = date('m');
                            $day_date = date('d');
                            
                            $year_created = substr($list['date_created_event'], 0, 4);
                            $month_created = substr($list['date_created_event'], 5, 2);
                            $day_created = substr($list['date_created_event'], 8);
                            
                            $last_created = (int)$year_date - (int)$year_created;
                            if ($last_created) continue;
                        
                            $last_month = (int)$month_date - (int)$month_created;    
                            if ($last_month) continue;
                            
                            $last_day = (int)$day_date - (int)$day_created;
                            !$last_day || $last_day <= 3 ? $events[] = $list : $events[] = $this->JSONResponse('Success', 'No there are new events in this moment');
                        }

                        $response = $this->JSONResponse('Success', $events);

                        echo json_encode($response);
                    }

                    if ($query === 'current') {
                        $events = [];
                        foreach($allEvents as $i => $event) {
                            $list = [];
                            foreach($event as $k => $v) {
                                $list[$k] = utf8_encode($v);
                            }

                            $year_date = date('Y');
                            $month_date = date('m');
                            $day_date = date('d');
                            
                            $year_created = substr($list['date_realized_event'], 0, 4);
                            $month_created = substr($list['date_realized_event'], 5, 2);
                            $day_created = substr($list['date_realized_event'], 8);
                            
                            $last_created = (int)$year_date - (int)$year_created;
                            if ($last_created) continue;
                        
                            $last_month = (int)$month_date - (int)$month_created;    
                            if ($last_month) continue;
                            
                            $last_day = (int)$day_date - (int)$day_created;
                            $last_day < 2 && $last_day < 0 ? $events[] = $list : $events[] = $this->JSONResponse('Success', 'No there are new events in this moment');
                        }

                        $response = $this->JSONResponse('Success', $events);

                        echo json_encode($response);
                    }

                    if ($query === 'lugares') {
                        
                    }
                }
            }
        }
    }