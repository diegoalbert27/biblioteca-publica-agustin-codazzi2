<?php

  include_once 'views/partials/head.php';

  if(isset($_GET['action'])) {
    switch($_GET['action']) {
      case 'about':
        include_once 'views/homeView/partialsHome/navbar.php';
        include_once 'partialsHome/AboutView.php';
      break;
      case 'book':
        include_once 'views/homeView/partialsHome/navbar.php';
        $resultLibros = $response['$allLibros'];
        include_once 'partialsHome/bookView.php';
      break;
      case 'event':
        include_once 'views/homeView/partialsHome/navbar.php';
        $resultEventos = $response['$allEvents'];
        include_once 'partialsHome/eventView.php';
      break;
      case 'viewevent':
        include_once 'views/homeView/partialsHome/navbar.php';
        $resultEventos = $response['$allEvents'];
        include_once 'partialsHome/eventViewById.php';
      break;
      case 'new':
        include_once 'views/homeView/partialsHome/navbar.php';
        $resultNews = $response['$allNews'];
        include_once 'partialsHome/newView.php';
      break;
      case 'viewnew':
        include_once 'views/homeView/partialsHome/navbar.php';
        $resultNews = $response['$allNews'];
        include_once 'partialsHome/eventViewById.php';
      break;
      case 'blog':
        include_once 'views/homeView/partialsHome/navbar.php';
        $resultBlog = $response['$allBlog'];
        include_once 'partialsHome/blogView.php';
      break;
      
      default:
      $resultLibros = $response['$allLibros'];
      $resultEvents = $response['$allEvents'];
      $resultNews = $response['$allNews'];
      $resultBlog = $response['$allBlog'];
        include_once 'partialsHome/homeView.php';
    }
  } else {
    $resultLibros = $response['$allLibros'];
    $resultEvents = $response['$allEvents'];
    $resultNews = $response['$allNews'];
    $resultBlog = $response['$allBlog'];
    include_once 'partialsHome/homeView.php';
  }

  include_once 'views/partials/footer.php';