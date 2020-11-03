<?php
session_start();
?>
<!DOCTYPE html>
<html>
<title>Restoran Krusty Crab</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body, html {height: 100%}
body,h1,h2,h3,h4,h5,h6 {font-family: "Amatic SC", sans-serif}
.menu {display: none}
.bgimg {
  background-repeat: no-repeat;
  background-size: cover;
  background-image: url("http://localhost/RESTORAN/image/shawn-ang-nmpW_WwwVSc-unsplash.jpg");
  min-height: 90%;
}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top w3-hide-small">
  <div class="w3-bar w3-xlarge w3-black w3-opacity w3-hover-opacity-off" id="myNavbar">
    <a href="#" class="w3-bar-item w3-button">BERANDA</a>
    <a href="#menu" class="w3-bar-item w3-button">MENU</a>
    <a href="#about" class="w3-bar-item w3-button">TENTANG KAMI</a>
    <a href="#myMap" class="w3-bar-item w3-button">KONTAK</a>
    <?php 
      if(isset($_SESSION["username"])){
        ?>
      <a href="#" class="w3-bar-item w3-button">Hai, <?= $_SESSION["username"]?></a>
      <a href="http://localhost/RESTORAN/cart.php" class="w3-bar-item w3-button"><i class="fa fa-shopping-cart"></i><sup>0</sup></a>
      <a href="http://localhost/RESTORAN/loginuser.php" class="w3-bar-item w3-button w3-right">Logout</a>
      <?php }else{ ?>
        <a href="http://localhost/RESTORAN/loginuser.php" class="w3-bar-item w3-button w3-right">Login</a>
      <?php } ?>

  </div>
</div>
  
<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min"  id="home">
  <div class="w3-display-bottomleft w3-padding">
    <span class="w3-tag w3-xlarge">Buka dari 10.00-21.00 WIB</span>
  </div>
  <div class="w3-display-middle w3-center">
    <span class="w3-text-black w3-hide-small" style="font-size:100px">RESTORAN<br>KRUSTY CRAB</span>
    <p><a href="#menu" class="w3-button w3-xxlarge w3-black">Menunya apa aja, ya???</a></p>
  </div>
</header>

<!-- Menu Container -->
<div class="w3-container w3-black w3-padding-64 w3-xxlarge" id="menu">
  <div class="w3-content">
  
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">MENU</h1>
    <div class="w3-row w3-center w3-border w3-border-dark-grey">
      <a href="javascript:void(0)" onclick="openMenu(event, 'Pizza');" id="myLink">
        <div class="w3-col tablink w3-padding-large w3-hover-red">Makanan</div>
      </a>
    </div>
    <?php include 'admin/koneksi.php';
      $proses=$mysqli->query("SELECT * from t_makanan");
      $i=1;
      ?>
      <?php while ($data=$proses->fetch_object()) {?>
        <form action="aksi_tambahMakanan.php?id=<?=$_SESSION["id"]?>" method="post"> 

    <div id="Pizza" class="w3-container menu w3-padding-32 w3-white">
      <h1><b><?php echo $data->m_namamakanan?></b><img src="admin/img/makanan/<?php echo $data->m_gambar?>" alt="<?php echo $data->m_namamakanan?>" width="100" height="100">
 <span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo "Rp".number_format($data->m_harga)?>,-</span></h1>
      <p class="w3-text-grey"><?php echo $data->m_descmakanan?> 	 
      <span class="w3-right">
      <input type="number" step="1" max="99" min="1" value="1" name="jmlh" size="4">
      <button type="submit" class="btn btn-primary" name="submit" value="<?php echo $data->m_id?>">Tambah</button>
      </span>
    </form>
		</p>
		     <hr>
    </div>
    <?php } ?>
  </div>
</div>

<!-- About Container -->
<div class="w3-container w3-padding-64 w3-red w3-grayscale w3-xlarge" id="about">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Tentang Kami</h1>
    <p>Restoran Krusty Crab didirikan oleh bla bla bla.</p>
    <p>Tempat kami sangat instagramamble.</p>
    <h1><b>Jam Buka</b></h1>
    
    <div class="w3-row">
      <div class="w3-col s6">
        <p>Minggu Tutup</p>
        <p>Senin-Kamis 10.00 - 21.00 WIB</p>
      </div>
      <div class="w3-col s6">
        <p>Jum'at 13:00 - 21:00 WIB</p>
        <p>Sabtu 10:00 - 23:00 WIB</p>
      </div>
    </div>
	<h1><b>Alamat</b></h1>
	<div class="w3-col s6">
        <p>Jl. Bla bla</p>
      </div>
  </div>
</div>

<!-- Contact -->
<div class="w3-container w3-padding-64 w3-blue-grey w3-grayscale-min w3-xlarge">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Kontak</h1>
    <p>Hubungi kami di 08xxxxx</p>
    <p><span class="w3-tag">FYI!</span> Kami melayani full-service untuk berbagai kegiatan, besar atau kecil. Kami memahami kebutuhan Anda dan rasakan kenikmatan dari 2 sisi, keindahannya dan kenikmatan rasa.</p>
    <p class="w3-xxlarge"><strong>Booking</strong> meja, sekedar bertanya atau ada keluhan pelanggan, hubungi nomor diatas. <br>Terima kasih. </p>
  </div>
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-48 w3-xxlarge">
  <p>Powered by <a href="" title="YH" target="_blank" class="w3-hover-text-green">yh</a></p>
</footer>

<!-- modals -->

<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Anda perlu login untuk melakukan pemesanan!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Lanjutkan login</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-red";
}
document.getElementById("myLink").click();
</script>

</body>
</html>
