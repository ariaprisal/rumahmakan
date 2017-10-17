    <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo '../assets/foto/'.$_SESSION['foto'] ;?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['username'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">

          <a href="home.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>

        <li>
          <a href="list_menu2.php">
            <i class="fa fa-book"></i>
            <span>Menu Makanan</span>
          </a>
         </li>


       
        <li>
          <a href="list_order.php">
            <i class="fa fa-calculator"></i>
            <span>Order</span>
          </a>
         </li>
         
          <li>
          <a href="list_pesanan.php">
            <i class="fa fa-cutlery"></i>
            <span>Pesanan</span>
          </a>
         </li>

         <li>
          <a href="list_meja.php">
            <i class="fa fa-pause"></i>
            <span>Meja</span>
          </a>
         </li>

         <li>
          <a href="list_kategori.php">
            <i class="fa  fa-cube"></i>
            <span>Kategori</span>
          </a>
         </li>

         </ul>

    </section>
    </aside>