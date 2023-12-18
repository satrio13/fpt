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
                    <div class="card border border-secondary">
                        <div class="card-header">
                            <button onclick="reload_table()" class="btn bg-maroon btn-sm"><i class="fas fa-sync-alt"></i> Refresh</button>
                            <br><br>
                            <h3 class="text-center"><?= $title; ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table class="table table-bordered table-striped table-sm" id="table-produk-bisa-dijual">
                                    <thead class="bg-secondary text-center">
                                        <tr>
                                            <th width="5%" nowrap>NO</th>
                                            <th nowrap>Nama Produk</th>
                                            <th nowrap>Harga</th>
                                            <th nowrap>Kategori</th>
                                            <th width="10%" nowrap>Status</th>
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