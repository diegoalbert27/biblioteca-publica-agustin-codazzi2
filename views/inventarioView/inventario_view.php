<?php

    include_once 'views/partials/head.php';
    include_once 'views/partials/header.php';

    if(isset($_GET['action'])) {
        switch($_GET['action']) {
          case 'form':
            $resultLibro = $response['$allLibro'];
            include_once 'partialsInventario/inventarioForm.php';
          break;
          case 'table':
            $resultLibros = $response['$allLibros'];
            include_once 'partialsInventario/inventarioTable.php';
          break;
          case 'formupdate':
            $resultLibro = $response['$allLibro'];
            include_once 'partialsInventario/inventarioFormUpdate.php';
          break;
          default:
            $resultLibros = $response['$allLibros'];
            include_once 'partialsInventario/inventarioView.php';
        }
      } else {
        $resultLibros = $response['$allLibros'];
        include_once 'partialsInventario/inventarioView.php';
      }

    include_once 'views/partials/footer.php';

?>