@extends('partials.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <!-- <div class="panel-heading">
                                                                                                                                                                                                                                                                                        <h4>Invoice</h4>
                                                                                                                                                                                                                                                                                    </div> -->
                <div class="panel-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <h3>{{ env('APP_NAME') }}</h3>
                        </div>
                        <div class="float-right">
                            <h4>Invoice # <br>
                                <strong>{{ $details['trx'] }}</strong>
                            </h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="float-left mt-3">

                            </div>
                            <div class="float-right mt-3">
                                <p><strong>Order Date: </strong> Jan 17, 2016</p>
                                <p class="m-t-10"><strong>Order Status: </strong> <span
                                        class="label label-pink">Pending</span></p>
                                <p class="m-t-10"><strong>Order ID: </strong> #{{ $details['trx'] }}</p>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Item</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Unit Cost</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $details['no'] }}</td>
                                            <td>{{ $details['item'] }}</td>
                                            <td>{!! $details['desc'] !!}</td>
                                            <td>{{ $details['qty'] }}</td>
                                            <td>{{ 'Rp ' . number_format($details['harga_awal'], 0, ',', '.') }}</td>
                                            <td>{{ 'Rp ' . number_format($details['harga_awal'], 0, ',', '.') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-6">
                            <div class="clearfix mt-4">
                                <h5 class="small text-dark">PAYMENT TERMS AND POLICIES</h5>

                                <small>
                                    All accounts are to be paid within 7 days from receipt of
                                    invoice. To be paid by cheque or credit card or direct payment
                                    online. If account is not paid within 7 days the credits details
                                    supplied as confirmation of work undertaken will be charged the
                                    agreed quoted fee noted above.
                                </small>
                            </div>
                        </div>
                        <div class="col-xl-3 col-6 offset-xl-3">
                            <p class="text-right"><b>Sub-total:</b>
                                {{ 'Rp ' . number_format($details['harga_awal'], 0, ',', '.') }}</p>
                            <p class="text-right">Discout: {{ $details['disc'] }}%</p>
                            <hr>
                            <h3 class="text-right">{{ 'Rp ' . number_format($details['total'], 0, ',', '.') }}</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="d-print-none">
                        <div class="text-center">
                            <a href="javascript:window.print()" class="btn btn-info waves-effect waves-light"><i
                                    class="fa fa-print"></i> Print</a>
                            <a href="{{ url('pembayaran/' . $details['trx']) }}"
                                class="btn btn-success waves-effect waves-light"><i class="fa fa-check"></i> Lajuat
                                Pembayaran</a>
                            {{-- <a href="http://wa.me/{{ $admin->phone }}?text=hai, saya mau bayar pembelian {{ env('APP_NAME') . ' ' . $details['item'] }} bisa dibantu?"
                                class="btn btn-success waves-effect waves-light">
                                <i class="mdi mdi-whatsapp" aria-hidden="true"></i> Chat Admin</a> --}}
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
