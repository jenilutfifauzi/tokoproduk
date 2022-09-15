@extends('layouts.master')

@section('title')
    Product Images | Toko Produk
@endsection


@section('title-header')
    Product Images
@endsection

@includeIf('product_images.form')
@section('content')
    <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Product</h4>
                </div>

                <div class="card-body">
                    <button class="btn btn-primary mb-4 btn-small"
                        onclick="addForm('{{ route('product_images.store') }}')">Tambah</button>
                    <table class="table table-striped table-bordered display nowrap" id="table1">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Product</th>
                                <th scope="col">Images</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection


    @push('scripts')
        <script>
            let table;
            $(function() {
                table = $('#table1').DataTable({
                    processing: true,
                    autoWidth: false,
                    ajax: {
                        url: '{{ route('product_images.data') }}',
                    },
                    columns: [
                        {data: 'DT_RowIndex', searchable: false,sortable: false},
                        {data: 'nama_product'},
                        {data: 'images',searchable: false,sortable: false},
                        {data: 'aksi',searchable: false,sortable: false},
                    ]
                })

                $('#modal-form').validator().on('submit', function(e) {
                    if (!e.preventDefault()) {
                        $.ajax({
                                url: $('#modal-form form').attr('action'),
                                type: 'post',
                                data: new FormData($('.form-horizontal')[0]),
                                async: false,
                                processData: false,
                                contentType: false
                            })
                            .done((response) => {
                                $('#modal-form').hide();
                                
                                table.ajax.reload();
                                location.reload(true);

                            })
                            .fail((errors) => {
                                alert('Tidak dapat menyimpan data');
                                return;
                            })
                    }
                })
            });

            function addForm(url) {
                $('#modal-form').modal('show');
                $('#modal-form .modal-title').text('Tambah Images');

                $('#modal-form form')[0].reset();
                $('#modal-form form').attr('action', url);
                $('#modal-form [name=_method]').val('post');
            }

            function editForm(url) {
                $('#modal-form').modal('show');
                $('#modal-form .modal-title').text('Edit Product');

                $('#modal-form form')[0].reset();
                $('#modal-form form').attr('action', url);
                $('#modal-form [name=_method]').val('put');

                //get data
                $.get(url)
                    .done((response) => {
                        $('#modal-form [name=id_product]').val(response.id_product)
                        $('#modal-form [name=foto]').val(response.nama_imgs)
                     
                    })
                    .fail((errors) => {
                        alert('Tidak dapat menampilkan data');
                        return;
                    })
            }

            function deleteForm(url){
              $.post(url, {
                '_token': $('[name=csrf-token]').attr('content'),
                '_method': 'delete'
              })
              .done((response) => {
                 table.ajax.reload();
              })
              .fail((errors) => {
                alert('Tidak dapat menghapus data');
                return;
              })
            }
        </script>
    @endpush
