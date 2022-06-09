<?php
  include_once 'views/partials/head.php';
  include_once 'views/partials/header.php';

  if(isset($_GET['action'])) {
    switch($_GET['action']) {
      case 'form':
        $result = $response['$allUsuarios'];
        include_once 'partialsUsuario/usuarioView.php';
      break;
      case 'viewbyid':  
        $result = $response['$allusuario']; 
        include_once 'partialsUsuario/usuarioViewById.php';
      break;
      case 'formupdate':
        $result = $response['$allUsuario'];
        include_once 'partialsUsuario/usuarioFormUpdate.php';
      break;
      case 'perfil':
        $result = $response['$allusuario'];
        $organizer = $response['organizador'];
        include_once 'partialsUsuario/usuarioPerfil.php';
      break;
      default:
        $result = $response['$allUsuario'];
        include_once 'partialsUsuario/usuarioView.php';
    } 
  } else {
    $result = $response['$allUsuarios'];
    include_once 'partialsUsuario/usuarioView.php';
  }

  include_once 'views/partials/footer.php';

?>