<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.ico">

  <title>Daftar Makanan</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />


</head>

<body>

  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="profile.php" class="logo">Krusty <span class="lite">Crab</span></a>
      <!--logo end-->

      <div class="nav search-row" id="top_menu">
        
      </div>

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- task notificatoin start -->
          <!-- user login dropdown start-->
          <li class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/<?= $_SESSION['foto']?>" height="40" width="40">
                            </span>
                            <span class="username"><?= $_SESSION['username']?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="profile.php"><i class="icon_profile"></i> My Profile</a>
              </li>
              <li>
                <a href="index.php"><i class="icon_key_alt"></i> Log Out</a>
              </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="profile.php">
                          <i class="icon_house_alt"></i>
                          <span>Profil</span>
                      </a>
          </li>
          <li>
            <a class="" href="form_validation.php">
                          <i class="icon_documents_alt"></i>
                          <span>Form</span>
                      </a>
          </li>
          <li>
            <a class="" href="basic_table.php">
                          <i class="icon_table"></i>
                          <span>Daftar Makanan</span>
                      </a>
          </li>
          <li>
          <a class="" href="person.php">
                          <i class="icon_table"></i>
                          <span>User</span>
                      </a>
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
        <!-- sidebar menu end-->
      </div>
    </aside>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-table"></i> DAFTAR MAKANAN</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="profile.php">Beranda</a></li>
              <li><i class="fa fa-th-list"></i>Daftar Makanan</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Daftar Makanan
              </header>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th><i class="icon_ol"></i> No.</th>
                      <th><i class="icon_tags_alt"></i> Nama Makanan</th>
                      <th><i class="icon_currency"></i> Harga</th>
                      <th><i class="icon_star_alt"></i> Deskripsi</th>
                      <th><i class="icon_image"></i> Gambar</th>
                      <th><i class="icon_cogs"></i> Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php include 'koneksi.php';
                        $proses=$mysqli->query("SELECT * from t_makanan");
                        $i=1;
                        ?>
                        <?php while ($data=$proses->fetch_object()) {?>
                    <tr>
                      <td><?php echo $i++?></td>
                      <td><?php echo $data->m_namamakanan?></td>
                      <td><?php echo "Rp".number_format($data->m_harga)?></td>
                      <td><?php echo $data->m_descmakanan?></td>
                      <td>
                        <img alt="" src="../image/<?php echo $data->m_gambar?>" height="40" width="40">
                      </td>
                      <td>
                        <div class="btn-group">
                          <a class="btn btn-primary" href="form_update.php? id=<?php echo $data->m_id ?>"><i class="icon_documents_alt"></i></a>
                          <a class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data ini ?')" href="delete.php?id=<?php echo $data->m_id?>"><i class="icon_close_alt2"></i></a>
                        </div>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </section>
          </div>
        </div>
        <!-- page end-->
      </section>
    </section>
    
  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nicescroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>


</body>

</html>
