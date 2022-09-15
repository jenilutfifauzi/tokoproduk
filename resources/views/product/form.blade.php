<!-- Modal -->
<div class="modal fade" id="modal-form" tabindex="-2" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
                            <input type="text" name="nama_product" id="nama_product" class="form-control" required>
                            <span class="help-block with-error">

                            </span>
                        </div>
                    </div>

                    <div class="form-grup row mt-4">
                        <label for="id_categories" class="col-sm-2  col-form-label">Categories</label>
                        <div class="col-sm-6">
                            <select name="id_categories" id="id_categories" class="form-control">
                                    <option value="" class="form-control">Pilih</option>
                                @foreach ($categories as $key => $items)
                                    <option value="{{ $key }}" class="form-control"> {{ $items }}
                                    </option>
                                @endforeach

                            </select>
                            <span class="help-block with-error">

                            </span>
                        </div>
                    </div>

            
                    <div class="form-grup row mt-4">
                        <label for="id_variants" class="col-sm-2  col-form-label">Variants</label>
                        <div class="col-sm-6">
                            <select name="id_variants" id="id_variants" class="form-control">
                                    <option value="" class="form-control">Pilih</option>
                                @foreach ($variants as $key => $items)
                                    <option value="{{ $key }}" class="form-control"> {{ $items }}
                                    </option>
                                @endforeach

                            </select>

                            <input type="hidden" name="foto" id="foto" class="form-control" value="0" required>
                            <span class="help-block with-error">

                            </span>
                        </div>
                    </div>

                   

                    <div class="form-grup row mt-4">
                        <label for="harga_product" class="col-sm-2  col-form-label">Harga</label>
                        <div class="col-sm-6">
                            <input type="text" name="harga_product" id="harga_product" class="form-control" required>
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
