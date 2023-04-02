@extends('partials.master')
@section('content')
    <div class="row" id="urlAdd" hidden>
        <input type="hidden" name="" id="slug">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="card-header">
                    Undang Tamu
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <Span class="col-md-2">Tamu Undangan</Span>
                        <div class="col-md-10">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control nama" placeholder="Nama Undangan"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="input-group-text bg-success text-white btnLink"
                                        id="basic-addon2">Dapatkan
                                        Link</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <Span class="col-md-2">Tamu Undangan</Span>
                        <div class="col-md-10">
                            <input type="text" id="url" class="form-control url">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="dropdown float-right">
                    <button class="btn btn-success btn-sm"data-toggle="modal" data-target="#addModal"><i
                            class="fas fa-plus"></i> Add</button>
                </div>

                <h4 class="header-title mt-0 mb-3">Mitra</h4>
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Acara</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($table as $i => $key)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $key->name }}</td>
                                    <td>
                                        <button class="btn btn-info undang" id="undang"
                                            data-slug="{{ $key->slug }}">Undang
                                            Tamu</button>
                                        <button class="btn btn-info">Lihat Undangan</button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- end col -->
    </div>
@endsection
@push('script')
    <script>
        $('.undang').on('click', function() {
            let slug = $(this).data('slug');
            $('#slug').val(slug);
            $('#urlAdd').attr('hidden', false)
        })
        $('.btnLink').on('click', function() {
            let nama = $('.nama').val();
            let nameRep = nama.replace(/\s/g, "%20");
            let url = "{{ url('') }}";
            let slug = $('#slug').val();
            $('.url').val(url + '/' + slug + '?to=' + nameRep);
        })
    </script>
@endpush
