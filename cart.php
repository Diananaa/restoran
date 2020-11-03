<?php
include "admin/koneksi.php";

session_start();
$date = date('Y-m-d');
$dp_id=0;

?>

<!DOCTYPE html>
<html>
<title>Restoran Krusty Crab</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="shortcut icon" href="admin/img/favicon.ico">

<script src="https://use.fontawesome.com/c560c025cf.js"></script>
<body>

<div class="container">
   <div class="card shopping-cart">
            <div class="card-header bg-dark text-light">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                Keranjang pesanan
                <a href="../RESTORAN/#menu" class="btn btn-outline-info btn-sm pull-right">Tambah makanan</a>
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                    <!-- PRODUCT -->
                    <form action="pesanFinal.php" method="post"> 

                    <?php 
                        $proses=$mysqli->query("SELECT * from t_pesan LEFT JOIN t_detailpesan ON t_pesan.dp_id=t_detailpesan.dp_id 
                        LEFT JOIN t_detailmakanan ON t_pesan.dm_id=t_detailmakanan.dm_id LEFT JOIN t_makanan ON t_detailmakanan.m_id=t_makanan.m_id WHERE u_Username='".$_SESSION['id']."' and dp_Tanggal='$date'");
                        
                        if ($proses->num_rows<1){
                            echo "Keranjang Anda kosong.";
                        }
                        while ($data=$proses->fetch_object()) {
                         $dp_id= $data->dp_id;
                            ?>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-2 text-center">
                                <img class="img-responsive" src="admin/img/makanan/<?php echo $data->m_gambar?>" alt="prewiew" width="120" height="80">
                        </div>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                            <h4 class="product-name"><strong><?php echo $data->m_namamakanan?> 	</strong></h4>
                            <h4>
                                <small><?php echo $data->m_descmakanan?> 	</small>
                            </h4>
                            <div class="">
                                <textarea class="form-control" name="catatan[]" placeholder="Catatan" id="exampleFormControlTextarea1" rows="2"><?= $data->p_DescPesanan?></textarea>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                            <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                <h6><strong><?php echo "Rp".number_format($data->m_harga)?> <span class="text-muted">x</span></strong></h6>
                            </div>
                            <div class="col-12 col-sm-4 col-md-4">
                                <div class="quantity">
                                    <input type="number" step="1" max="99" min="1" value="<?php echo $data->p_banyak?>" title="Qty" class="qty" name="jmlh[]" size="4">
                                    <input type="hidden" value="<?php echo $data->p_id?>" name="p_id[]">
                                    <input type="hidden" value="<?php echo $data->m_harga?>" name="harga[]">
                                    <input type="hidden" value="<?php echo $data->dp_id?>" name="dp_id">

                                </div>
                            </div>
                            
                            <div class="col-2 col-sm-2 col-md-2 text-right">
                                <button type="button" onclick="location.href='aksi_deleteOrder.php?dp_id=<?=$dp_id?>&&p_id=<?=$data->p_id?>'" class="btn btn-outline-danger btn-xs">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php } ?>
                    <!-- END PRODUCT -->
            </div>
            <div class="card-footer">
            <div class="coupon col-md-5 col-sm-5 no-padding-left pull-left">
                    <div class="row">
                        <div class="col-6">
                        <?php $query=mysqli_query($mysqli,"SELECT * from t_detailpesan WHERE dp_id='$dp_id'");
                        if ($query){
                            $ambil=mysqli_fetch_array($query);
                        }
                    ?>
                            <input type="number" class="form-control" placeholder="diskon (%)" value="<?= $ambil['dp_diskon']?>"  name="diskon">
                        </div>
                    </div>
                </div>
                <div class="pull-right" style="margin: 10px">
                    <button type="submit" class="btn btn-success pull-right">Pesan</button>
                    <div class="pull-right" style="margin: 5px">
                        Total pembayaran: <b>Rp<?= number_format($ambil['dp_totalbayar']) ?>,-</b>
                    </div>
                </div>
            </div>
        </div>
        </form>

</div>
</body>
</html>
