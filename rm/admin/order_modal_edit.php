<?php

include "fungsi_order.php";

$id_order	= $_GET["id_order"];

$querymenu = mysqli_query($koneksi, "SELECT * FROM tb_order WHERE id_order='$id_order'");
if($querymenu == false){
	die ("Terjadi Kesalahan : ". mysqli_error($koneksi));
}
while($order = mysqli_fetch_array($querymenu)){
?>

<!-- Modal Popup Pemilih -->
<!-- <div class="modal fade" id="modal_edit_menu"> -->
		<div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-edit"></i>&nbsp;Edit Order</h4>
              </div>
            <div class="modal-body">
            <form action="order_update.php" class="form-horizontal" method="post">
            	<input type="hidden" name="id_order" value="<?php echo $order['id_order'];?>">
              <div class="box-body">

                		<div class="form-group">
                            <label class="control-label col-md-3">Tanggal</label>
                            <div class="col-md-9">
                                <input name="tanggal_order" id="tanggal_order" placeholder="Tanggal Order" value="<?php echo $order["tanggal_order"]; ?>" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>

                		<div class="form-group">
                            <label class="control-label col-md-3">Nama</label>
                            <div class="col-md-9">
                                <input name="nama_order" id="nama_order" value="<?php echo $order["nama_order"]; ?>" placeholder="Nama Order" class="form-control" type="text" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>

                		<div class="form-group">
                            <label class="control-label col-md-3">Harga</label>
                            <div class="col-md-9">
                                <input name="total_order" id="total_order" value="<?php echo $order["total_order"]; ?>" placeholder="Harga" class="form-control" type="text" required="">
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