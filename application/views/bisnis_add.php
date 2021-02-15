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

                <?php }elseif(!empty($err)){?>
                <div class="alert alert-danger">
                    <strong>Gagal!</strong> kode bisnis diawali alphabet atau diakhiri numerik tanpa spasi.
                </div>

                <?php }else{ ?>
                    <div class="container">
                    <p style="color: red;">form field bertanda (*) wajib diisi.</p>
                    <p style="color: red;">kode bisnis diawali alpha atau diakhiri numerik tanpa spasi.*</p>
                    <p style="color: red;">kode nomor wajib numerik tanpa spasi.*</p>
                    </div>
                <?php }?>
               
                <?php echo form_open($AddAjax); ?>
                <?php  ?>
                <form id="formMhs" method="POST" class="form-horizontal">
                <div class="form-group">
                    <label for="kode_bisnis" class="col-sm-2 control-label">Kode Bisnis <span style="color: red;">*</span></label>
                    <div class="col-sm-10">
                    <input type="text" name="kode_bisnis" maxlength="10" placeholder="KODE001" id="kode_bisnis" value="<?php echo set_value('kode_bisnis'); ?>" class="form-control">
                    
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">&nbsp;</div>
                </div>

                <div class="form-group">
                    <label for="kode_nomor" class="col-sm-2 control-label">Kode Nomor <span style="color: red;">*</span></label>
                    <div class="col-sm-10">
                    <input type="hidden" name="kode_nomor" maxlength="30" placeholder="" id="kode_nomor" 
                    value="<?php echo $kode_nomor; ?>" class="form-control">

                    <input type="text" disabled name="kode_nomor" maxlength="30" placeholder="" id="kode_nomor" 
                    value="<?php echo $kode_nomor; ?>" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">&nbsp;</div>
                </div>

                <div class="form-group">
                    <label for="nama_bisnis" class="col-sm-2 control-label">Nama Bisnis <span style="color: red;">*</span></label>
                    <div class="col-sm-10">
                    <input type="text" name="nama_bisnis" maxlength="30" placeholder="Toko Baju" id="nama_bisnis" value="<?php echo set_value('nama_bisnis'); ?>" class="form-control">
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
                        <a href="<?= $GoBack; ?>">
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

<!-- jQuery 3 -->
<script src="<?= base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js')?>"></script>

<!-- <script src="<?= base_url();?>assets/datatables/responsive.bootstrap.min.js"></script> -->
<script src="<?= base_url();?>assets/datatables/dataTables.rowReorder.min.js"></script>
<script src="<?= base_url();?>assets/datatables/dataTables.responsive.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() { 
        $("#formMhs").submit(function(e) {
            e.preventDefault();
            $.ajax({
                //  url: 'simpan-data.php',
                url: "<?= $AddAjax; ?>",
                type: 'POST',
                data: $(this).serialize(),             
                success: function(data) {
                    document.getElementById("formMhs").reset();
                    $('#status').html(data);                 
                }
            });
        });
    })
    </script>



</html>