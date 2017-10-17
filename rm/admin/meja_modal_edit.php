<?php

include "fungsi_meja.php";

$id_meja = $_GET["id_meja"];

$querymenu = mysqli_query($koneksi, "SELECT * FROM tb_meja WHERE id_meja='$id_meja'");
if($querymenu == false){
	die ("Terjadi Kesalahan : ". mysqli_error($koneksi));
}
while($meja = mysqli_fetch_array($querymenu)){
?>

<!-- Modal Popup Pemilih -->
<!-- <div class="modal fade" id="modal_edit_menu"> -->
		<div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-edit"></i>&nbsp;Edit Meja</h4>
              </div>
            <div class="modal-body">
            <form action="meja_update.php" class="form-horizontal" method="post">
            	<input type="hidden" name="id_meja" value="<?php echo $meja['id_meja'];?>">
              <div class="box-body">

                		<div class="form-group">
                            <label class="control-label col-md-3">No Meja</label>
                            <div class="col-md-9">
                                <input name="no_meja" id="no_meja" value="<?php echo $meja["no_meja"]; ?>" placeholder="No Meja" class="form-control" type="text" required="">
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