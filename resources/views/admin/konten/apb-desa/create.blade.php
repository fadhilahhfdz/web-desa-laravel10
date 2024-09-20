<div class="modal fade" id="tambah-apb">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data APB Desa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/apb-desa/create" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="jenis">Jenis APB :</label>
                            <select name="jenis" id="jenis" class="form-control" required>
                                <option value="Pendapatan">Pendapatan</option>
                                <option value="Belanja">Belanja</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="kategori">Kategori :</label>
                                <input type="text" name="kategori" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nominal">Nominal :</label>
                                <input type="number" name="nominal" class="form-control">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
