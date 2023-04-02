@extends('partials.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="dropdown float-right">

                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Phone</th>
                                <th>Join Date</th>
                                <th class="text-center">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($table as $i => $key)
                                <tr>
                                    <th>{{ $i + 1 }}</th>
                                    <th><a href="{{ url('users/profile/' . $key->id) }}">{{ $key->name }}</a></th>
                                    <td>{{ $key->username }}</td>
                                    <td>{{ $key->phone }}</td>
                                    <td>{{ \Carbon\Carbon::parse($key->created_at)->diffForHumans() }}</td>
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
@endsection
@push('script')
    <script>
        console.log('ready');
    </script>
@endpush
