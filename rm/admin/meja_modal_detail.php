<?php

include "fungsi_meja.php";

$id_meja	= $_GET["id_meja"];

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
                <h4 class="modal-title">Detail meja</h4>
              </div>
            <div class="modal-body">
            <form action="order_update.php" class="form-horizontal" method="post">
                <input type="hidden" name="id_order" value="<?php echo $order['id_order'];?>">
              <div class="box-body">
                <div class="form-group">
                    <label class="control-label col-md-3">No Meja</label>
                    <div class="col-md-9">
                        <input name="no_meja" id="no_meja" value="<?php echo $meja["no_meja"]; ?>" placeholder="No Meja" class="form-control" type="text" readonly="">
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