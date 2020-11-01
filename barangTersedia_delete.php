<?php 
require 'backend/mc_detailpesan.php';

$dm_id = $_GET["dm_id"];


if(deletePesan($dm_id)>0){
    echo "
    <script>
        alert('data berhasil dihapus');
        document.location.href ='barangTersedia_index.php';
        </script>
   ";
}else{
    echo "data gagal dihapus";
}

?>