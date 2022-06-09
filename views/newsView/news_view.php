<?php
 if(isset($_GET['action'])) {
  switch($_GET['action']) {
    case 'form':
      include_once 'views/partials/head.php';
      include_once 'views/partials/header.php';
      $result = $response['$allNews'];
      include_once 'partialsNews/newsForm.php';
      include_once 'views/partials/footer.php';
    break;
    case 'viewbyid': 
      include_once 'views/partials/head.php';
      include_once 'views/partials/header.php';    
      $result = $response['$allnews'];
      include_once 'partialsNews/newsViewById.php';
      include_once 'views/partials/footer.php';
    break;
    case 'formupdate':
      include_once 'views/partials/head.php';
      include_once 'views/partials/header.php';
      $result = $response['$allNews'];
      include_once 'partialsNews/newsFormUpdate.php';
      include_once 'views/partials/footer.php';
    break;
    case 'newpdf':      
      $result = $response['$allnews'];
      include_once 'partialsNews/newsPDF.php';
    break;
    default:
    include_once 'views/partials/head.php';
      include_once 'views/partials/header.php';
      $result = $response['$allNews'];
      include_once 'partialsNews/newsView.php';
      include_once 'views/partials/footer.php';
  } 
}else {
  include_once 'views/partials/head.php';
  include_once 'views/partials/header.php';
  $result = $response['$allNews'];
  include_once 'partialsNews/newsView.php';
  include_once 'views/partials/footer.php';
}



?>