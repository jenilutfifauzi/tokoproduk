<!-- Modal -->
<div class="modal fade" id="modal-form" tabindex="-2" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="POST" class="form-horizontal" id="form-imgs" enctype="multipart/form-data">
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
                        <label for="nama_product" class="col-sm-2  col-form-label">Nama Product</label>
                        <div class="col-sm-6">
                            <select name="id_product" id="id_product" class="form-control">
                                <option value="" class="form-control">Pilih</option>
                            @foreach ($product as $key => $items)
                                <option value="{{ $key }}" class="form-control"> {{ $items }}
                                </option>
                            @endforeach

                        </select>
                            <span class="help-block with-error">

                            </span>
                        </div>
                    </div>

                    <div class="form-grup row">
                        <label for="foto" class="col-sm-2  col-form-label">Foto</label>
                        <div class="col-sm-6">
                            <input type="file" name="foto" id="foto" class="form-control" required>
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
