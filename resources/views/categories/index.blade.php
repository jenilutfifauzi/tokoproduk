@extends('layouts.master')

@section('title')
    Categories | Toko Produk
@endsection


@section('title-header')
    Categories
@endsection

@includeIf('categories.form')
@section('content')
    <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Categories</h4>
                </div>

                <div class="card-body">
                    <button class="btn btn-primary mb-4 btn-small"
                        onclick="addForm('{{ route('variants.store') }}')">Tambah</button>
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Categories</th>
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
                        url: '{{ route('categories.data') }}',
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            searchable: false,
                            sortable: false
                        },
                        {
                            data: 'nama_categories'
                        },
                        {
                            data: 'aksi',
                            searchable: false,
                            sortable: false
                        },
                    ]
                })

                $('#modal-form').validator().on('submit', function(e) {
                    if (!e.preventDefault()) {
                        $.ajax({
                                url: $('#modal-form form').attr('action'),
                                type: 'post',
                                data: $('#modal-form form').serialize()
                            })
                            .done((response) => {
                                $('#modal-form').hide();
                                // $("#modal-form").style.display = "none";
                                // table.ajax.reload();
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
                $('#modal-form .modal-title').text('Tambah Categories');

                $('#modal-form form')[0].reset();
                $('#modal-form form').attr('action', url);
                $('#modal-form [name=_method]').val('post');
                $('#modal-form [name=nama_categories]').focus();
            }

            function editForm(url) {
                $('#modal-form').modal('show');
                $('#modal-form .modal-title').text('Edit Categories');

                $('#modal-form form')[0].reset();
                $('#modal-form form').attr('action', url);
                $('#modal-form [name=_method]').val('put');
                $('#modal-form [name=nama_categories]').focus();

                //get data
                $.get(url)
                    .done((response) => {
                        $('#modal-form [name=nama_categories]').val(response.nama_categories)
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
