<?php
session_start();
include "../validasi_session.php";
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>RumahMakan</title>

  <!-- Library CSS -->
  <?php
    include "bundle_css.php";
  ?>
  </head>

  <body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
      <?php
        include 'content_header.php';
       ?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <p></p>
            </div>
          </div><!-- sidebar menu: : style can be found in sidebar.less -->
          <?php include "menu.php";?>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Menu
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-user"></i> Menu Makanan</li>
          </ol>
        </section>


      <!-- Awal Konten -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            
            <!-- /.box -->

            <div class="box">
              <div class="box-header">
                 <div class="box-body">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                    <i class="fa fa-plus"></i>&nbsp;Add Menu</a>
                  </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                <table id="tabel_menu" class="table table-bordered table-striped table-scalable">

                  <?php include "dt_list_menu.php";?>

                </table>
              </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
  </div>
</div>

     <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i>&nbsp;Add Menu</h4>
              </div>
            <div class="modal-body">
            <form action="" class="form-horizontal" method="post">
              <div class="box-body">
                <div class="form-group">
                            <label class="control-label col-md-3">Nama Menu</label>
                            <div class="col-md-9">
                                <input name="nama_makanan" id="nama_makanan" placeholder="Nama Menu" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>

                <div class="form-group">
                            <label class="control-label col-md-3">Keterangan</label>
                            <div class="col-md-9">
                                <input name="keterangan" id="keterangan" placeholder="Keterangan" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>

                <div class="form-group">
                            <label class="control-label col-md-3">Harga</label>
                            <div class="col-md-9">
                                <input name="harga" id="harga" placeholder="Harga" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-primary">Simpan&nbsp;<i class="fa  fa-check-square-o"></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal&nbsp;<i class="fa fa-sign-out"></i></button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>

    <!-- Modal Popup List Menu Edit -->
    <div id="modal_edit_menu" class="modal fade" tabindex="-1" role="dialog"></div>
    <div id="modal_detail" class="modal fade" tabindex="-1" role="dialog"></div>
    <!-- Modal Popup List Menud End -->
    
    <!-- Modal Popup untuk delete--> 
    <div class="modal fade" id="modal_delete">
      <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>

            <h4 class="modal-title" style="text-align:center;">Anda Yakin Ingin Menghapus Data Ini ?</h4>
          </div>    
          <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
            <a href="#" class="btn btn-danger" id="delete_link">Hapus&nbsp;<i class="fa  fa-close"></i></a>
            <button type="button" class="btn btn-success" class="close" data-dismiss="modal">Batal&nbsp;<i class="fa fa-sign-out"></i></button>
          </div>
        </div>
      </div>
    </div>
    
    </div><!-- /.content-wrapper -->

<!-- include footer -->
<?php include "footer.php"; ?>

    </div><!-- ./wrapper -->

<!-- Library Scripts -->
<?php include "javascript.php"; ?>

</body>
</html>