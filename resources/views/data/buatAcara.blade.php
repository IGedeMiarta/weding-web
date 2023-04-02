@extends('partials.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <form action="{{ route('acara.post') }}" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        <div class="col-md-12">
                            <div class="mb-2 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Pilih Paket</label>
                                <input type="hidden" name="paket" value="{{ $inv->details()['id'] }}">
                                <div class="col-sm-10">
                                    <select name="paket" id="paket" class="form-select form-control" disabled>
                                        <option>--Pilih Paket</option>
                                        @foreach ($paket as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($inv->details()['id']) selected @endif>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <h3 class="harga"></h3>
                                    <div class="paket-detail" id="paketDetail">
                                        @foreach ($paket as $item)
                                            <h2>{{ $item->harga() }}</h2>
                                            {!! $item->feature() !!}
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="inv" value="{{ $inv->id }}">
                            <div class="mb-2 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Nama Acara</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_acara"
                                        placeholder="ex: Pawiwahan Omang & Ogek">

                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Alamat Acara</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="alamat"
                                        placeholder="ex: Jl. Cokroaminoto, Br. Banjaran, Denpasar">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Google Map Link</label>
                                <div class="col-sm-10">
                                    <input type="url" class="form-control" name="maps"
                                        placeholder="ex: https://goo.gl/maps/Xesxmodg2NcxA9Pq6">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Waktu Acara</label>
                                <div class="col-sm-3">
                                    <input type="datetime-local" class="form-control" name="waktu">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="card-header">
                                <b> Mempelai Pria</b>
                            </div>
                            <br>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="l_name"
                                        placeholder="ex: Komang Bagus, S. M">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Panggilan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="l_nickname" placeholder="ex: Omang">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Ayah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="l_ayah" placeholder="ex: Made Ajus">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Ibu</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="l_ibu" placeholder="ex: Luh Juni">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Alamat Asal</label>
                                <div class="col-sm-9">
                                    <input type="text" name="l_alamat" id="" class="form-control"
                                        placeholder="ex: Dangin Peken">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-header">
                                <b> Mempelai Wanita</b>
                            </div>
                            <br>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="p_name"
                                        placeholder="Gek Tatik, S. Farm">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Panggilan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="p_nickname" placeholder="ex: Ogek">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Ayah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="p_ayah"
                                        placeholder="ex: Gede Blalak">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Ibu</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="p_ibu"
                                        placeholder="ex: Luh Juni">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Alamat Asal </label>
                                <div class="col-sm-9">
                                    <input type="text" name="p_alamat" id="" class="form-control"
                                        placeholder="ex: Dangin Tukad">
                                </div>
                            </div>
                        </div>

                        <div class="card-header col-md-12 mb-3 text-center">
                            <b> Tambah Galery Foto</b>
                        </div>

                        <div class="inputImage col-md-12 row">
                            @for ($i = 1; $i < $img->jml_galery + 1; $i++)
                                <div class="col-md-6">
                                    <div class="mb-3 row">
                                        <label for="staticEmail" class="col-sm-3 col-form-label">Gambar
                                            {{ $i }}</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="dropify" name="Gambar[]"
                                                data-default-file="" />
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <hr>
                        <div class="col-md-12 text-center mt-3">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i>
                                Simpan </button>

                        </div>
                    </div>
                </form>

            </div><!-- end row -->
        </div>
    </div><!-- end col -->
    </div>
@endsection
@push('script')
    <script>
        $('#paket').on('change', function() {
            const id = $(this).val();
            $.ajax({
                url: "{{ url('detail-paket') }}" + "/" + id,
                method: "GET",
                success: function(rs) {
                    $('.harga').html(rs.data.harga)
                    $('#paketDetail').html(rs.data.fitur);
                    $('.inputImage').html(rs.data.img);
                }
            })
        })
    </script>
@endpush
