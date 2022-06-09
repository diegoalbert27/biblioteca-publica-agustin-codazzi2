<?php
 if(isset($_GET['action'])) {
  switch($_GET['action']) {
    case 'form':
      include_once 'views/partials/head.php';
      include_once 'views/partials/header.php';
      $result = $response['$allCategoria'];
      include_once 'partialsCategoria/categoriaView.php';
      include_once 'views/partials/footer.php';
      break;
    case 'formupdate':
      include_once 'views/partials/head.php';
      include_once 'views/partials/header.php';
      $result = $response['$allCategoria'];
      include_once 'partialsCategoria/categoriaFormUpdate.php';
      include_once 'views/partials/footer.php';
    break;
    case 'categoriapdf':
      $result = $response['$allCategoria'];
      include_once 'partialsCategoria/categoriaPDF.php';
    break;
    default:
    include_once 'views/partials/head.php';
      include_once 'views/partials/header.php';
      $result = $response['$allCategoria'];
      include_once 'partialsCategoria/categoriaView.php';
      include_once 'views/partials/footer.php';
  } 
}else {
  include_once 'views/partials/head.php';
  include_once 'views/partials/header.php';
  $result = $response['$allCategoria'];
  include_once 'partialsCategoria/categoriaView.php';
  include_once 'views/partials/footer.php';
}
?>