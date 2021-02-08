<!DOCTYPE html>
<html>
  
<body>
    <div class="container-fluid">

        <!-- <h3> Data</h3> -->
        <br>
        <div class="panel panel-default" style="width: 50%;">
            <div class="panel-heading">
                <div class="row" style="padding:'1px';">
                    <div class="col-md-2">
                        <h3 class="panel-title" >Form Tambah </h3>
                        <!-- <a href="<?= site_url("CtrlBisnis");?>"><button class="btn btn-sm btn-primary" style="width:100%;">Kembali</button></a> -->
                    </div>
                    <div class="col-md-10">
                        <!-- <a href="#"><button class="btn btn-sm btn-primary" style="width:100%;">Tambah data</button></a> -->
                    </div>
                </div>
            </div>
            
            <div class="panel-body">
                
                <?php if(validation_errors()){?>
                <div class="alert alert-danger">
                    <strong>Gagal!</strong> <?php echo validation_errors(); ?>
                </div>
                <?php }else{ ?>
                    <div class="container">
                    <p style="color: red;">form field bertanda (*) wajib diisi.</p>
                    <p style="color: red;">kode bisnis wajib alpha numerik tanpa spasi.*</p>
                    <p style="color: red;">kode nomor wajib numerik tanpa spasi.*</p>
                    </div>
                <?php }?>
               
                <?php echo form_open('CtrlBisnis/ajax_add'); ?>
                <form id="formMhs" method="POST" class="form-horizontal">
                <div class="form-group">
                    <label for="kode_bisnis" class="col-sm-2 control-label">Kode Bisnis <span style="color: red;">*</span></label>
                    <div class="col-sm-10">
                    <input type="text" name="kode_bisnis" id="kode_bisnis" value="<?php if(empty($kode_bisnis)){$kode_bisnis='';}else{ echo $kode_bisnis;}  ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">&nbsp;</div>
                </div>

                <div class="form-group">
                    <label for="kode_nomor" class="col-sm-2 control-label">Kode Nomor <span style="color: red;">*</span></label>
                    <div class="col-sm-10">
                    <input type="text" name="kode_nomor" id="kode_nomor" value="<?php if(empty($kode_nomor)){$kode_nomor='';}else{ echo $kode_nomor;}  ?>" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">&nbsp;</div>
                </div>

                <div class="form-group">
                    <label for="nama_bisnis" class="col-sm-2 control-label">Nama Bisnis <span style="color: red;">*</span></label>
                    <div class="col-sm-10">
                    <input type="text" name="nama_bisnis" id="nama_bisnis" value="<?php if(empty($nama_bisnis)){$nama_bisnis='';}else{ echo $nama_bisnis;}  ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">&nbsp;</div>
                </div>

                <div class="form-group">
                    <label for="nama_bisnis" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                    <select name="status" class="form-control">
                        <option value="0">Tidak Aktif</option>
                        <option value="1">Aktif</option>
                    </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">&nbsp;</div>
                </div>
                
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" name="simpan" id="simpan" value="Simpan" class="btn btn-sm btn-success">
                        <a href="<?= site_url("CtrlBisnis");?>">
                        <input type="button" name="kembali" id="simpan" value="Kembali" class="btn btn-sm btn-primary">
                        </a>
                    </div>
                </div>

                </form>

                <div id="status"></div>
            </div>
        </div>
        
    </div>

</div>
</body>



</html>