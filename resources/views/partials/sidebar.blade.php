<div class="left-side-menu">
    <div class="slimscroll-menu">

        {{-- @include('name') --}}
        @php
            $Invoice = App\Models\Invoice::where(['user_id' => auth()->user()->id, 'status' => 3])->get();
            $InvoiceVal = App\Models\Invoice::where(['status' => 2])->get();
            $acara = App\Models\Acara::where(['status' => 1, 'by_user' => auth()->user()->id])->get();
        @endphp
        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Dashboard</li>

                <li>
                    <a href="{{ url('dashboard') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li class="menu-title">Apps</li>
                @if ($Invoice->count() >= 1 || $acara->count() >= 1)
                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-email"></i>
                            <span>Undangan @if ($Invoice->count() >= 1)
                                    <span class="badge badge-danger">{{ $Invoice->count() }}</span></span>
                @endif
                <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    @if ($Invoice->count() >= 1)
                        <li><a href="{{ url('buat-undangan') }}"><i class="mdi mdi-minus">Buat Undangan</i>
                                @if ($Invoice->count() >= 1)
                                    <span class="badge badge-danger">{{ $Invoice->count() }}</span></span>
                                @endif
                            </a></li>
                    @endif
                    @if ($acara->count() >= 1)
                        <li><a href="{{ url('undang-tamu') }}"><i class="mdi mdi-minus"></i> Undang Tamu</a></li>
                    @endif
                </ul>
                </li>
                @endif

                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-information"></i>
                        <span>Pembayaran @if ($InvoiceVal->count() >= 1 && auth()->user()->id == 1)
                                <span class="badge badge-danger">{{ $InvoiceVal->count() }}</span></span>
                        @endif
                        </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ url('invoice') }}">
                                <i class="mdi mdi-minus"></i>Invoice @if ($InvoiceVal->count() >= 1 && auth()->user()->id == 1)
                                    <span class="badge badge-danger">{{ $InvoiceVal->count() }}</span></span>
                                @endif
                            </a></li>
                    </ul>
                </li>
                @if (auth()->user()->id == 1)
                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-database-plus"></i>
                            <span>Master Data</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ url('mitra') }}"><i class="mdi mdi-minus"></i>Mitra</a></li>
                        </ul>
                    </li>
                @endif
                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-dns"></i>
                        <span>Paket</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ url('buy-paket') }}"><i class="mdi mdi-minus"></i> Beli Paket</a></li>
                        @if (auth()->user()->id == 1)
                            <li><a href="{{ url('paket') }}"><i class="mdi mdi-minus"></i> Custom Paket</a></li>
                        @endif
                    </ul>
                </li>
                @if (auth()->user()->id == 1)
                    <li>
                        <a href="{{ url('users') }}">
                            <i class="mdi mdi-face"></i>
                            <span> Users </span>
                        </a>
                    </li>
                @endif
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
