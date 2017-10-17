<?php 
include 'header.php';
include 'fungsi.php';

$db = query("SELECT * FROM tb_menu");

if( isset($_POST["submit"]) ){

    //cek data berhasil di tambhakan
  if( tambah($_POST) > 0 ) {
    echo "
        <script>
          alert('data berhasil di tambahkan!!');
          document.location.href = 'list_menu.php';
        </script>";
  } else{
  echo "
        <script>
          alert('data gagal di tambahkan!!');
          document.location.href = 'list_menu.php';
        </script>";
  }
}

?>

<div class="wrapper">
  <div class="content-wrapper">

      <section class="content-header">
        <h1>
          List Menu
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
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
                    <i class="fa fa-plus"></i>&nbsp;Add Menu</a>
                  </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="table" class="display" cellspacing="0" width="100%">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Menu</th>
                    <th>Keterangan</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach( $db as $row ): ?>
                  <tr>
                      <td><?= $i; ?></td>
                      <td><?= $row["nama_makanan"]; ?></td>
                      <td><?= $row["keterangan"]; ?></td>
                      <td>Rp.<?php echo number_format($row["harga"]); ?></td>
                      <td>
                        <a href="<?php echo $row['id_menu'];?>" class="btn btn-social-icon btn-bitbucket" title="Search"><i class="fa fa-search"></i></a>
                        |
                        <a href="<?php echo $row['id_menu'];?>" class="btn btn-social-icon btn-bitbucket" title="Edit"><i class="fa fa-edit"></i></a>
                        |
                        <a class="btn btn-social-icon btn-bitbucket" title="Hapus"><i class="fa fa-trash"></i></a>

                    
                      </td>
                  </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                  
                  </button>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama Menu</th>
                    <th>Keterangan</th>
                    <th>Harga</th>
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
                <h4 class="modal-title">Tambah Data</h4>
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
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>

<?php 
include "footer.php";
?>

<script src="../assets/datatables/js/jquery.dataTables.min.js"></script>
<script src="../assets/datatables/js/dataTables.bootstrap.min.js"></script>

<script>

  $(function(){

    $("#table").DataTable({

      url:'data_menu.php',
      dataType:'JSON',
      type:'GET',
    });

  });

</script>

<!--
tb_order

id_order
tanggal_order
nama_order
total_order
 -->

 <!-- tb_pesanan
id_pesanan
jumlah_pesanan
total_harga
  -->