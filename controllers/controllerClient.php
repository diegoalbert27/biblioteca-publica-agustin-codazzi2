

<?php

class controllerClient extends controllerBase {

    public function __construct () {
        parent::__construct();
    }

    public function login () {
        if (!isset($_SESSION['client'])) {
            $this->view('clientView/client', array(
                'title' => 'Iniciar sesión',
                'msg' => ''
            ));
        }
    }

    public function subir () {
        if (isset($_GET['id'])) {
            $organizer = new Organizer;
            $result_id = $organizer->post();
            echo $result_id;
            $this->redirect('usuario&action=perfil', '1');
        }
    }

    public function iniciar () {
        if (isset($_POST['email'])) {
            $session = new sessionModel;
            $allsession = $session->getById();
            if (count($allsession) > 0 && password_verify($_POST['password'], $allsession[0]['passwd_user']) && ($_POST['email'] === $allsession[0]['name_user'] || $_POST['email'] === $allsession[0]['email_user'])) {
                $_SESSION['client'] = $allsession[0]['id_user'];
                $_SESSION['nivel_user'] = $allsession[0]['nivel_user'];    
                $this->redirect('home', '1');
            } else {
                $this->redirect('client', '1');
            }
        }
    }

    public function signup () {
        if (!isset($_SESSION['client'])) {
            $this->view('clientView/client', array(
                'title' => 'Registro',
                'msg' => ''
            ));
        }
    }

    public function crear () {
        if (isset($_POST['name'])) {
            $session = new sessionModel;
            $session->postClient();
        }
        echo 'sda';
    }

    public function cerrar () {
        session_unset();
        session_destroy();
        $this->redirect('home', '1');
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
        
        $this->view('clientView/client', array(
            '$allEvents' => $allEvents,
            '$idParticipant' =>  $idParticipant,
            '$allparticipant' => $participantEvent,
            '$totalparticipant' => $totalArray,
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
            
            $this->view('clientView/client', array(
                '$allevents' => $allevents,
                '$allparticipant' => $participantEvent,
                '$totalparticipant' => $totalArray,
                '$idParticipant' =>  $idParticipant,
                'title' => 'Informacion'
            ));
        }
    }
}