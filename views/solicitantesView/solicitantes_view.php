<?php
    if(isset($_GET['action'])) {
    switch($_GET['action']) {
      case 'form':      
        include_once 'views/partials/head.php';
        include_once 'views/partials/header.php';
        $resultOcup = $response['$allOcupacion'];
        include_once 'partialsSolicitantes/solicitanteForm.php';
        include_once 'views/partials/footer.php';
      break;
      case 'viewbyid':   
        include_once 'views/partials/head.php';
        include_once 'views/partials/header.php';   
        $result = $response['$allsolicitante'];
        include_once 'partialsSolicitantes/solicitanteViewById.php';
        include_once 'views/partials/footer.php';
      break;
      case 'formupdate':      
        include_once 'views/partials/head.php';
        include_once 'views/partials/header.php';
        $resultOcup = $response['$allOcupacion'];
        $result = $response['$allsolicitante'];
        include_once 'partialsSolicitantes/solicitanteFormUpdate.php';
        include_once 'views/partials/footer.php';
      break;
      case 'historial':   
        include_once 'views/partials/head.php';
        include_once 'views/partials/header.php';   
        $result = $response['$allsolicitante'];
        $resulthistorial = $response['$allhistorial'];
        include_once 'partialsSolicitantes/solicitanteHistorial.php';
        include_once 'views/partials/footer.php';
      break;
      case 'pdf':
        $result = $response['$allsolicitante'];
        $resultpre = $response['$allpdf'];
        $resultuser = $response['$allusuario'];
        include_once 'partialsSolicitantes/solicitantePDF.php';
      break;
      case 'carnet':
        $result = $response['$allsolicitante'];
        $resultuser = $response['$allusuario'];
        include_once 'partialsSolicitantes/solicitanteCarnet.php';
      break;
      default:
      include_once 'views/partials/head.php';
      include_once 'views/partials/header.php';
        $result = $response['$allSolicitantes'];
        include_once 'partialsSolicitantes/solicitanteView.php';
        include_once 'views/partials/footer.php';
    }
  } else {
    include_once 'views/partials/head.php';
    include_once 'views/partials/header.php';
    $resultSol = $response['$allSolicitantes'];
    include_once 'partialsSolicitantes/solicitanteView.php';
    include_once 'views/partials/footer.php';
  }
?>