<div class="container">
  <div class="content-wrapper bg-white">
      <div class="content-header">
          <div class="row mb-2">
              <div class="col-sm-12">
                <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="<?= base_url('produk-api/index'); ?>">Produk API</a></li>
                    <li class="breadcrumb-item active"><?= $title; ?></li>
                </ol>
              </div>
          </div>
      </div>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <?php 
                    if($this->session->flashdata('msg-produk-api'))
                    {
                        echo pesan_sukses($this->session->flashdata('msg-produk-api'));
                    }elseif($this->session->flashdata('msg-gagal-produk-api'))
                    {
                        echo pesan_gagal($this->session->flashdata('msg-gagal-produk-api'));
                    }
                    ?>
                    <div class="card border border-secondary">
                        <div class="card-header">
                            <button onclick="add_produk()" class="btn bg-primary btn-sm"><i class="fa fa-plus"></i> Tambah Produk</button>
                            <button onclick="reload_table()" class="btn bg-maroon btn-sm"><i class="fas fa-sync-alt"></i> Refresh</button>
                            <br><br>
                            <h3 class="text-center"><?= $title; ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table class="table table-bordered table-striped table-sm" id="table-produk-api">
                                    <thead class="bg-secondary text-center">
                                        <tr>
                                            <th width="5%" nowrap>NO</th>
                                            <th nowrap>Nama Produk</th>
                                            <th nowrap>Harga</th>
                                            <th nowrap>Kategori</th>
                                            <th nowrap>Status</th>
                                            <th nowrap>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </section>
    </div>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_produk"/> 
                    <div class="form-body">
                        <div class="form-group row">
                            <label for="nama_produk" class="col-md-3 col-form-label">NAMA PRODUK <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="maxlength" name="nama_produk" id="nama_produk" maxlength="100" class="form-control" placeholder="Nama Produk">
                                <span class="help-block text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="harga" class="col-md-3 col-form-label">HARGA <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="number" name="harga" id="harga" min="0" class="form-control" placeholder="Harga">
                                <span class="help-block text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kategori_id" class="col-md-3 col-form-label">KATEGORI <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <select name="kategori_id" id="kategori_id" class="form-control">
                                <?php foreach($kategori as $r): ?>
                                    <option value="<?= $r->id_kategori; ?>"><?= $r->nama_kategori; ?></option>
                                <?php endforeach; ?>
                                </select>
                                <span class="help-block text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status_id" class="col-md-3 col-form-label">STATUS <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <select name="status_id" id="status_id" class="form-control">
                                <?php foreach($status as $r): ?>
                                    <option value="<?= $r->id_status; ?>"><?= ucwords($r->nama_status); ?></option>
                                <?php endforeach; ?>
                                </select>
                                <span class="help-block text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-3 col-md-9">
                                <span class="text-danger"><b>*</b></span>) Field Wajib Diisi
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save_produk()" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->