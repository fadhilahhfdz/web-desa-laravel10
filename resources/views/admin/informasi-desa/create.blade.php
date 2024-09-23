<div class="modal fade" id="tambah-informasi-desa">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Informasi Desa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/informasi-desa/create" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama_desa">Nama Desa :</label>
                                <input type="text" name="nama_desa" class="form-control" placeholder="Cth: Tangkil" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hotline_desa">Hotline Desa :</label>
                                <input type="number" name="hotline_desa" class="form-control" placeholder="Cth: 62812XXXX" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email_desa">Email Desa :</label>
                                <input type="email" name="email_desa" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="deskripsi_desa">Deskripsi Desa :</label>
                                <textarea class="form-control" name="deskripsi_desa" cols="5" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="link_video">Link Profil Video :</label>
                                <input type="text" name="link_video" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="thumbnail_video">Thumbnail Profil Video :</label>
                                <input type="file" name="thumbnail_video" class="form-control" accept="image/*">
                                <small class="text-danger">*Rasio foto disarankan 16:9.</small>
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
