<?php include "header.php" ?>
<div class="main-panel">
          <div class="col-lg-12 col-md-12">
           <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">EDIT CLUSTER AWAL</h4>
            </div>
            <?php 
            $query = mysqli_query($host, "SELECT * FROM tb_papers where id_papers='$_GET[id]'");
            $data = mysqli_fetch_array($query, MYSQLI_ASSOC);
            ?>
          <section class="content">
          <div class="card-body table-responsive">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                    <label class="text-warning">No.Papers</label>
                    <input type="text" name="id_papers" class="form-control" placeholder="id_papers" value="<?php echo $data['id_papers']; ?>" required>
                </div>
                <div class="form-group">
                  <label class="text-warning">Title</label>
                  <input style="background:#fff!important" type="text" readonly  name="title" class="form-control" placeholder="title" value="<?php echo $data['title']; ?>" required>
                </div>
                <div class="form-group">
                  <label class="text-warning">Keywords</label>
                  <input style="background:#fff!important" type="text" readonly name="keywords" class="form-control" placeholder="keywords" value="<?php echo $data['keywords']; ?>" required>
                </div>
                <div class="form-group">
                  <label class="text-warning">Topics</label>
                  <input style="background:#fff!important" type="text" readonly name="topics" class="form-control" placeholder="topics" value="<?php echo $data['topics']; ?>" required>
                </div>
                <div class="form-group">
                  <label class="text-warning">High-Level Keywords</label>
                  <input style="background:#fff!important" type="text" readonly name="high_level_keywords" class="form-control" placeholder="high_level_keywords" value="<?php echo $data['high_level_keywords']; ?>" required>
                </div>
                <div class="form-group">
                  <label class="text-warning">Abstract</label>
                  <textarea style="background:#fff!important" rows="10" type="text" readonly name="abstract" class="form-control" placeholder="abstract" ><?php echo $data['abstract']; ?>" required</textarea>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-warning" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Batal </button>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-warning" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan </button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </div>
    </section>
        </div>
          </div>
</div>
<?php include "footer.php"?>