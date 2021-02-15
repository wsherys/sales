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
                        <h3 class="panel-title" >Form Edit </h3>
                    </div>
                    <div class="col-md-10">
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
                    <p style="color: red;">Form field bertanda (*) wajib diisi.</p>
                    <p style="color: red;">Kode bank wajib numerik tanpa spasi.*</p>
                    </div>
                <?php }?>
               
                <?php echo form_open($EditAjax); ?>
                <?php  ?>
                <form id="formMhs" method="POST" class="form-horizontal">
                <?php foreach($bank as $e){ ?>

                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">&nbsp;</div>
                </div>

                <div class="form-group">
                    <label for="kode_bank" class="col-sm-2 control-label">Kode Bank <span style="color: red;">*</span></label>
                    <div class="col-sm-10">
                    <input type="hidden" name="id" id="id" value="<?= $e->id; ?>" class="form-control">
                    <input type="text" name="kode_bank" onkeypress="return HanyaAngka(event)" maxlength="5" placeholder="014" id="kode_bank" 
                    value="<?php if(set_value('kode_bank')!==''){echo set_value('kode_bank'); }else{ echo $e->kode_bank; } ?>" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">&nbsp;</div>
                </div>

                <div class="form-group">
                    <label for="nama_bank" class="col-sm-2 control-label">Nama Bank <span style="color: red;">*</span></label>
                    <div class="col-sm-10">
                    <input type="text" name="nama_bank" id="NamaBank" maxlength="30" placeholder="Bank BCA" id="nama_bank" 
                    value="<?php if(set_value('nama_bank')!==''){echo set_value('nama_bank'); }else{ echo $e->nama_bank; } ?>" class="form-control">
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
                        <?php if($e->status==='0'){?>
                            <option selected value="0">Tidak Aktif</option>
                            <option value="1">Aktif</option>
                        <?php }else{?>
                        <option selected value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                        <?php }?>
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
                
                <?php } ?>
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
            url: "<?= $EditAjax; ?>",
            type: 'POST',
            data: $(this).serialize(),             
            success: function(data) {
                document.getElementById("formMhs").reset();
                $('#status').html(data);                 
            }
        });
    });
})

function HanyaAngka(evt) {
    // Mendapatkan key code 
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    // Validasi hanya tombol angka
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}


var input = document.getElementById('NamaBank');

input.onkeyup = function(){
    this.value = this.value.toUpperCase();
}

</script>



</html>