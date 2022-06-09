

<div class="container">
  
  <section class="mt-4 col-xl-10 cuerpo">

    <?php   foreach ($result as $row) :	?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><?php echo $row['nomSol'] ?> <?php echo $row['apeSol'] ?></h1>
      <a class="btn color-primario text-white float-right" href="index.php?controller=solicitante&action=pdf&id=<?php echo $row['idSol'] ?>" role="button">Generar reporte PDF <i class="fas fa-download"></i></a>
    </div>

    <?php endforeach; ?>

    <div class="card">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Cota</th>
            <th scope="col">Título</th>
            <th scope="col">Autor</th>
            <th scope="col">Fecha de entrega</th>
            <th scope="col">Fecha de devolución</th>
        </tr>
        </thead>
        <tbody>
            <tr>
            <?php foreach ($resulthistorial as $clave) : ?>
              <th scope="row"><?php echo $clave['cota']; ?></th>
              <td><?php echo $clave['titulo'] ?></td>
              <td><?php echo $clave['autor'] ?></td>
              <td><?php echo $clave['fe'] ?></td>
              <td><?php echo $clave['fd'] ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

    </div>

  </section>
</div>