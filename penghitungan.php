<?php include "header.php" ?>
    <div class="main-panel">
          <div class="col-lg-max col-md-12">
           <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Cluster Awal</h4>
              <p class="card-category">HEART FAILURE</p>
            </div>
              <?php
                include 'koneksidb.php';
                error_reporting(0);
                $query = mysqli_query($host, "SELECT * FROM tb_data ");
                // $qa = mysqli_query($host, "SELECT * FROM tb_clusterawal");
                //memanggil seluruh kolom pada tb_data dan kolom id_clusterawal pada tb_clusterawal
                $qu = mysqli_query($host, "SELECT td.*, tc.id_clusterawal FROM tb_clusterawal tc JOIN tb_data td ON td.id_data=tc.id_data");
              ?>
            <div class="card-body table-responsive">
            
              <div class="tab-content">
                <?php 
            $iterasi = 1; //iterasi mulai dari 1
            $bool = true;//tipe data bolean, nilai true berfungsi untuk melakukan looping iterasi
            $lit = []; //menyimpan data iterasi
            $update_cluster = []; ////menyimpan data cluster
            $cNumber = []; //menyimpan hasil iterasi
            $hasil = []; //menyimpan hasil akhir iterasi
            while ($bool) {
              ?> 
              <!-- misal iterasi 1 maka id tabnya 1 -->
              <div class="tab-pane fade show <?= ($iterasi == 1 ? 'active' : '') ?>" id="tab<?= $iterasi ?>" role="tabpanel" aria-labelledby="home-tab">
              <h1>Iterasi <?= $iterasi ?></h1> 
              <table class="table table-striped">
                <thead class="text-warning">
                  <th>No.Data</th>
                  <th>Age</th>
                  <th>Anaemia</th>
                  <th>Creatinine Phosphokinase</th>
                  <th>Diabetes</th>
                  <th>Ejection Fraction</th>
                  <th>High Blood Pressure</th>
                  <th>Platelets</th>
                  <th>Serum Creatinine</th>
                  <th>Serum Sodium</th>
                  <th>Sex</th>
                  <th>Smoking</th>
                  <th>Time</th>
                </thead>
                <tbody>
                <?php
                //menampilkan cluster awal pada iterasi 1
                if($iterasi == 1){ //jika iterasi 1
                while($data = mysqli_fetch_array($qu, MYSQLI_ASSOC)){ //data pada tb_clusterawal akan muncul
              ?>
                <tr>
                  <td><?php echo $data["id_data"]; ?></td>
                  <td><?php echo $data["age"];?></td>
                  <td><?php echo $data["anaemia"];?></td>
                  <td><?php echo $data["creatinine_phosphokinase"];?></td>
                  <td><?php echo $data["diabetes"];?></td>
                  <td><?php echo $data["ejection_fraction"];?></td>
                  <td><?php echo $data["high_blood_pressure"];?></td>
                  <td><?php echo $data["platelets"];?></td>
                  <td><?php echo $data["serum_creatinine"];?></td>
                  <td><?php echo $data["serum_sodium"];?></td>
                  <td><?php echo $data["sex"];?></td>
                  <td><?php echo $data["smoking"];?></td>
                  <td><?php echo $data["time"];?></td>
                </tr>
              <?php }}else{
                // echo "<pre>"; 
                //berfungsi untuk mengurutkan hasil iterasi dari yang paling kecil
                usort($update_cluster, function($a, $b) {  
                    return $a['cluster'] <=> $b['cluster'];
                });
                
                // print_r($update_cluster);
                $qa = mysqli_query($host, "SELECT * FROM tb_clusterawal"); //menampilkan seluruh data pada tb_clusterawal
                $cc = []; //menampung update cluster
                
                while($dupdate = mysqli_fetch_array($qa, MYSQLI_ASSOC)){
                  $rd = search($update_cluster, 'cluster', $dupdate['id_clusterawal']); //dilakukan match untuk mencari hasil perhitungan iterasi
                  $clusterID = []; //menampung id cluster
                  // print_r($rd);
                  //looping match karena data tidak hanya ada 1
                  for ($i=0; $i < count($rd); $i++) {
                    if($rd[$i]['iterasi'] == $iterasi - 1){
                      $clusterID[] = $rd[$i]['id_data']; //memanggil array rd dengan index ke 0 sesuai id_data               
                    }
                  }
                  $res = queryFromArray($clusterID); //update cluster untuk iterasi 2 dan selanjutnya
                  $cc[] = $res; //menyimpan update cluster
                ?>
                <tr>
                  <td><?php echo $dupdate["id_data"]; ?></td>
                  <td><?php echo $res["age"];?></td>
                  <td><?php echo $res["anaemia"];?></td>
                  <td><?php echo $res["creatinine_phosphokinase"];?></td>
                  <td><?php echo $res["diabetes"];?></td>
                  <td><?php echo $res["ejection_fraction"];?></td>
                  <td><?php echo $res["high_blood_pressure"];?></td>
                  <td><?php echo $res["platelets"];?></td>
                  <td><?php echo $res["serum_creatinine"];?></td>
                  <td><?php echo $res["serum_sodium"];?></td>
                  <td><?php echo $res["sex"];?></td>
                  <td><?php echo $res["smoking"];?></td>
                  <td><?php echo $res["time"];?></td>
                </tr>
              <?php }
            
            } ?>
                </tbody>
              </table>
              <table class="table table-hover">
                <thead class="text-warning">
                <th>No</th>
                <th>Id Data</th>
                  <?php 
                    $id = 1; //id mulai dengan angka 1
                    $qa = mysqli_query($host, "SELECT * FROM tb_clusterawal"); //memanggil semua data pada tb_clusterawal
                    while ($qd = mysqli_fetch_array($qa, MYSQLI_ASSOC)) { //melakukan perulahan pada data
                  ?>
                  <th>C<?= $id ?></th>
                  <?php $id++;} ?>
                  <th>MIN</th>
                  <?php 
                  for ($i=0; $i < $iterasi; $i++) { //perulangan jika jumlah iterasi lebih dari 0 maka iterasi ++
                  ?>
                  <th>Hasil Iterasi <?= $i+1 ?></th>
                  <?php } ?>
                  <td>Status</td>
                </thead>
                <tbody>
              <?php
                $no = 1;
                // if($iterasi == 1){
                  $dataHasil = []; //menampung data sementara untuk nantinya di tampilkan pada hasil
                  $query = mysqli_query($host, "SELECT * FROM tb_data "); //memanggil seluruh data pada tb_data
                  $arrayCluster = []; //menampung data minimum/jarak terdekat
                  $status_cluster = []; //menampung data status cluster
                  
                while($data = mysqli_fetch_array($query, MYSQLI_ASSOC)){ //perulangan pada data tb_data
              ?>
                <tr>
                <td><?php echo $no ?></td>  
                  <td><?php echo $data["id_data"]; ?></td>
                <?php 
                // $n = 1;
                $qq = mysqli_query($host, "SELECT * FROM tb_clusterawal"); //menampilkan data clusterawal
                $min = []; //
                $index = 0;
                $noCluster = 0;
                while ($qr = mysqli_fetch_array($qq, MYSQLI_ASSOC)) { //perulangan 
                  //memanggil seluruh kolom berdasarkan id_data pada tb_data 
                    $d = mysqli_query($host, "SELECT td.* FROM tb_clusterawal tc JOIN tb_data td ON tc.id_data=td.id_data where td.id_data='$qr[id_data]'");
                    if($iterasi == 1){ //jika iterasi sama dengan 1
                    $dd = mysqli_fetch_array($d, MYSQLI_ASSOC);
                      $penghitungan = sqrt( pow(($data['age']-$dd['age']), 2) + pow(($data['anaemia']-$dd['anaemia']), 2) + pow(($data['creatinine_phosphokinase']-$dd['creatinine_phosphokinase']), 2) + pow(($data['diabetes']-$dd['diabetes']), 2) + pow(($data['ejection_fraction']-$dd['ejection_fraction']), 2) + pow(($data['high_blood_pressure']-$dd['high_blood_pressure']), 2) + pow(($data['platelets']-$dd['platelets']), 2) + pow(($data['serum_creatinine']-$dd['serum_creatinine']), 2) + pow(($data['serum_sodium']-$dd['serum_sodium']), 2) + pow(($data['sex']-$dd['sex']), 2) + pow(($data['smoking']-$dd['smoking']), 2) + pow(($data['time']-$dd['time']), 2));
                    }else{
                      //untuk perhitungan pada iterasi selanjutnya dikarenakan update cluster
                      $dd = $cc[$index]; //update cluster sesuai dengan id pada iterasi
                      $penghitungan = sqrt( pow(($data['age']-$dd['age']), 2) + pow(($data['anaemia']-$dd['anaemia']), 2) + pow(($data['creatinine_phosphokinase']-$dd['creatinine_phosphokinase']), 2) + pow(($data['diabetes']-$dd['diabetes']), 2) + pow(($data['ejection_fraction']-$dd['ejection_fraction']), 2) + pow(($data['high_blood_pressure']-$dd['high_blood_pressure']), 2) + pow(($data['platelets']-$dd['platelets']), 2) + pow(($data['serum_creatinine']-$dd['serum_creatinine']), 2) + pow(($data['serum_sodium']-$dd['serum_sodium']), 2) + pow(($data['sex']-$dd['sex']), 2) + pow(($data['smoking']-$dd['smoking']), 2) + pow(($data['time']-$dd['time']), 2));
                    }
                    $min[] = nilai($penghitungan); //hasil perhitungan dimasukkan pada variabel min
                    
                    
                ?>
                  <td><?php echo nilai($penghitungan)?></td> 
                  <?php $index++;$hasil = $dataHasil;} //mencari hasil iterasi terakhir
                  
                  ?>
                  <!-- data perhitungan yg ada pada variabel min akan dihitung nilai terkecil/jarak terdekat -->
                    <td><?= min($min);?></td> 
                    <?php 
                    $arrayCluster[] = array_search(min($min), $min)+1; //fungsi match yakni menentukan nilai terkecil masuk pada cluster berapa
                    // MATCH(MIN())
                    $s = array_search(min($min), $min)+1; //dimasukkan ke variabel
                    $checkCluster = []; //menampung hasil cek clusternya
                  for ($z=0; $z < count($cNumber); $z++) { 
                    $checkCluster[] = $cNumber[$z][$no-1]; //cluster number baris ke 0 kolom 0
                    $noCluster = $cNumber[$z][$no-1]; //cluster number baris ke 0 kolom 0
                  ?>
                  <!-- cluster number baris ke 0 kolom ke 0 -->
                  <td><?= $cNumber[$z][$no-1]?></td>
                  <?php }
                  
                  if(count($cNumber) == $iterasi-1){ //jika 
                    //menampung nilai cluster setiap data
                    $checkCluster[] = $s; ?>
                  <td><?= $s ?></td>
                  <?php }
                  // echo "<pre>";
                  $array2 = checkSameValue($checkCluster) ? "1" : "0"; 
                  // print_r($checkCluster);
                  // print_r($array2);
                  // echo " | ";
                  if($array2 == '1'){
                    echo "<td>Selesai</td>";
                    $status_cluster[] = 1;
                  }else{
                    $status_cluster[] = 0;
                    echo "<td>Belum Selesai</td>";
                  }
                  ?>
                </tr>
              <?php 
              $dataHasil[] = ['cluster' => $cNumber[count($cNumber) - 1][$no-1], 'id_data' => $data["id_data"]];
              $update_cluster[] = ['id_data' => $data['id_data'], 'min' => min($min), 'cluster' => array_search(min($min), $min)+1, 'iterasi' => $iterasi];
              $no++;};
              $cNumber[] = $arrayCluster;
              if($iterasi!=1){
                // echo "<pre>";
                // print_r($status_cluster);
                if(in_array("0", $status_cluster)){
                  $bool= true;
                }else{
                  $bool = false;
                }
              }
              ?>
              </tbody>
            </table>
              </div>
              <?php 
              $hasil = $dataHasil;
              $iterasi++;} 
              ?>
              <div class="tab-pane fade show" id="hasil" role="tabpanel" aria-labelledby="home-tab">
                <?php 
                $qh = mysqli_query($host, "SELECT * FROM tb_clusterawal");
                $jumlahClusterHasil = mysqli_num_rows($qh);
                for ($j=1; $j <= $jumlahClusterHasil ; $j++) { 
                // echo "<pre>";
                // print_r($hasil);
                ?>
                Kelompok <?= $j ?>
                <table class="table table-striped">
                  <thead class="text-warning">
                    <th>No.Data</th>
                    <th>Age</th>
                    <th>Anaemia</th>
                    <th>Creatinine Phosphokinase</th>
                    <th>Diabetes</th>
                    <th>Ejection Fraction</th>
                    <th>High Blood Pressure</th>
                    <th>Platelets</th>
                    <th>Serum Creatinine</th>
                    <th>Serum Sodium</th>
                    <th>Sex</th>
                    <th>Smoking</th>
                    <th>Time</th>
                  </thead>
                  <tbody>
                    <?php 
                    for ($x=0; $x < count($hasil) ; $x++) { //menampilkan hasil sejumlah data yang ada
                      if($hasil[$x]['cluster'] == $j){ //jika data hasil index ke 0 dengan nilai cluster sama dengan nilai j/clusternya
                        $id_data = $hasil[$x]['id_data']; //maka data akan di tampung
                        $qhasil = mysqli_query($host, "SELECT * FROM tb_data where id_data='$id_data'");
                        $tampilHasil = mysqli_fetch_array($qhasil);
                    ?>
                      <tr>
                      <td><?php echo $tampilHasil["id_data"]; ?></td>
                      <td><?php echo $tampilHasil["age"];?></td>
                      <td><?php echo $tampilHasil["anaemia"];?></td>
                      <td><?php echo $tampilHasil["creatinine_phosphokinase"];?></td>
                      <td><?php echo $tampilHasil["diabetes"];?></td>
                      <td><?php echo $tampilHasil["ejection_fraction"];?></td>
                      <td><?php echo $tampilHasil["high_blood_pressure"];?></td>
                      <td><?php echo $tampilHasil["platelets"];?></td>
                      <td><?php echo $tampilHasil["serum_creatinine"];?></td>
                      <td><?php echo $tampilHasil["serum_sodium"];?></td>
                      <td><?php echo $tampilHasil["sex"];?></td>
                      <td><?php echo $tampilHasil["smoking"];?></td>
                      <td><?php echo $tampilHasil["time"];?></td>
                    </tr>
                    <?php }} ?>
                  </tbody>
                </table>
                <?php } ?>
              </div>
              <div class="nav-tabs-navigation" style="position:fixed!important;bottom:0!important;">
              <div class="nav-tabs-wrapper">
                <span class="nav-tabs-title">Halaman:</span>
                <ul class="nav nav-tabs" data-tabs="tabs">
                <?php 
                $bool1 = true;
                $iterasi1 = 1;
                for ($i=1; $i < $iterasi; $i++) { 
                  ?>
                  <li class="nav-item" style="background:#ff9800!important">
                    <a class="nav-link <?= ($i == 0 ? 'active' : '') ?>" href="#tab<?= $i ?>" data-toggle="tab">
                      Iterasi <?= $i ?>
                      <div class="ripple-container"></div>
                    </a>
                  </li>
                  <?php } ?>
                  <li class="nav-item" style="background:#ff9800!important">
                    <a class="nav-link" href="#hasil" data-toggle="tab">
                      Hasil
                      <div class="ripple-container"></div>
                    </a>
                  </li>
                </ul>
              </div>
              </div>
            </div>
            <!-- Modal -->
            
            </div>
           </div>
          </div>
    </div>
<?php include "footer.php"?>