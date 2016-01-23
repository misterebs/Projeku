<?php
session_start();
 
$logged_in = false;
 
//jika session username belum dibuat, atau session username kosong
if (isset($_SESSION['username']) || !empty($_SESSION['username'])) {
    $logged_in = true;
}
 
include_once('config.php');
include_once('partial/head.php');
include_once('partial/header.php');
include_once('partial/main.php');
?>

<div class="col-sm-9">
  
  <!-- column 2 --> 
       <h3><i class="glyphicon glyphicon-folder-open"></i> Isi Data Pribadi</h3>  
            
       <hr>

  <div class="row">
    <div class="col-md-9">
        <div class="content">
                    
       
            <?php
            $message = $_GET['msg'];
 
            if ($message == 'success') {
            ?>
            <div class="info">Success</div>
            <?php } else if ($message == 'failed') {?>
            <div class="error">Error</div>
            <?php } ?>

            <form class="form-horizontal">
            <div class="form-group">
            <label class="control-label col-xs-3" for="inputEmail">Email:</label>
            <div class="col-xs-9">
                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="inputPassword">Kata Sandi:</label>
            <div class="col-xs-9">
                <input type="password" class="form-control" id="inputPassword" placeholder="Masukan Kata Sandi">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="Nama">Nama:</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" id="Nama" placeholder="Nama Anda">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="telp">No. Telp:</label>
            <div class="col-xs-9">
                <input type="tel" class="form-control" id="telp" placeholder="Nomor Telepon / Handphone">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3">Tanggal Lahir</label>
            <div class="col-xs-3">
                <select class="form-control">
                    <option>Tanggal</option>
                </select>
            </div>
            <div class="col-xs-3">
                <select class="form-control">
                    <option>Bulan</option>
                </select>
            </div>
            <div class="col-xs-3">
                <select class="form-control">
                    <option>Tahun</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="Alamat">Alamat:</label>
            <div class="col-xs-9">
                <textarea rows="3" class="form-control" id="Alamat" placeholder="Masukan Alamat Lengkap"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="KodePos">Kode Pos:</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" id="KodePos" placeholder="Kode Pos">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3">Jenis Kelamin:</label>
            <div class="col-xs-2">
                <label class="radio-inline">
                    <input type="radio" name="gender" value="Laki-laki"> Laki-laki
                </label>
            </div>
            <div class="col-xs-2">
                <label class="radio-inline">
                    <input type="radio" name="gender" value="Perempuan"> Perempuan
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-3 col-xs-9">
                <label class="checkbox-inline">
                    <input type="checkbox" value="Setuju">  Saya Setuju dengan <a href="#">Kebijakan dan Ketentuan</a> yang berlaku.
                </label>
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="col-xs-offset-3 col-xs-9">
                <input type="submit" class="btn btn-primary" value="Kirim">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
        </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>
 
        </div>
    </div>   
</div>
</body>
</html>