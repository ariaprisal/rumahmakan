<?php 
session_start();
include "../validasi_session.php";
include 'fungsi_meja.php';

$db = query("SELECT * FROM tb_meja");

if( isset($_POST["submit"]) )
{

    //cek data berhasil di tambhakan
    if( tambah($_POST) > 0 ) 
    {
      echo "
          <script>
            alert('data berhasil di tambahkan!!');
            document.location.href = 'list_meja.php';
          </script>";
    }
}

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
            List Meja
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-user"></i>Data Meja</li>
          </ol>
        </section>

      <section class="content">
        <div class="row">
          <div class="col-xs-12">
           <div class="box">
              <div class="box-header">
                 <div class="box-body">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                    <i class="fa fa-plus"></i>&nbsp;Add Meja</a>
                  </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="table" class="table table-bordered table-striped table-bordered dt-responsive nowrap">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>No Meja</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach( $db as $row ): ?>
                  <tr>
                      <td><?= $i; ?></td>
                      <td><?= $row["no_meja"]; ?></td>
                      <td>
                        <a href="#" id="<?php echo $row['id_meja'];?>" class="btn btn-sm btn-default open_modal_detail" title="Search"><i class="fa fa-search"></i></a>
                        &nbsp;&nbsp;
                        <a href="#" id="<?php echo $row['id_meja'];?>" class="btn btn-sm btn-info open_modal" title="Edit"><i class="fa fa-edit"></i></a>
                        &nbsp;&nbsp;
                        <a href="#" onclick="confirm_delete_order('<?php echo "meja_hapus.php?id_meja"."=".$row['id_meja'];?>')" class="btn btn-sm btn-danger" title="Hapus"><i class="fa fa-trash"></i></a>
                      </td>
                  </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </button>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>No Meja</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
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
                <h4 class="modal-title"><i class="fa fa-plus"></i>&nbsp;Add Order</h4>
              </div>
            <div class="modal-body">
            <form action="" class="form-horizontal" method="post">
              <input type="hidden" name="id_meja">
              <div class="box-body">

                <div class="form-group">
                            <label class="control-label col-md-3">No Meja</label>
                            <div class="col-md-9">
                                <input name="no_meja" id="no_meja" placeholder="No Meja" class="form-control" type="text" required="">
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

    <div class="modal fade" id="modal_edit_meja"></div>
    <div class="modal fade" id="meja_detail"></div>

      <div class="modal fade" id="modal_delete_order">
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
    

<?php 
include "footer.php";
?>

<?php include "javascript.php"; ?>

<script>

  $(function(){

    $("#table").DataTable({
      "dom": '<"top"i>rt<"bottom"flp><"clear">',
    });

    $('#tanggal').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });

  });
  
    function confirm_delete_order(delete_url)
    {
      $('#modal_delete_order').modal('show');
      document.getElementById('delete_link').setAttribute('href', delete_url);
    }

    $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
        $.ajax({
          url: "meja_modal_edit.php",
          type: "GET",
          data : {id_meja: m,},
          success: function (ajaxData){
          $("#modal_edit_meja").html(ajaxData);
          $("#modal_edit_meja").modal('show',{backdrop: 'true'});
          }
        });
      });

    $(".open_modal_detail").click(function(e) {
      var m = $(this).attr("id");
        $.ajax({
          url: "meja_modal_detail.php",
          type: "GET",
          data : {id_meja: m,},
          success: function (ajaxData){
          $("#meja_detail").html(ajaxData);
          $("#meja_detail").modal('show',{backdrop: 'true'});
          }
        });
      });

</script>

<!-- tb_order

id_order
tanggal_order
nama_order
total_order -->