@extends('partials.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="dropdown float-right">

                </div>

                <h4 class="header-title mt-0 mb-3">Mitra</h4>
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>TRX</th>
                                <th>Items</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($table as $i => $key)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $key->trx }}</td>
                                    <td>{{ $key->details()['item'] }}</td>
                                    <td>{{ rp($key->details()['total']) }}</td>
                                    <td><span
                                            class="badge @if ($key->status == 4) badge-danger
                                            @elseif($key->status <= 2)
                                                badge-warning
                                                @else
                                                badge-success @endif">{{ stsBayar($key->status) }}</span>
                                    </td>
                                    <td>

                                        @if (auth()->user()->id == 1 && $key->status == 2)
                                            <a href="{{ url('pembayaran?inv=' . $key->trx) }}" class="btn btn-primary"> <i
                                                    class="fas fa-edit"></i> Validasi Bayar</a>
                                        @endif
                                        <a href="{{ url('invoice-details?inv=' . $key->trx) }}" class="btn btn-info"> <i
                                                class="fas fa-print"></i> Details</a>
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
