@extends('partials.master')
@section('content')
    <div class="row mt-2 justify-content-center">
        <div class="col-lg-10">
            <div class="row">
                @foreach ($paket as $p)
                    <!--Pricing Column-->
                    <article class="pricing-column col-md-4">
                        @if ($p->id == 2)
                            <div class="ribbon"><span>POPULAR</span></div>
                        @endif
                        <div class="inner-box card-box ">
                            <div class="plan-header p-3 text-center">
                                <h3 class="plan-title">{{ $p->name }}</h3>
                                <h2 class="plan-price font-weight-normal">{{ $p->hargaRibu() }}</h2>
                                <div class="plan-duration"><span
                                        style="text-decoration: line-through;">{{ 'Rp ' . number_format($p->harga_awal, 0, ',', '.') }}</span>
                                </div>
                            </div>
                            <ul class="plan-stats list-unstyled p-3 mb-0">
                                {!! $p->featurePlan() !!}
                            </ul>

                            <div class="text-center">
                                <a href="{{ url('buy-paket/' . $p->id) }}"
                                    class="btn btn-success btn-rounded waves-effect waves-light ">Beli
                                    Paket</a>
                            </div>
                        </div>
                    </article>
                @endforeach


            </div><!-- end row -->
        </div>
    </div>
@endsection
