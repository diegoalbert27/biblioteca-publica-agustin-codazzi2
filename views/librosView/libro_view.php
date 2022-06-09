<?php
  if(isset($_GET['action'])) {
    switch($_GET['action']) {
      case 'form':
        include_once 'views/partials/head.php';
        include_once 'views/partials/header.php';
        $resultCate = $response['$allCategoria'];
        include_once 'partialsLibros/libroForm.php';
        include_once 'views/partials/footer.php';
      break;
      case 'viewbyid':
        include_once 'views/partials/head.php';
        include_once 'views/partials/header.php';
        $result = $response['$allLibro'];
        include_once 'partialsLibros/libroViewById.php';
        include_once 'views/partials/footer.php';
      break;
      case 'formupdate':
        include_once 'views/partials/head.php';
        include_once 'views/partials/header.php';
        $resultCate = $response['$allCategoria'];
        $result = $response['$alllibro'];
        include_once 'partialsLibros/libroFormUpdate.php';
        include_once 'views/partials/footer.php';
      break;
      case 'libropdf':
        $resultP = $response['$allPrestamos'];
        $result = $response['$allLibro'];
        include_once 'partialsLibros/libroPDF.php';
      break;
      default:
        include_once 'views/partials/head.php';
        include_once 'views/partials/header.php';
        $result = $response['$allLibros'];
        include_once 'partialsLibros/libroView.php';
        include_once 'views/partials/footer.php';
    }
  } else {
    include_once 'views/partials/head.php';
    include_once 'views/partials/header.php';
    $resultLibros = $response['$allLibros'];
    include_once 'partialsLibros/libroView.php';
    include_once 'views/partials/footer.php';
  }

  include_once 'views/partials/footer.php';

?>