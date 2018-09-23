<?php
require 'header.php';
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                    <center>
                          <h1 class="box-title">Empaques <button class="btn btn-success" onclick="mostrarform(true)" id="btn-agregar"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                          </center>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                        <th>Opcion</th>
                          <th>Rut</th>
                          <th>Nombre</th>
                          <th>Email</th>
                          <th>Telefono</th>
                          <th>Grupo</th>
                          <th>Rol</th>
                        <th>Estado</th>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        <th>Opcion</th>
                          <th>Rut</th>
                          <th>Nombre</th>
                          <th>Email</th>
                          <th>Telefono</th>
                          <th>Grupo</th>
                          <th>Rol</th>
                        <th>Estado</th>
                        </tfoot>
                        </table>
                    </div>
                    <div class="panel-body table-responsive text-center" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                        <div id="div_rut" class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-8">
                         <label>Rut:</label>
                         <input type="text" class="form-control"  name="rut" id="rut" required maxlength="8">
                         </div>
                         <div id="div-dv" class="form-group col-lg-1 col-md-1 col-sm-1 col-xs-1">
                         <label>DV:</label>
                         <input type="text" class="form-control" name="dv" id="dv" required maxlength="1">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <label>Nombre:</label>
                         <input type="text" class="form-control" name="nombre" id="nombre" maxLenght="100" required>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Grupo:</label>
                              <select name="id_grupo" data-live-search="true" class="form-control selectpicker" id="id_grupo" required>
                              </select>
                             </div>
                             <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Rol:</label>
                              <select name="id_rol" class="form-control " id="id_rol" required>
                              </select>
                             </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" id="email">
                           </div>
                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Telefono:</label>
                              <input type="text" class="form-control" name="telefono" id="telefono">
                             </div>
                        <div class="from-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                          <button class="btn btn-danger" type="button" onclick="cancelarform()"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                        </div>
                        </form>
                      </div>
                        </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
  <?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/usuario.js"></script>