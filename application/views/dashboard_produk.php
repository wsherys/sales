<!DOCTYPE html>
<html>
  
<body>
    <div class="container-fluid">

        <!-- <h3> Data</h3> -->
        <br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row" style="padding:'1px';">
                    <div class="col-md-10">
                        <!-- <h3 class="panel-title" >Filter : </h3> -->
                    </div>
                    <div class="col-md-2">
                        <a href="#1"><button class="btn btn-sm btn-primary" style="width:100%;">Tambah data</button></a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <form id="form-filter" class="form-horizontal">
                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-4">
                            <?php echo $form_status; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kode" class="col-sm-2 control-label">Kode Produk</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="kode_produk">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kode_nomor" class="col-sm-2 control-label">Nama Produk</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="nama_produk">
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <label for="LastName" class="col-sm-2 control-label"></label>
                        <div class="col-sm-4">
                            <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                            <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Sub Produk</th>
                    <th>Harga Produk</th>
                    <th>Qty Produk</th>
                    <th>Unit Produk</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

        </table>
    </div>

</div>
</body>
</html>