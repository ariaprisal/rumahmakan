<?php 
session_start();
include '../validasi_session.php';
include 'fungsi_pesanan.php';

$db = query("SELECT * FROM tb_pesanan");

if( isset($_POST["submit"]) ){

    //cek data berhasil di tambhakan
  if(tambah($_POST) > 0 ) {
    echo "
        <script>
          alert('data berhasil di tambahkan!!');
          document.location.href = 'list_pesanan.php';
        </script>";
  } else{
  echo "
        <script>
          alert('data gagal di tambahkan!!');
          document.location.href = 'list_pesanan.php';
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
            List Pesanan
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-user"></i> Menu Pesanan</li>
          </ol>
        </section>

      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            
            <!-- /.box -->

           <div class="box">
              <div class="box-header">
                 <div class="box-body">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                    <i class="fa fa-plus"></i>&nbsp;Add Pesanan</a>
                  </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pesanan</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach( $db as $row ): ?>
                    <?php $i = 1; ?>
                  <tr>
                      <td><?= $i; ?></td>
                      <td><?= $row["nama_pesanan"]; ?></td>
                      <td><?= $row["jumlah_pesanan"]; ?></td>
                      <td>Rp.<?php echo number_format($row["total_harga"]); ?></td>
                      <td>
                        <a href="<?php echo $row['id_menu'];?>" class="btn btn-sm btn-default" title="Search"><i class="fa fa-search"></i></a>
                        &nbsp;&nbsp;
                        <a href="#" onclick="edit_pesanan('<?php echo $row['id_pesanan'];?>')" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
                        &nbsp;&nbsp;
                        <a href="#" onclick="confirm_delete_pesanan('<?php echo "pesanan_hapus.php?id_pesanan"."=".$row['id_pesanan'];?>')" class="btn btn-sm btn-danger" title="Hapus"><i class="fa fa-trash"></i></a>

                    
                      </td>
                  </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </button>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama Pesanan</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
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
                <h4 class="modal-title"></h4>
              </div>
            <div class="modal-body">
            <form action="javascript:update_pesanan()" class="form-horizontal" id="form" method="post">
              <input type="text" name="id_pesanan">
              <div class="box-body">
                <div class="form-group">
                            <label class="control-label col-md-3">Nama Pesanan</label>
                            <div class="col-md-9">
                                <input name="nama_pesanan" id="nama_pesanan" placeholder="Nama" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>

                       <div class="form-group">
                            <label class="control-label col-md-3">Jumlah Pesanan</label>
                            <div class="col-md-9">
                                <input name="jumlah_pesanan" id="jumlah_pesanan" placeholder="Jumlah" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>

                <div class="form-group">
                            <label class="control-label col-md-3">Total Harga</label>
                            <div class="col-md-9">
                                <input name="total_harga" id="total_harga" placeholder="Harga" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>

              </div>
              <div class="modal-footer">
                <span id="notif" style='padding-right:15px;margin-top:20px'></span>
                <button type="submit" name="nothing" class="btn btn-primary" >Simpan&nbsp;<i class="fa  fa-check-square-o"></i></button>
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



      <div class="modal fade" id="modal_delete_pesanan">
      <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>

            <h4 class="modal-title" style="text-align:center;">Anda Yakin Ingin Menghapus Data Ini ?</h4>
          </div>    
          <div class="modal-footer">
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

  $(document).ready(function(){

      $("#table").DataTable({
      "dom": '<"top"i>rt<"bottom"flp><"clear">',
    });

    // /Date picker
    $('#tanggal').datepicker({
      autoclose: true
    });

  });

  function confirm_delete_pesanan(delete_url)
    {
      $('#modal_delete_pesanan').modal('show');
      document.getElementById('delete_link').setAttribute('href', delete_url);
    }

  function edit_pesanan(id_pesanan)
  {
    $.ajax({
      url:"pesanan_edit.php/?id_pesanan=" + id_pesanan,
      type:"GET",
      dataType:"JSON",

      success:function(data)
      {
        $('[name="id_pesanan"]').val(data.id_pesanan);

        $('[name="nama_pesanan"]').val(data.nama_pesanan);
        $('[name="jumlah_pesanan"]').val(data.jumlah_pesanan);
        $('[name="total_harga"]').val(data.total_harga);
        $('#modal-default').modal('show');
        $('.modal-title').html('<i class="fa fa-edit"></i>&nbsp;<b>Edit Pesanan</b>');
      },

      error:function(jqXHR,textStatus,errorThrown)
      {
        alert('ERROR !!!');
      }

    });
  }

  function update_pesanan()
  {
    $.ajax({
      url: 'pesanan_edit.php',
      type:'POST',
      data: $('#form').serialize(),
      dataType:'JSON',

      success:function(data)
      {
        if(data.status)
        {
          $('#notif').html('<font color="green"><i class="fa fa-check-circle fa-lg"></i> Berhasil Di Update.</font>');
          $('#modal-default').modal('hide');
          window.location = 'list_pesanan.php';   
        }else{
          alert('Data Gagal Di Update');
        }
       
      },

      error:function(jqXHR,textStatus,errorThrown)
      {
        alert('Data Gagal Di Rubah');
      }

    });
  }

</script>

</body>
</html>