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
                          <h1 class="box-title">Grupo <button id="btn_agregar" class="btn btn-success" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
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
                          <th>Nombre</th>
                          <th>Descripcion</th>
                          <th>Turnos</th>
                          <th>Horario-Toma</th>
                          <th>Estado</th>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        <th>Opcion</th>
                          <th>Nombre</th>
                          <th>Descripcion</th>
                          <th>Turnos</th>
                          <th>Horario-Toma</th>
                          <th>Estado</th>
                        </tfoot>
                        </table>
                    </div>
                    <div class="panel-body table-responsive text-center" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <label>Nombre:</label>
                         <input type="hidden"  name="id_grupo" id="id_grupo">
                         <input type="text" class="form-control" name="nombre" id="nombre" maxLenght="100" placeholder="Nombre" required>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <label>Descripcion:</label>
                         <input type="text" class="form-control" name="descripcion" id="descripcion" maxLenght="255" placeholder="descripcion">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Cantidad De Turnos Maximo:</label>
                            <input type="number" class="form-control" name="max_turno" id="max_turno" maxLenght="2" placeholder="Cantidad Turnos Semana Ej:10">
                           </div>
                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Hora De La Toma:</label>
                              <input type="time" class="form-control" name="inicio_toma" id="inicio_toma" required value="22:00">
                             </div>
                        <div class="from-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                          <button class="btn btn-danger" type="button" onclick="cancelarform()"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                        </div>
                        </form>
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
<script type="text/javascript" src="scripts/grupo.js"></script>