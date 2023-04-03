@extends('partials.master')
@section('content')
    <div class="row">

        <div class="col-xl-6 col-md-12">
            <div class="bg-picture card-box" style="min-height: 11rem">
                <div class="profile-info-name">
                    <img src="{{ auth()->user()->profilePic() }}"
                        class="rounded-circle avatar-xl img-thumbnail float-left mr-3" alt="profile-image">

                    <div class="profile-info-detail overflow-hidden">
                        <h4 class="m-0">{{ $user->name }}</h4>
                        <p class="text-muted"><i>{{ $user->username . ' | ' . $user->phone }}</i></p>
                        {{-- <p class="font-13">Hi I'm Alexandra Clarkson,has been the industry's standard dummy text ever since
                            the 1500s, when an unknown printer took a galley of type.Contrary to popular belief, Lorem Ipsum
                            is not simply random text. It has roots in a piece of classical Latin literature it over 2000
                            years to popular belief Ipsum is not simplyrandom text.</p> --}}

                        <ul class="social-list list-inline mt-3 mb-0">
                            @if (auth()->user()->id == 1)
                                <li class="list-inline-item">
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="username" value="{{ $user->username }}">
                                        <input type="hidden" name="password" value="{{ $user->phone }}">
                                        <button type="submit" class="social-list-item border-secondary text-secondary"><i
                                                class="mdi mdi-login"></i></button>
                                    </form>
                                </li>
                            @endif
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-purple text-purple"><i
                                        class="mdi mdi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i
                                        class="mdi mdi-instagram"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i
                                        class="mdi mdi-twitter"></i></a>
                            </li>
                        </ul>

                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
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

                </div>
            </div>

        </div><!-- end col -->

    </div>
    <!-- end row -->
    <!-- end row -->

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

                <h4 class="header-title mt-0 mb-3">Undangan</h4>

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
                                <tr>
                                    <td colspan="6">
                                        <div class="text-center">
                                            <a href="" class="text-info"><i
                                                    class="mdi mdi-spin mdi-loading mr-1"></i>
                                                Belum Ada
                                                Undangan
                                            </a>
                                        </div>
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
