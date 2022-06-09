<?php

  include_once 'views/partials/head.php';
  include_once 'views/partials/header.php';

  if(isset($_GET['action'])) {
    switch($_GET['action']) {
      case 'form':
        $result = $response['$allAsunto'];
        include_once 'partialsAsunto/asuntoView.php';
        break;
      default:
        $result = $response['$allAsunto'];
        include_once 'partialsAsunto/asuntoView.php';
    } 
  }else {
    $result = $response['$allAsunto'];
    include_once 'partialsAsunto/asuntoView.php';
  }

  include_once 'views/partials/footer.php';

?>