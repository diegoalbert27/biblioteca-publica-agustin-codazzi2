<?php

  

  if(isset($_GET['action'])) {
    switch($_GET['action']) {
      case 'form':
        include_once 'views/partials/head.php';
        include_once 'views/partials/header.php';
        $result = $response['$allEvents'];
        $resultAsunto = $response['$allAsunto'];
        $resultOrganizadores = $response['$allOrganizadores'];
        include_once 'partialsEvents/eventsForm.php';
        include_once 'views/partials/footer.php';
      break;
      case 'viewbyid':  
        include_once 'views/partials/head.php';
        include_once 'views/partials/header.php';        
        $resultEventos = $response['$allevents'];
        $resultParticipant = $response['$allparticipant'];
        $totalParticipant = $response['$totalparticipant'];  
        $idParticipant = $response['$idParticipant']; 
        include_once 'partialsEvents/eventsViewById.php';
        include_once 'views/partials/footer.php';
      break;
      case 'formupdate':
        include_once 'views/partials/head.php';
        include_once 'views/partials/header.php';
        $result = $response['$allEvents'];
        $resultAsunto = $response['$allAsunto'];
        include_once 'partialsEvents/eventsFormUpdate.php';
        include_once 'views/partials/footer.php';
      break;
      case 'participants': 
        include_once 'views/partials/head.php';
        include_once 'views/partials/header.php';         
        $result = $response['$allParticipants'];
        include_once 'partialsEvents/participants.php';
        include_once 'views/partials/footer.php';
      break;
      case 'participantsPDF':        
        $result = $response['$allParticipants'];
        include_once 'partialsEvents/participantsPDF.php';
      break;
      default:
        include_once 'views/partials/head.php';
        include_once 'views/partials/header.php';
        $result = $response['$allEvents'];
        include_once 'partialsEvents/eventsView.php';
        include_once 'views/partials/footer.php';
    } 
  }else {
    include_once 'views/partials/head.php';
    include_once 'views/partials/header.php';
    $result = $response['$allEvents'];
    include_once 'partialsEvents/eventsView.php';
    include_once 'views/partials/footer.php';
  }

  include_once 'views/partials/footer.php';

?>