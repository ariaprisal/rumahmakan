<?php

include "fungsi_kategori.php";

$id_kategori	= $_GET["id_kategori"];

$querymenu = mysqli_query($koneksi, "SELECT * FROM tb_kategori WHERE id_kategori='$id_kategori'");
if($querymenu == false){
	die ("Terjadi Kesalahan : ". mysqli_error($koneksi));
}
while($kategori = mysqli_fetch_array($querymenu)){

?>
	
<!-- Modal Popup Pemilih -->
<!-- <div class="modal fade" id="modal_edit_menu"> -->
		<div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail kategori</h4>
              </div>
            <div class="modal-body">
            <form action="kategori_update.php" class="form-horizontal" method="post">
                <input type="hidden" name="id_kategori" value="<?php echo $kategori['id_kategori'];?>">
              <div class="box-body">
                <div class="form-group">
                    <label class="control-label col-md-3">Nama Kategori</label>
                    <div class="col-md-9">
                        <input name="nama_kategori" id="nama_kategori" value="<?php echo $kategori["nama_kategori"]; ?>" placeholder="Nama" class="form-control" type="text" readonly="">
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Jenis</label>
                    <div class="col-md-9">
                        <input name="jenis" id="jenis" value="<?php echo $kategori["jenis"]; ?>" placeholder="Jenis" class="form-control" type="text" readonly="">
                        <span class="help-block"></span>
                    </div>
                </div>

              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
<!--     </div> -->
<!--  -->
			
			
<?php
			}

?>