<?php

include "../koneksi.php";

$id_menu	= $_GET["id_menu"];

$querymenu = mysqli_query($koneksi, "SELECT * FROM tb_menu WHERE id_menu='$id_menu'");
if($querymenu == false){
	die ("Terjadi Kesalahan : ". mysqli_error($koneksi));
}
while($menu = mysqli_fetch_array($querymenu)){

?>

<!-- Modal Popup Pemilih -->
<!-- <div class="modal fade" id="modal_edit_menu"> -->
		<div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-edit"></i>&nbsp;Edit Menu</h4>
              </div>
            <div class="modal-body">
            <form action="menu_update.php" class="form-horizontal" method="post">
            	<input type="hidden" name="id_menu" value="<?php echo $menu['id_menu'];?>">
              <div class="box-body">

                		<div class="form-group">
                            <label class="control-label col-md-3">Nama Menu</label>
                            <div class="col-md-9">
                                <input name="nama_makanan" id="nama_makanan" placeholder="Nama Menu" value="<?php echo $menu["nama_makanan"]; ?>" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>

                		<div class="form-group">
                            <label class="control-label col-md-3">Harga</label>
                            <div class="col-md-9">
                                <input name="harga" id="harga" value="<?php echo $menu["harga"]; ?>" placeholder="Harga" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>

                		<div class="form-group">
                            <label class="control-label col-md-3">Keterangan</label>
                            <div class="col-md-9">
                                <input name="keterangan" id="keterangan" value="<?php echo $menu["keterangan"]; ?>" placeholder="Keterangan" class="form-control" type="text" required="">
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
<!--     </div> -->
<!--  -->
			
			
<?php
			}

?>