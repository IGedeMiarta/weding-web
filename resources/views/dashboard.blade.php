@extends('partials.master')
@section('content')
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card-box">
                <div class="dropdown float-right">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                    </div>
                </div>

                <h4 class="header-title mt-0 mb-3">Total Saldo</h4>

                <div class="widget-box-2">
                    <div class="widget-detail-2 text-right">
                        {{-- <span class="badge badge-success badge-pill float-left mt-3">32% <i class="mdi mdi-trending-up"></i>
                        </span> --}}
                        <h2 class="font-weight-normal mb-1">{{ rp($total['saldo']) }} </h2>
                        <p class="text-muted mb-3">Total Saldo All User</p>
                    </div>
                    <div class="progress progress-bar-alt-info progress-sm">
                        {{-- <div class="progress-bar bg-success" role="progressbar" aria-valuenow="77" aria-valuemin="0"
                            aria-valuemax="100" style="width: 77%;">
                            <span class="sr-only">77% Complete</span>
                        </div> --}}
                    </div>
                </div>
            </div>

        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <div class="card-box">
                <div class="dropdown float-right">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                    </div>
                </div>

                <h4 class="header-title mt-0 mb-3">Total Mitra</h4>

                <div class="widget-box-2">
                    <div class="widget-detail-2 text-right">
                        {{-- <span class="badge badge-success badge-pill float-left mt-3">32% <i class="mdi mdi-trending-up"></i>
                        </span> --}}
                        <h2 class="font-weight-normal mb-1">{{ $total['mitra'] }}</h2>
                        <p class="text-muted mb-3">Active Mitra</p>
                    </div>
                    <div class="progress progress-bar-alt-danger progress-sm">
                        {{-- <div class="progress-bar bg-success" role="progressbar" aria-valuenow="77" aria-valuemin="0"
                            aria-valuemax="100" style="width: 77%;">
                            <span class="sr-only">77% Complete</span>
                        </div> --}}
                    </div>
                </div>
            </div>

        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card-box">
                <div class="dropdown float-right">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                    </div>
                </div>

                <h4 class="header-title mt-0 mb-3">Total Undangan</h4>

                <div class="widget-box-2">
                    <div class="widget-detail-2 text-right">
                        {{-- <span class="badge badge-success badge-pill float-left mt-3">32% <i class="mdi mdi-trending-up"></i>
                        </span> --}}
                        <h2 class="font-weight-normal mb-1"> {{ $total['acara'] }} </h2>
                        <p class="text-muted mb-3">Acara</p>
                    </div>
                    <div class="progress progress-bar-alt-warning progress-sm">
                        {{-- <div class="progress-bar bg-success" role="progressbar" aria-valuenow="77" aria-valuemin="0"
                            aria-valuemax="100" style="width: 77%;">
                            <span class="sr-only">77% Complete</span>
                        </div> --}}
                    </div>
                </div>
            </div>

        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <div class="card-box">
                <div class="dropdown float-right">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                    </div>
                </div>

                <h4 class="header-title mt-0 mb-3">Saldo</h4>

                <div class="widget-box-2">
                    <div class="widget-detail-2 text-right">
                        {{-- <span class="badge badge-pink badge-pill float-left mt-3">32% <i class="mdi mdi-trending-up"></i>
                        </span> --}}
                        <h2 class="font-weight-normal mb-1"> {{ rp(auth()->user()->saldo) }} </h2>
                        <p class="text-muted mb-3">Saldo</p>
                    </div>
                    <div class="progress progress-bar-alt-success progress-sm">
                        {{-- <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="77" aria-valuemin="0"
                            aria-valuemax="100" style="width: 77%;">
                            <span class="sr-only">77% Complete</span>
                        </div> --}}
                    </div>
                </div>
            </div>

        </div><!-- end col -->

    </div>
    <!-- end row -->
    <!-- end row -->


    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="dropdown float-right">
                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-dots-vertical"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a href="{{ url('users') }}" class="dropdown-item">See All</a>
                </div>
            </div>
            {{-- <h4 class="header-title mt-0 mb-3">Mitra Project</h4> --}}
        </div>
        @forelse ($mitra as $item)
            <div class="col-xl-3 col-md-6">
                <div class="card-box widget-user">
                    <div class="media">
                        <div class="avatar-lg mr-3">
                            <img src="{{ $item->profilePic() }}" class="img-fluid rounded-circle" alt="user">
                        </div>
                        <div class="media-body overflow-hidden">
                            <h5 class="mt-0 mb-1">{{ $item->name }}</h5>
                            <p class="text-muted mb-2 font-13 text-truncate">{{ $item->person . ' | ' . $item->phone }}
                            </p>
                            <small class="text-success"><b>{{ rp($item->saldo) }}</b></small>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        @empty
            <div class="col-xl-12 col-md-12">
                <div class="card-box widget-user">
                    <div class="text-center">
                        <a href="" class="text-info"><i class="mdi mdi-spin mdi-loading mr-1"></i> Belum Ada
                            Mitra
                        </a>
                    </div>
                </div>
            </div><!-- end col -->
        @endforelse

    </div>
    <!-- end row -->


    <div class="row">
        <div class="col-xl-4">
            <div class="card-box">


                <h4 class="header-title mb-3">Inbox</h4>

                <div class="inbox-widget">


                    @forelse ($inbox as $item)
                        <div class="media mb-2">
                            <img src="{{ $item->user->profilePic() }}" alt=""
                                class="comment-avatar avatar-sm rounded mr-2">
                            <div class="media-body">
                                <h5 class="mt-0"><a href="#" class="text-dark">{{ $item->user->name }}</a><small
                                        class="ml-1 text-muted">{{ $item->created_at->diffForHumans() }}</small></h5>
                                <p>{{ $item->msg }}</p>

                                <div class="comment-footer pt-2 mb-3">
                                    <a href="#"><i class="far fa-thumbs-up"></i></a>
                                    <a href="#"><i class="far fa-thumbs-down"></i></a>
                                    @if (auth()->user()->id == 1)
                                        <a href="#">Reply</a>
                                    @endif
                                </div>
                                @php
                                    $second = App\Models\Support::with(['user'])
                                        ->where(['mark' => $item->mark, 'row' => 2])
                                        ->get();
                                @endphp
                                @foreach ($second as $s)
                                    <div class="media mb-2">
                                        <img src="{{ $s->user->profilePic() }}" alt=""
                                            class="comment-avatar avatar-sm rounded mr-2">
                                        <div class="media-body">
                                            <h5 class="mt-0"><a href="#"
                                                    class="text-dark">{{ $s->user->username }}</a><small
                                                    class="ml-1 text-muted">{{ $s->created_at->diffForHumans() }}</small>
                                            </h5>
                                            <p>{{ $s->msg }}</p>

                                            <div class="comment-footer">
                                                <a href="#"><i class="far fa-thumbs-up"></i></a>
                                                <a href="#"><i class="far fa-thumbs-down"></i></a>
                                                {{-- <a href="#">Reply</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach



                            </div>
                        </div>
                    @empty
                        <div class="text-center">
                            <a href="" class="text-info"><i class="mdi mdi-spin mdi-loading mr-1"></i> Belum Ada
                                Pesan
                            </a>
                        </div>
                    @endforelse

                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-8">
            <div class="card-box">

                <h4 class="header-title mt-0 mb-3">Acara Terbaru</h4>

                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Acara</th>
                                <th>Dibuat</th>
                                <th>By User</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($acara as $i => $item)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->waktu) }}
                                    </td>
                                    <td>{{ $item->created_at->diffForHumans() }}</td>
                                    <td>{{ $item->user->mitra->name }}</td>
                                    <td><span
                                            class="badge badge-success">{{ $item->status == 1 ? 'active' : 'inactive' }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="6 ">
                                        <a href="" class="text-info "><i
                                                class="mdi mdi-spin mdi-loading mr-1"></i>
                                            Belum Ada
                                            Undangan
                                        </a>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- end col -->
    </div>
@endsection
@push('script')
    <script>
        $('#test').on('click', function() {
            Toast.fire({
                icon: 'success',
                title: "Test",
            })
        })
    </script>
@endpush
