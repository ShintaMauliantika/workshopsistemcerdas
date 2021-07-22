<?php 
include "koneksidb.php";
$g = $_GET;
if($g['dataId']){
    $id = $g['dataId'];
    $d = mysqli_query($host, "SELECT * FROM tb_data where id_data='$id'");
    $data = mysqli_fetch_array($d, MYSQLI_ASSOC);
    echo json_encode($data);
}else if($g['id_data']){
    $cekDb = mysqli_query($host, "SELECT * FROM tb_clusterawal where id_data='$id_data'");
    return mysqli_num_rows($cekDb);
}
?>