<div class="container">

    <section class="mt-4 col-xl-10 cuerpo">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Organizadores</h1>

            <div class="alert alert-success d-none pointer" id="msgOrganizers">
            </div>
        </div>

        <div class="p-3 mb-3">
            <table id="tableOrganizer" class="table lazy__table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cuenta</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($organizers as $organizer) : ?>
                        <tr>
                            <th scope="row"><?php echo $organizer['id']; ?></th>
                            <td><?php echo $organizer['name_user'] ?></td>
                            <td><?php echo $organizer['email_user'] ?></td>
 
                            <?php if ($organizer['is_actived']) : ?>
                                <td><i class="fas fa-circle fa-xs text-success"></i> Activo</td>
                            <?php else : ?>
                                <td><i class="fas fa-circle  fa-xs text-danger"></i> Inactivo</td>
                            <?php endif; ?>

                            <td>
                                <button class="btn btn-primary view-details-organizer" data-target="#exampleModal">
                                    <span class="fas fa-eye"></span>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>

    </section>
</div>

<div class="modal fade" id="organizerModal" data-target="#exampleModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detalles De Organizador</span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <article class="row" id="organizerDetails">
                   
                </article>
            </div>
            <div class="modal-footer text-right">
                <form>
                    <input type="hidden" id="organizerInput">
                    <input type="hidden" id="statusInput">
                    <button type="button" class="btn btn-primary d-none" id="saveDatails"><span class="fa-solid fa-floppy-disk"></span> Guardar Cambios</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
