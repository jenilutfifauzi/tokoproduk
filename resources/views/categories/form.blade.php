<!-- Modal -->
<div class="modal fade" id="modal-form" tabindex="-2" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="POST" class="form-horizontal">
            @csrf
            @method('post')

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <div class="form-grup row">
                        <label for="nama_categories" class="col-sm-2  col-form-label">Categories</label>
                        <div class="col-sm-6">
                            <input type="text" name="nama_categories" id="nama_categories" class="form-control" required >
                            <span class="help-block with-error">

                            </span>
                        </div>
                   </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
