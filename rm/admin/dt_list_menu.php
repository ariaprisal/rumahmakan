<?php
include 'fungsi.php';

$db = query("SELECT * FROM tb_menu");

if( isset($_POST["submit"]) ){

    //cek data berhasil di tambhakan
  if( tambah($_POST) > 0 ) {
    echo "
        <script>
          alert('data berhasil di tambahkan!!');
          document.location.href = 'list_menu2.php';
        </script>";
  } else{
  echo "
        <script>
          alert('data gagal di tambahkan!!');
          document.location.href = 'list_menu2.php';
        </script>";
  }
}

?>

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
            <a href="#" id="<?php echo $row['id_menu'];?>" class="btn btn-sm btn-default open_modal_detail" title="Search"><i class="fa fa-search"></i></a>
            &nbsp;&nbsp;
            <a href="#" id="<?php echo $row['id_menu'];?>" class="btn btn-sm btn-info open_modal" title="Edit"><i class="fa fa-edit"></i></a>
            &nbsp;&nbsp;
            <a href="#" onclick="confirm_delete('<?php echo "menu_hapus.php?id_menu"."=".$row['id_menu'];?>')" class="btn btn-sm btn-danger" title="Hapus"><i class="fa fa-trash"></i></a>
          </td>
      </tr>

    <?php $i++; ?>
    <?php endforeach; ?>

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