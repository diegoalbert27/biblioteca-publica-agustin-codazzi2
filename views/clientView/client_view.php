<?php

include_once 'views/partials/head.php';

  if(isset($_GET['action'])) {
    switch($_GET['action']) {
      case 'login':
        include_once 'partialsClients/clientLogin.php';
      break;
      case 'signup':
        include_once 'partialsClients/clientSignup.php';
      break;
      case 'viewbyid': 
        include_once 'views/partials/header.php';     
        //$result = $response['$allevents'];
        $idParticipant = $response['$idParticipant'];
        $resulteventos = $response['$allevents'];
        $resultParticipant = $response['$allparticipant'];
        $totalParticipant = $response['$totalparticipant'];
        include_once 'partialsClients/eventViewById.php';
      break;
      case 'events':
        include_once 'views/partials/header.php';
        $resultEventos = $response['$allEvents'];
        $resultParticipant = $response['$allparticipant'];
        $totalParticipant = $response['$totalparticipant'];
        $idParticipant = $response['$idParticipant'];
        include_once 'partialsClients/eventView.php';
      break;
      case 'formupdate':
        $result = $response['$allEvents'];
        include_once 'partialsEvents/eventsFormUpdate.php';
      break;
      default:
        $result = $response['$allEvents'];
        include_once 'partialsEvents/eventsView.php';
    } 
  }else {
    $result = $response['$allEvents'];
    include_once 'partialsEvents/eventsView.php';
  }


  include_once 'views/partials/footer.php';

?>