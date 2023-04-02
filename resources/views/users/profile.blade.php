@extends('partials.master')
@section('content')
    <div class="row">
        <div class="col-sm-8">
            <div class="bg-picture card-box" style="min-height: 10rem">
                <div class="profile-info-name">
                    <img src="{{ $user->profilePic() }}" class="rounded-circle avatar-xl img-thumbnail float-left mr-3"
                        alt="profile-image">

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
            <!--/ meta -->
            <form method="post" class="card-box" action="{{ route('user.suport', $user->id) }}">
                @csrf
                <span class="input-icon icon-right">
                    <textarea rows="3" class="form-control" placeholder="Tanya Admin" name="msg" required></textarea>
                </span>
                <div class="pt-1 float-right">
                    <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Send</button>
                </div>
                <ul class="nav nav-pills profile-pills mt-1">
                    <li>
                        <a href="#"><i class="fa fa-user"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-location-arrow"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class=" fa fa-camera"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="far fa-smile"></i></a>
                    </li>
                </ul>
            </form>

            <div class="card-box">

                <!--  media -->
                @foreach ($msg as $item)
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
                @endforeach


                <div class="text-center">
                    <a href="" class="text-danger"><i class="mdi mdi-spin mdi-loading mr-1"></i> Load more </a>
                </div>
            </div>

        </div>


        <div class="col-sm-4">
            <div class="card-box" style="min-height: 10rem">
                <h4 class="header-title mt-0 mb-3"><i class="mdi mdi-notification-clear-all mr-1"></i> Saldo</h4>
                <h1 class="display-4">{{ $user->saldo() }}</h1>
            </div>

            <div class="card-box">
                <h4 class="header-title mt-0 mb-3"><i class="mdi mdi-notification-clear-all mr-1"></i> Transaction Log
                </h4>

                <ul class="list-group mb-0 user-list">

                    @forelse ($trx as $t)
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="user float-left mr-3">
                                    <i
                                        class="mdi mdi-credit-card-plus {{ $t->type == '+' ? 'text-success' : 'text-danger' }}"></i>
                                </div>
                                <div class="user-desc overflow-hidden">
                                    <h5 class="name mt-0 mb-1 {{ $t->type == '+' ? 'text-success' : 'text-danger' }}">
                                        {{ $t->type . ' ' . $t->amount() }}</h5>
                                    <h5 class="name mt-0 mb-1">{{ $t->details }}</h5>
                                    <span
                                        class="desc text-muted font-12 text-truncate d-block">{{ date('d M Y', strtotime($t->created_at)) . ' - ' . $t->created_at->diffForHumans() }}</span>
                                </div>
                            </a>
                        </li>
                    @empty
                        <div class="text-center">
                            <a href="" class="text-info"><i class="mdi mdi-spin mdi-loading mr-1"></i> Belum Ada
                                Transaksi
                            </a>
                        </div>
                    @endforelse

                </ul>
            </div>

            <div class="card-box">
                <h4 class="header-title mt-0 mb-3"><i class="mdi mdi-notification-clear-all mr-1"></i> Undangan
                </h4>
                <ul class="list-group mb-0 user-list">
                    @forelse ($acara as $item)
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="user avatar-sm float-left mr-2">
                                    <img src="assets/images/users/user-2.jpg" alt=""
                                        class="img-fluid rounded-circle">
                                </div>
                                <div class="user-desc">
                                    <h5 class="name mt-0 mb-1">Pewiwahan Michael & Zenaty</h5>
                                    <span class="desc text-muted font-12 text-truncate d-block">February 25, 2019 - 10:30am
                                        to
                                        12:45pm</span>
                                </div>
                            </a>
                        </li>
                    @empty
                        <div class="text-center">
                            <a href="" class="text-info"><i class="mdi mdi-spin mdi-loading mr-1"></i> Belum Ada
                                Undangan
                            </a>
                        </div>
                    @endforelse
                </ul>
            </div>

        </div>
    </div>
@endsection
