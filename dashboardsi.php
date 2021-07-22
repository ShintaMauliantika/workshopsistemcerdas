<?php include "header.php" ?>
    <div class="main-panel">
          <div class="col-lg-max col-md-12">
           <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">HEART FAILURE</h4>
            </div>
              <?php
                include 'koneksidb.php';
                $query = mysqli_query($host, "SELECT * FROM tb_data ORDER BY id_data");
              ?>
            <div class="card-body table-responsive">
            <table class="table table-hover">
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
              <?php
                while($data = mysqli_fetch_array($query, MYSQLI_ASSOC)){
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
              <?php } ?>
            </table>
            </div>
           </div>
          </div>
    </div>
<?php include "footer.php"?>