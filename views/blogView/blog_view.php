<?php
 if(isset($_GET['action'])) {
  switch($_GET['action']) {
    case 'form':
      include_once 'views/partials/head.php';
      include_once 'views/partials/header.php';      
      $result = $response['$allBlog'];
      include_once 'partialsBlog/blogForm.php';
      include_once 'views/partials/footer.php';
      break; 
      case 'viewbyid':  
        include_once 'views/partials/head.php';
        include_once 'views/partials/header.php';            
        $result = $response['$allblog'];
        include_once 'partialsBlog/blogViewById.php';
        include_once 'views/partials/footer.php';
      break;
    case 'formupdate':
      include_once 'views/partials/head.php';
      include_once 'views/partials/header.php';      
      $result = $response['$allBlog'];
      include_once 'partialsBlog/blogFormUpdate.php';
      include_once 'views/partials/footer.php';
    break;
    case 'blogpdf':      
      $result = $response['$allblog'];
      include_once 'partialsBlog/blogPDF.php';
    break;
    default:
    include_once 'views/partials/head.php';
    include_once 'views/partials/header.php';    
      $result = $response['$allBlog'];
      include_once 'partialsBlog/blogView.php';
      include_once 'views/partials/footer.php';
  } 
}else {
  include_once 'views/partials/head.php';
  include_once 'views/partials/header.php';  
  $result = $response['$allBlog'];
  include_once 'partialsBlog/blogView.php';
  include_once 'views/partials/footer.php';
}

?>