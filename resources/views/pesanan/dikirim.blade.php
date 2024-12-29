@extends('layout.app')

@section('title', 'Data Pesanan Dikirim')

@section('content')
    <div class="card shadow">
        <div class="card-header">
            <h4 class="card-title">
                Data Pesanan Dikirim
            </h4>
        </div>
        <div class="card-body text-center">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pesanan</th>
                            <th>Invoice</th>
                            <th>Member</th>
                            <th>Total</th>
                            <th>No Resi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="resiModal" tabindex="-1" role="dialog" aria-labelledby="resiModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resiModalLabel">Tambah Resi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-resi">
                        <div class="form-group">
                            <label for="resi">Nomor Resi</label>
                            <input type="text" class="form-control" id="resi" name="resi" required>
                        </div>
                        <input type="hidden" id="pesanan-id" name="pesanan-id">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('js')
    <script>
        $(function() {

            function rupiah(angka) {
                const format = angka.toString().split('').reverse().join('');
                const convert = format.match(/\d{1,3}/g);
                return 'Rp ' + convert.join('.').split('').reverse().join('')
            }

            function date(date) {
                var date = new Date(date);
                var day = date.getDate(); //Date of the month: 2 in our example
                var month = date.getMonth(); //Month of the Year: 0-based index, so 1 in our example
                var year = date.getFullYear()

                return `${day}-${month}-${year}`;
            }

            const token = localStorage.getItem('token')
            $.ajax({
                url: '/api/pesanan/dikirim',
                headers: {
                    "Authorization": 'Bearer ' + token
                },
                success: function({
                    data
                }) {

                    let row;
                    data.map(function(val, index) {
                        row += `
                        <tr>
                            <td>${index+1}</td>
                            <td>${date(val.created_at)}</td>
                            <td>${val.invoice}</td>
                            <td>${val.member.nama_member}</td>
                            <td>${rupiah(val.grand_total)}</td>
                            <td>${val.resi}</td>
                            <td>
                                <a href="#" data-id="${val.id}" class="btn btn-success btn-aksi">Terima</a>
                                <button class="btn btn-info btn-resi" data-id="${val.id}" data-toggle="modal" data-target="#resiModal">Tambah Resi</button>
                            </td>
                        </tr>
                        `;
                    });

                    $('tbody').append(row)
                }
            });
            $(document).on('click', '.btn-resi', function() {
                const id = $(this).data('id');
                $('#pesanan-id').val(id);
            });

            $('#form-resi').on('submit', function(e) {
                e.preventDefault();
                const id = $('#pesanan-id').val();
                const resi = $('#resi').val();

                $.ajax({
                    url: '/api/pesanan/tambah_resi/' + id,
                    type: 'POST',
                    data: {
                        resi: resi
                    },
                    headers: {
                        "Authorization": 'Bearer ' + token
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });

            $(document).on('click', '.btn-aksi', function() {
                const id = $(this).data('id')

                $.ajax({
                    url: '/api/pesanan/ubah_status/' + id,
                    type: 'POST',
                    data: {
                        status: 'Diterima'
                    },
                    headers: {
                        "Authorization": 'Bearer ' + token
                    },
                    success: function(data) {
                        location.reload()
                    }
                })
            })

        });
    </script>
@endpush