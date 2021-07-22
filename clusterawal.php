<?php include "header.php" ?>
    <div class="main-panel">
          <div class="col-lg-max col-md-12">
           <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Cluster Awal</h4>
              <p class="card-category">HEART FAILURE</p>
            </div>
              
              <form action="" method="post">
                <div class="container">
                </br>
                    <div class="form-group">
                        <label class="text-warning">Jumlah Cluster</label>
                        <input type="number" min="2" max="299" step="1" name="jumlah" class="form-control" placeholder="Masukkan Jumlah Cluster yang anda inginkan" value="" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="kirim" class="btn btn-warning" value="Kirim">
                    </div>
                </div>
              </form>
              <?php
                include 'koneksidb.php';
                $dd = $_POST;
                $jumlah = 0;
                // echo "ok";
                // print_r($_POST);
                if(isset($_POST['kirim'])){
                    $jumlah = $dd['jumlah'];
                    // echo "oksip";
                }
                $query = mysqli_query($host, "SELECT * FROM tb_data ORDER BY RAND() LIMIT $jumlah");
              ?>
            <div class="card-body table-responsive">
            <!-- Modal -->
            
            <table class="table table-hover">
                <thead class="text-warning">
                <th>Centroid</th>
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
              <?php
                    $no = 0;
                while($d = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                    $cek = mysqli_query($host, "SELECT * FROM tb_clusterawal");
                    // echo "ok";
                    if(mysqli_num_rows($cek) !=$jumlah){
                        if($no == 0){
                            // echo "im here";
                            $q = mysqli_query($host, "TRUNCATE TABLE tb_clusterawal");
                        }
                        $q = mysqli_query($host, "INSERT INTO tb_clusterawal(id_data) VALUES('$d[id_data]')");
                        $no++;
                    }else{

                    }
                  }
                  $queryD = mysqli_query($host, "SELECT * FROM tb_clusterawal tc JOIN tb_data tp ON tp.id_data=tc.id_data");
                  while($data = mysqli_fetch_array($queryD, MYSQLI_ASSOC)){
                      // echo "INSERT INTO tb_clusterawal(id_clusterawal, id_papers) VALUES('$data[id_papers]')";
              ?>
                <tr>
                  <td><?php echo $data["id_clusterawal"]; ?></td>  
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
                  <td><Button data-toggle="modal" data-target="#exampleModal<?= $data['id_data'] ?>" class="btn btn-warning" class="">Edit</Button></a></td>
                  <div class="modal fade" id="exampleModal<?= $data['id_data'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form action="" method="POST">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="text-warning">No.Data</label>
                                    <input type="text" name="id_data" id="data" class="form-control" placeholder="id_data" value="<?php echo $data['id_data']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                    <label class="text-warning">Id Cluster Awal</label>
                                    <input style="background:#fff!important" id="id_clusterawal" type="text" readonly  name="id_clusterawal" class="form-control" placeholder="id_clusterawal" value="<?php echo $data['id_clusterawal']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                    <label class="text-warning">Age</label>
                                    <input style="background:#fff!important" id="age" type="text" readonly  name="age" class="form-control" placeholder="age" value="<?php echo $data['age']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                    <label class="text-warning">Anaemia</label>
                                    <input style="background:#fff!important" id="anaemia" type="anaemia" readonly name="anaemia" class="form-control" placeholder="anaemia" value="<?php echo $data['anaemia']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                    <label class="text-warning">Creatinine Phosphokinase</label>
                                    <input style="background:#fff!important" type="text" id="creatinine_phosphokinase" readonly name="creatinine_phosphokinase" class="form-control" placeholder="creatinine_phosphokinase" value="<?php echo $data['creatinine_phosphokinase']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                    <label class="text-warning">Diabetes</label>
                                    <input style="background:#fff!important" type="text" id="diabetes" readonly name="diabetes" class="form-control" placeholder="diabetes" value="<?php echo $data['diabetes']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                    <label class="text-warning">Ejection Fraction</label>
                                    <textarea style="background:#fff!important" rows="2" type="text" id="ejection_fraction" readonly name="ejection_fraction" class="form-control" placeholder="ejection_fraction" ><?php echo $data['ejection_fraction']; ?> </textarea>
                                    </div>
                                    <div class="form-group">
                                    <label class="text-warning">High Blood Pressure</label>
                                    <textarea style="background:#fff!important" rows="2" type="text" id="high_blood_pressure" readonly name="high_blood_pressure" class="form-control" placeholder="high_blood_pressure" ><?php echo $data['high_blood_pressure']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                    <label class="text-warning">Platelets</label>
                                    <textarea style="background:#fff!important" rows="2" type="text" id="platelets" readonly name="platelets" class="form-control" placeholder="platelets" ><?php echo $data['platelets']; ?> </textarea>
                                    </div>
                                    <div class="form-group">
                                    <label class="text-warning">Serum Creatinine</label>
                                    <textarea style="background:#fff!important" rows="2" type="text" id="serum_creatinine" readonly name="serum_creatinine" class="form-control" placeholder="serum_creatinine" ><?php echo $data['serum_creatinine']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                    <label class="text-warning">Serum Sodium</label>
                                    <textarea style="background:#fff!important" rows="2" type="text" id="serum_sodium" readonly name="serum_sodium" class="form-control" placeholder="serum_sodium" ><?php echo $data['serum_sodium']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                    <label class="text-warning">Sex</label>
                                    <textarea style="background:#fff!important" rows="2" type="text" id="sex" readonly name="sex" class="form-control" placeholder="sex" ><?php echo $data['sex']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                    <label class="text-warning">Smoking</label>
                                    <textarea style="background:#fff!important" rows="2" type="text" id="smoking" readonly name="smoking" class="form-control" placeholder="smoking" ><?php echo $data['smoking']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                    <label class="text-warning">Time</label>
                                    <textarea style="background:#fff!important" rows="2" type="text" id="time" readonly name="time" class="form-control" placeholder="time" ><?php echo $data['time']; ?></textarea>
                                    </div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="simpan" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                            <?php 
                            if(isset($dd['simpan'])){
                                error_reporting(0);
                                $id_data = $dd['id_data'];
                                // $id_clusterawal = $dd['id_clusterawal'];
                                $id_clusterawal = $dd['id_clusterawal'];
                                // $cekDb = mysqli_query($host, "SELECT * FROM tb_clusterawal where id_papers='$id_papers'");
                                // if(mysqli_num_rows($cekDb) > 0){
                                //     echo "<script>alert('Data sudah ada terdapat didatabase')</script>";
                                // }else{
                                    $simpan = mysqli_query($host, "UPDATE tb_clusterawal SET id_data='$id_data' WHERE id_clusterawal='$id_clusterawal'");
                                    header("Refresh:0; url=clusterawal.php");} ?>
                            </div>
                        </div>
                    </div>
                </tr>
              <?php } ?>
            </table>
            </div>
           </div>
          </div>
    </div>
<?php include "footer.php"?>