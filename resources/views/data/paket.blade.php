@extends('partials.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="dropdown float-right">
                    <button class="btn btn-success btn-sm"data-toggle="modal" data-target="#addModal"><i
                            class="fas fa-plus"></i> Add</button>
                </div>

                <h4 class="header-title mt-0 mb-3">Paket Pemesanan</h4>
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ $title ?? '' }} Name</th>
                                <th>Price</th>
                                <th>Feature</th>
                                <th class="text-center">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($table as $i => $key)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $key->name }}</td>
                                    <td>{!! $key->harga() !!}</td>
                                    <td>{!! $key->feature() !!}</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-warning "><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger "><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- end col -->
    </div>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New {{ $title ?? '' }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama {{ $title ?? '' }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" class="form-control" required
                                                data-parsley-minlength="1" placeholder="Nama {{ $title ?? '' }}" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Harga Disc {{ $title ?? '' }}</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="harga_disc" class="form-control harga_disc" required
                                                data-parsley-minlength="1" placeholder="Harga Disc" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Disc %</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="disc" class="form-control disc" required
                                                data-parsley-minlength="1" placeholder="Disc %" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Harga Awal {{ $title ?? '' }}</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="harga_awal" class="form-control harga_awal" required
                                                data-parsley-minlength="1" placeholder="Harga Awal" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Feature</label>
                                        <div class="col-sm-6">
                                            <input type="hidden" name="checkbox" id="checkb">
                                            @foreach ($feature as $item)
                                                <div class="checkbox checkbox-pink">
                                                    <input id="checkbox{{ $item->id }}" type="checkbox" class="check"
                                                        data-parsley-multiple="group1" data-id="{{ $item->id }}">
                                                    <label for="checkbox{{ $item->id }}">
                                                        {{ $item->feature_name }}</label>
                                                </div>
                                            @endforeach
                                            <span class="foto" hidden>Jumlah Foto</span>
                                            <input type="number" name="foto" class="form-control foto" hidden
                                                data-parsley-minlength="1" placeholder="Jml" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>

            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $('.disc').on('keyup', function() {
            let disc = $(this).val();
            let harga_disc = $('.harga_disc').val();
            let harga = harga_disc * 100;
            let sisa_disc = 100 - disc;
            let harga_awal = harga / sisa_disc;
            $('.harga_awal').val(harga_awal)
        });
        let check = [];
        $('.check').on('change', function() {
            check.push($(this).data('id'));
            $('#checkb').val(JSON.stringify(check));
        })
        $('#checkbox7').on('click', function() {
            $('.foto').attr('hidden', false);
        })
    </script>
@endpush
