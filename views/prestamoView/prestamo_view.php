<?php

  include_once 'views/partials/head.php';
  include_once 'views/partials/header.php';

  if(isset($_GET['action'])) {
    switch($_GET['action']) {
      case 'form':
        $resultSol = $response['$allSolicitantes'];
        $resultLib = $response['$allLibros'];
        include_once 'partialsPrestamo/prestamoForm.php';
      break;
      case 'viewbyid':
        $result = $response['$allprestamo'];
        include_once 'partialsPrestamo/prestamoViewById.php';
      break;
      case 'formupdate':
        $resultSol = $response['$allSolicitantes'];
        $resultLib = $response['$allLibros'];
        $result = $response['$allprestamo'];
        include_once 'partialsPrestamo/prestamoFormUpdate.php';
      break;
      default:
        $result = $response['$allPrestamos'];
        include_once 'partialsPrestamo/prestamoView.php';
    }
  } else {
    $resultPres = $response['$allPrestamos'];
    include_once 'partialsPrestamo/prestamoView.php';
  }

  include_once 'views/partials/footer.php';

?>