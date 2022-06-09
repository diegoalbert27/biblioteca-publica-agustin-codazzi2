<?php

    include_once 'views/partials/head.php';
    include_once 'views/partials/header.php';
?>

<div class="container">
  <section class="mt-4 col-xl-10 cuerpo">
    
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Manual de usuario</h1>
    </div>

    <?php if ($nivel == 5) : ?>
      <div class="row">
        <div class="col-9">

          <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-offset="0" tabindex="0">
            <h4 id="item-1">Préstamo circulante</h4>
            <p>Las obras que se ofrezcan en Préstamo Circulante podrán salir del recinto de la Biblioteca hasta por espacio de tres (3) días seguidos con la posibilidad de renovar una sola vez por el mismo plazo, salvo que por ser muy consultado no pueda darse la renovación. El usuario deberá presentar su carnet vigente para efectuar el Préstamo Circulante por vía automatizada, en Control de Usuarios. El usuario podrá llevarse en calidad de Préstamo Circulante, hasta 3 (tres) libros.</p>
            
            <h6 id="item-1-1">Ver todos los préstamos realizados</h6>
            <ol>
              <li>Pulse Préstamo circulante en la barra lateral de la izquierda. Se desplegará un pequeño submenú.</li>
              <li>Pulse la opción Préstamos.</li>
            </ol>
            <p>La aplicación mostrará todos los préstamos registrados en ella, con el número de carnet del solicitante que retiró el libro, la cota del libro que se retiró, la fecha de entrega y la fecha de devolución.</p>
            
            <div class="ml-4">
              <h6 id="item-1-1-1">Añadir nuevo préstamo</h6>
              <ol>
                <li>En la pestaña Préstamos, baje hasta el final final de la tabla y pulse la barra azul Nuevo préstamo.</li>
                <li>Se mostrará un formulario, en el que se seleccionará el número de carnet del solicitante, el nombre del libro, la fecha de entrega y de devolución del mismo y si es necesario puede añadir observaciones.</li>
                <li>Añadidos los datos correctamente pulse el botón verde Agregar Registro.</li>
              </ol>
              <p>En caso de que haya seguido los pasos correctamente, el sistema lo devolverá a la vista de los préstamos registrados y arrojará el siguiente mensaje en un recuadro verde "Un nuevo préstamo ha sido agregado". Si no fue así verifique que haya rellenado los datos correctamente.</p>
              <h6 id="item-1-1-2">Información de los préstamos realizados</h6>
              <p>Una vez mostrados los préstamos, se visualizarán primero los últimos registros. Pulse el botón azul con el icono del ojo se mostrará una pestaña con el número de carnet y el nombre del solicitante, la cota y el título del libro, la fecha de entrega y de devolución junto con las observaciones realizadas en el préstamo.</p>
              <h6 id="item-1-1-3">Modificar la información de los préstamos realizados</h6>
              <ol>
                <li>Volviéndo a la pestaña donde se visualizan los préstamos debe hacer click en el botón verde con el icono del lápiz para acceder a la pantalla para modificar los datos del préstamo.</li>
                <li>Aparecerá un formulario con los datos del préstamo que podrá modificar.</li>
                <li>Finalmente, pulse el botón verde Modificar registro.</li>
              </ol>
              <p>En caso de que se haya podido modificar, el sistema lo devolverá a la vista de los préstamos registrados y arrojará el siguiente mensaje en un recuadro verde "El registro ha sido actualizado exitosamente". Si no fue así verifique que haya rellenado los datos correctamente.</p>
              <h6 id="item-1-1-4">Eliminar un préstamo</h6>
              <ol>
                <li>En la pestaña Préstamos, busque el registro que desee eliminar.</li>
                <li>Pulse el botón rojo con el ícono del cubo de basura.</li>
              </ol>
              <p>En caso de éxito, el sistema arrojará el siguiente mensaje en un recuadro rojo "El registro ha sido eliminado exitosamente."</p>
            </div>

            <h6 id="item-1-2">Ver los préstamos pendientes por devolución</h6>
            <ol>
              <li>Pulse Préstamo circulante en la barra lateral de la izquierda. Se desplegará un pequeño submenú.</li>
              <li>Pulse la opción Devolución.</li>
            </ol>
            <p>La aplicación mostrará todos los préstamos pendientes por devolución, con la fecha de esta, el título del libro, el nombre del solicitante, su número de teléfono y correo electrónico.</p>
           
            <div class="ml-4">
              <h6 id="item-1-2-1">Marcar un préstamo como devuelto</h6>
              <p>En la opción de devolución de préstamos se muestran los datos de los préstamos registrados. En el momento en que los libros son regresados a la biblioteca se debe pulsar el botón negro con el visto para que dicho préstamo dee de aparecer como pendiente.</p>
            </div>

            <h4 id="item-2">Solicitantes</h4>

            <h6 id="item-2-1">Ver todos los solicitantes registrados</h6>
            <p>Pulse Solicitantes en la barra lateral de la izquierda. La aplicación mostrará todos los solicitantes registrados en ella, con su número de carnet, nombre, apellido y cédula de identidad.</p>
  
            <div class="ml-4">
            <h6 id="item-2-1-2">Añadir nuevo solicitante</h6>
              <ol>
                <li>En la pestaña Solicitantes, baje hasta el final final de la tabla y pulse la barra azul Añadir Nuevo Solicitante.</li>
                <li>Se mostrará un formulario, en el que ingresarán los datos personales del solicitante: Nombre, apellido, Cédula de identidad, sexo y edad; los datos de contacto: número de teléfono, dirección de correo electrónico y dirección de habitación; y datos de ocupación: Si trabaja estudia o no hace ninguno, nombre, teléfono y dirección del lugar de trabajo o estudio.</li>
                <li>Añadidos los datos correctamente pulse el botón verde Agregar Registro.</li>
              </ol>
              <p>En caso de que haya seguido los pasos correctamente, el sistema lo devolverá a la vista de los solicitantes registrados y arrojará el siguiente mensaje en un recuadro verde "Un nuevo solicitante ha sido agregado". Si no fue así verifique que haya rellenado los datos correctamente.</p>
              <h6 id="item-2-2">Información de los solicitantes registrados</h6>
              <p>Una vez mostrados los solicitantes, se visualizarán los registros ordenados por el número de carnet de menor a mayor, por lo que los últimos registros realizados se encontrarán al final de la paginación.</p>
              <p>Haciéndo click en el botón con el icono del ojo se mostrará una pestaña con los datos completos del solicitante.</p>
              <h6 id="item-2-2-1">Generar carnet</h6>
              <p>En la pestaña con la información completa de los solicitantes en la parte superior hay dos botones azules.</p>
              <p>Pulse el botón Generar carnet y el sistema lo mostrará en un archivo pdf listo para imprimir.</p>
              <h6 id="item-2-2-2">Historial de préstamos</h6>
              <p>En la pestaña con la información de los solicitantes en la parte superior hay dos botones azules.</p>
              <p>Pulse el botón Historial de préstamos y el sistema los datos del solicitante junto a una lista de los libros prestados a dicho solicitante en un archivo pdf listo para imprimir.</p>
              <h6 id="item-2-3">Modificar los datos de un solicitante</h6>
              <ol>
                <li>Volviéndo a la pestaña Solicitantes se busca aquel cuyos datos se desean modificar.</li>
                <li>Pulse el botón verde con el icono del lápiz para acceder a la pantalla para modificar los datos del mismo.</li>
                <li>Aparecerá un formulario donde se mostrarán los datos del solicitante y podrá editarlos.</li>
                <li>Finalmente, pulse el botón verde ubicado al final en la parte inferior del formulario, Modificar registro.</li>
              </ol>
              <p>El sistema lo devolverá a la vista de los solicitantes registrados y arrojará el siguiente mensaje en un recuadro verde "El registro ha sido actualizado exitosamente". Si no fue así verifique que haya rellenado los datos correctamente.</p>
              <h6 id="item-2-4">Desactivar un solicitante</h6>
              <ol>
                <li>En la pestaña Solicitantes, busque el registro que desee desactivar.</li>
                <li>Pulse el botón rojo con el ícono del usuario tachado.</li>
              </ol>
              <p>En caso de éxito, el sistema arrojará el siguiente mensaje en un recuadro rojo "El registro ha sido eliminado exitosamente."</p>
            </div>
            
            <h4 id="item-3">Libros</h4>
          
            <h6 id="item-3-1">Ver todos los libros registrados</h6>
            <p>Pulse Libros en la barra lateral de la izquierda. La aplicación mostrará todos los libros registrados en el sistema. Se podrá ver la cota, el título, el autor, la categoría y el estado del libro. </p>
            
            <div class="ml-4">
              <h6 id="item-3-1-1">Añadir nuevo libro</h6>
              <ol>
                <li>En la pestaña Libros, baje hasta el final final de la tabla y pulse la barra azul Añadir Nuevo Libro.</li>
                <li>Se mostrará un formulario, en el que ingresará la cota, el título, el autor, la categoría y el estado actual del libro.</li>
                <li>Añadidos los datos correctamente pulse el botón verde Agregar Registro.</li>
              </ol>
              <p>En caso de que haya seguido los pasos correctamente, el sistema lo devolverá a la vista de los libros registrados y arrojará el siguiente mensaje en un recuadro verde "Un nuevo libro ha sido agregado". Si no fue así verifique que haya rellenado los datos correctamente.</p>
              <h6 id="item-3-1-2">Modificar los datos de un libro</h6>
              <ol>
                <li>Volviéndo a la pestaña donde se visualizan los libros debe hacer click en el botón verde con el icono del lápiz para acceder a la pantalla para modificar los datos del libro.</li>
                <li>Aparecerá un formulario con los datos del libro, los cuales podrá modificar.</li>
                <li>Finalmente, pulse el botón verde Modificar registro.</li>
              </ol>
              <p>En caso de que se haya podido modificar, el sistema lo devolverá a la vista de los préstamos registrados y arrojará el siguiente mensaje en un recuadro verde "El registro ha sido actualizado exitosamente". Si no fue así verifique que haya rellenado los datos correctamente.</p>
              <h6 id="item-3-1-3">Eliminar un libro</h6>
              <ol>
                <li>En la pestaña Libros, busque el registro que desee eliminar.</li>
                <li>Pulse el botón rojo con el ícono del cubo de basura.</li>
              </ol>
              <p>En caso de éxito, el sistema arrojará el siguiente mensaje en un recuadro rojo "El registro ha sido eliminado exitosamente."</p>
            </div>
            </div>
        </div>

        <div class="col-3">
          <nav id="navbar-example3" class="navbar navbar-light bg-light flex-column align-items-stretch p-3">
            <a class="navbar-brand" href="#">Indice</a>
            <nav class="nav nav-pills flex-column">
              <a class="h6 my-1 mt-1" href="#item-1">Préstamo circulante</a>
              <nav class="nav nav-pills flex-column">
                <a class="my-1 ml-2" href="#item-1-1">Ver préstamos</a>
                <a class="my-1 ml-2" href="#item-1-1-1">Nuevo préstamo</a>
                <a class="my-1 ml-2" href="#item-1-1-2">Información préstamos</a>
                <a class="my-1 ml-2" href="#item-1-1-3">Modificar préstamo</a>
                <a class="my-1 ml-2" href="#item-1-1-4">Eliminar préstamo</a>
                <a class="my-1 ml-2" href="#item-1-2">Préstamos pendientes</a>
                <a class="my-1 ml-2" href="#item-1-2-1">Marcar como devuelto</a>
              </nav>
              <a class="h6 my-1 mt-2" href="#item-2">Solicitantes</a>
              <a class="my-1 ml-2" href="#item-2-1">Ver solicitantes</a>
              <a class="my-1 ml-2" href="#item-2-1-2">Nuevo solicitante</a>
              <a class="my-1 ml-2" href="#item-2-2">Información solicitantes</a>
              <a class="my-1 ml-2" href="#item-2-2-1">Generar carnet</a>
              <a class="my-1 ml-2" href="#item-2-2-2">Historial préstamos</a>
              <a class="my-1 ml-2" href="#item-2-3">Modificar solicitante</a>
              <a class="my-1 ml-2" href="#item-2-4">Desactivar solicitante</a>
              
              <a class="h6 my-1 mt-2" href="#item-3">Libros</a>
              <nav class="nav nav-pills flex-column">
                <a class="my-1 ml-2" href="#item-3-1">Ver libros</a>
                <a class="my-1 ml-2" href="#item-3-1-1">Nuevo libro</a>
                <a class="my-1 ml-2" href="#item-3-1-2">Modificar libro</a>
                <a class="my-1 ml-2" href="#item-3-1-3">Eliminar libro</a>
              </nav>
            </nav>
          </nav>
        </div>
      </div>

      <?php elseif ($nivel == 10): ?>
        <div class="row">
          <div class="col-9">

            <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-offset="0" tabindex="0">
              <h5 id="item-1">Añadir nuevo solicitante</h5>
              <ol>
                <li>Pulse Registros en la barra lateral de la izquierda. Se desplegará un pequeño submenú.</li>
                <li>Pulse la opción Solicitantes.</li>
                <li>Se mostrará un formulario, en el que ingresarán los datos personales del solicitante: Nombre, apellido, Cédula de identidad, sexo y edad; los datos de contacto: número de teléfono, dirección de correo electrónico y dirección de habitación; y datos de ocupación: Si trabaja estudia o no hace ninguno, nombre, teléfono y dirección del lugar de trabajo o estudio.</li>
                <li>Añadidos los datos correctamente pulse el botón verde Agregar Registro.</li>
              </ol>
              <p>En caso de que haya seguido los pasos correctamente, el sistema mostrará los solicitantes registrados y arrojará el siguiente mensaje en un recuadro verde "Un nuevo solicitante ha sido agregado". Si no fue así verifique que haya rellenado los datos correctamente.</p>
              
              <h5 id="item-2">Añadir nuevo libro</h5>
              <ol>
                <li>Pulse Registros en la barra lateral de la izquierda. Se desplegará un pequeño submenú.</li>
                <li>Pulse la opción Libros.</li>
                <li>Se mostrará un formulario, en el que ingresará la cota, el título, el autor, la categoría y el estado actual del libro.</li>
                <li>Añadidos los datos correctamente pulse el botón verde Agregar Registro.</li>
              </ol>
              <p>En caso de que haya seguido los pasos correctamente, el sistema mostrará los libros registrados y arrojará el siguiente mensaje en un recuadro verde "Un nuevo libro ha sido agregado". Si no fue así verifique que haya rellenado los datos correctamente.</p>
              
              <h5 id="item-3">Añadir nuevo préstamo</h5>
              <ol>
                <li>Pulse Procesos en la barra lateral de la izquierda. Se desplegará un pequeño submenú.</li>
                <li>Pulse la opción Préstamo de libros.</li>
                <li>Se mostrará un formulario, en el que seleccionará el número de carnet del solicitante, el nombre del libro, la fecha de entrega y de devolución del mismo y si es necesario puede añadir observaciones.</li>
                <li>Añadidos los datos correctamente pulse el botón verde Agregar Registro.</li>
              </ol>
              <p>En caso de que haya seguido los pasos correctamente, el sistema mostrará los préstamos registrados y arrojará el siguiente mensaje en un recuadro verde "Un nuevo préstamo ha sido agregado". Si no fue así verifique que haya rellenado los datos correctamente.</p>
   
              <h5 id="item-4">Marcar préstamo como devuelto</h5>
              <ol>
                <li>Pulse Procesos en la barra lateral de la izquierda. Se desplegará un pequeño submenú.</li>
                <li>Pulse la opción Devolución de libros.</li>
                <li>La aplicación mostrará todos los préstamos pendientes por devolución, con la fecha de esta, el título del libro, el nombre del solicitante, su número de teléfono y correo electrónico.</li>
                <li>En la opción de devolución de préstamos se muestran los datos de los préstamos registrados. En el momento en que los libros son regresados a la biblioteca se debe pulsar el botón negro con el visto para que dicho préstamo dee de aparecer como pendiente.</li>
              </ol>

              <h5 id="item-5">Ver solicitantes</h5>
              <ol>
                <li>Pulse Consultas y reportes en la barra lateral de la izquierda. Se desplegará un pequeño submenú.</li>
                <li>Pulse la opción Solicitantes.</li>
              </ol>
              <p>La aplicación mostrará todos los solicitantes registrados en ella, con su número de carnet, nombre, apellido y cédula de identidad.</p>
              
              <h6 id="item-5-1">Información de los solicitantes registrados</h6>
              <p>Una vez mostrados los solicitantes, se visualizarán los registros ordenados por el número de carnet de menor a mayor, por lo que los últimos registros realizados se encontrarán al final de la paginación.</p>
              <p>Haciéndo click en el botón con el icono del ojo se mostrará una pestaña con los datos completos del solicitante.</p>
              <h6 id="item-5-2">Generar carnet</h5>
              <p>En la pestaña con la información completa de los solicitantes en la parte superior hay dos botones azules.</p>
              <p>Pulse el botón Generar carnet y el sistema lo mostrará en un archivo pdf listo para imprimir.</p>
              <h6 id="item-5-3">Historial de préstamos</h5>
              <p>En la pestaña con la información de los solicitantes en la parte superior hay dos botones azules.</p>
              <p>Pulse el botón Historial de préstamos y el sistema los datos del solicitante junto a una lista de los libros prestados a dicho solicitante en un archivo pdf listo para imprimir.</p>
              <h6 id="item-5-4">Modificar los datos de un solicitante</h6>
              <ol>
                <li>Volviéndo a la pestaña Solicitantes se busca aquel cuyos datos se desean modificar.</li>
                <li>Pulse el botón verde con el icono del lápiz para acceder a la pantalla para modificar los datos del mismo.</li>
                <li>Aparecerá un formulario donde se mostrarán los datos del solicitante y podrá editarlos.</li>
                <li>Finalmente, pulse el botón verde ubicado al final en la parte inferior del formulario, Modificar registro.</li>
              </ol>
              <p>El sistema lo devolverá a la vista de los solicitantes registrados y arrojará el siguiente mensaje en un recuadro verde "El registro ha sido actualizado exitosamente". Si no fue así verifique que haya rellenado los datos correctamente.</p>
              <h6 id="item-5-5">Eliminar un solicitante</h6>
              <ol>
                <li>En la pestaña Solicitantes, busque el registro que desee eliminar.</li>
                <li>Pulse el botón rojo con el ícono del cubo de basura.</li>
              </ol>
              <p>En caso de éxito, el sistema arrojará el siguiente mensaje en un recuadro rojo "El registro ha sido eliminado exitosamente."</p>
            </div>

              <h5 id="item-6">Ver libros</h5>
              <ol>
                <li>Pulse Consultas y reportes en la barra lateral de la izquierda. Se desplegará un pequeño submenú.</li>
                <li>Pulse la opción Libros.</li>
              </ol>
              <p>La aplicación mostrará todos los libros registrados en el sistema. Se podrá ver la cota, el título, el autor, la categoría y el estado del libro.</p>
              
              <h6 id="item-6-1">Ver los datos y la cantidad de un libro</h6>
                <p>En la pestaña donde se visualizan los libros debe hacer click en el botón azul con el icono del ojo para acceder a la pantalla con los datos y la cantidad del libro.</p>
                
                <h6 id="item-6-2">Modificar los datos de un libro</h6>
                <ol>
                <li>En la pantalla con los datos y cantidad del libro aparecerán dos botones verdes en la parte superior, debe presionar Modificar datos.</li>
                <li>Aparecerá un formulario con los datos del libro, los cuales podrá modificar.</li>
                <li>Finalmente, pulse el botón verde Modificar registro.</li>
              </ol>
              <p>En caso de que se haya podido modificar, el sistema lo devolverá a la vista de los préstamos registrados y arrojará el siguiente mensaje en un recuadro verde "El registro ha sido actualizado exitosamente". Si no fue así verifique que haya rellenado los datos correctamente.</p>

              <h6 id="item-6-3">Modificar la cantidad de un libro</h6>
                <ol>
                <li>En la pantalla con los datos y cantidad del libro aparecerán dos botones verdes en la parte superior, debe presionar Modificar cantidad.</li>
                <li>Aparecerá un formulario con los datos del libro, los cuales podrá modificar.</li>
                <li>Finalmente, pulse el botón verde Modificar registro.</li>
              </ol>
              <p>En caso de que se haya podido modificar, el sistema lo devolverá a la vista de los préstamos registrados y arrojará el siguiente mensaje en un recuadro verde "El registro ha sido actualizado exitosamente". Si no fue así verifique que haya rellenado los datos correctamente.</p>
              
              <h6 id="item-6-4">Eliminar un libro</h6>
              <ol>
                <li>En la pestaña Libros, busque el registro que desee eliminar.</li>
                <li>Pulse el botón rojo con el ícono del cubo de basura.</li>
              </ol>
              <p>En caso de éxito, el sistema arrojará el siguiente mensaje en un recuadro rojo "El registro ha sido eliminado exitosamente."</p>

              <h5 id="item-7">Ver préstamos</h5>
              <ol>
                <li>Pulse Consultas y reportes en la barra lateral de la izquierda. Se desplegará un pequeño submenú.</li>
                <li>Pulse la opción Préstamos.</li>
              </ol>
              <p>La aplicación mostrará todos los préstamos registrados en ella, con el número de carnet del solicitante que retiró el libro, la cota del libro que se retiró, la fecha de entrega y la fecha de devolución.</p>

             
              <h6 id="item-7-1">Información de los préstamos realizados</h6>
              <p>Una vez mostrados los préstamos, se visualizarán primero los últimos registros. Pulse el botón azul con el icono del ojo se mostrará una pestaña con el número de carnet y el nombre del solicitante, la cota y el título del libro, la fecha de entrega y de devolución junto con las observaciones realizadas en el préstamo.</p>
              <h6 id="item-7-2">Modificar la información de los préstamos realizados</h6>
              <ol>
                <li>Volviéndo a la pestaña donde se visualizan los préstamos debe hacer click en el botón verde con el icono del lápiz para acceder a la pantalla para modificar los datos del préstamo.</li>
                <li>Aparecerá un formulario con los datos del préstamo que podrá modificar.</li>
                <li>Finalmente, pulse el botón verde Modificar registro.</li>
              </ol>
              <p>En caso de que se haya podido modificar, el sistema lo devolverá a la vista de los préstamos registrados y arrojará el siguiente mensaje en un recuadro verde "El registro ha sido actualizado exitosamente". Si no fue así verifique que haya rellenado los datos correctamente.</p>
              <h6 id="item-7-3">Eliminar un préstamo</h6>
              <ol>
                <li>En la pestaña Préstamos, busque el registro que desee eliminar.</li>
                <li>Pulse el botón rojo con el ícono del cubo de basura.</li>
              </ol>
              <p>En caso de éxito, el sistema arrojará el siguiente mensaje en un recuadro rojo "El registro ha sido eliminado exitosamente."</p>

            <h5 id="item-8">Categorías</h5>
            <ol>
              <li>Pulse Configuración en la barra lateral de la izquierda. Se desplegará un pequeño submenú.</li>
              <li>Pulse la opción Categorías.</li>
            </ol>
            <p>La aplicación mostrará un formulario para agregar nuevas categorías y una vista de las categorías registradas indicando el número que identifica cada categoría, el nombre y el piso en la que se encuentra ubicada, junto con las opciones de modificar los datos y de eliminarlos.</p>

            <h5 id="item-9">Usuarios</h5>  
            <ol>
              <li>Pulse Configuración en la barra lateral de la izquierda. Se desplegará un pequeño submenú.</li>
              <li>Pulse la opción Usuarios.</li>
            </ol>
            <p>La aplicación mostrará un formulario para agregar nuevos usuarios del sistema y una vista de los usuarios registradaos indicando el nombre de la persona y el nombre de usuario que usa para ingresar al sistema junto con las opciones de modificar los datos y de eliminarlos.</p>

            <h5 id="item-10">Auditoría</h5>
            <p>También conocida como bitácora de usuarios, en esta parte podrá encontrar el registro de todas las acciones ejecutadas por los usuarios en el sistema.</p>
            <ol class="mb-4">
              <li>Para acceder a esta opción pulse Configuración en la barra lateral de la izquierda. Se desplegará un pequeño submenú.</li>
              <li>Pulse la opción Auditoría.</li>
            </ol>
          </div>


          <div class="col-3">
            <nav id="navbar-example3" class="navbar navbar-light bg-light flex-column align-items-stretch p-3">
              <a class="navbar-brand" href="#">Índice</a>
              <nav class="nav nav-pills flex-column">
                <a class="my-1" href="#item-1">Añadir solicitante</a>
                <a class="my-1" href="#item-2">Añadir libro</a>
                <a class="my-1" href="#item-3">Añadir préstamo</a>
                <a class="my-1" href="#item-4">Devolver préstamo</a>
                <a class="my-1" href="#item-5">Ver solicitantes</a>
                <a class="my-1 ml-2" href="#item-5-1">Información solicitantes</a>
              <a class="my-1 ml-2" href="#item-5-2">Generar carnet</a>
              <a class="my-1 ml-2" href="#item-5-3">Historial préstamos</a>
              <a class="my-1 ml-2" href="#item-5-4">Modificar solicitante</a>
              <a class="my-1 ml-2" href="#item-5-5">Eliminar solicitante</a>
                <a class="my-1" href="#item-6">Ver libros</a>
                <a class="my-1 ml-2" href="#item-6-1">Información libros</a>
                <a class="my-1 ml-2" href="#item-6-2">Modificar datos libro</a>
                <a class="my-1 ml-2" href="#item-6-3">Modificar cantidad libro</a>
                <a class="my-1 ml-2" href="#item-6-4">Eliminar libro</a>
                <a class="my-1" href="#item-7">Ver préstamos</a>
                <a class="my-1 ml-2" href="#item-7-1">Información préstamos</a>
                <a class="my-1 ml-2" href="#item-7-2">Modificar préstamo</a>
                <a class="my-1 ml-2" href="#item-7-3">Eliminar préstamo</a>
                <a class="my-1" href="#item-8">Categorías</a>
                <a class="my-1" href="#item-9">Usuarios</a>
                <a class="my-1" href="#item-10">Auditoría</a>
              </nav>
            </nav>
          </div>
       </div>
    <?php endif ?>


  </section>
</div>

<?php

    include_once 'views/partials/footer.php';


