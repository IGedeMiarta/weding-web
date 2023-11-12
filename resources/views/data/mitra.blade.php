@extends('partials.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="dropdown float-right">
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addModal">
                        <i class="fas fa-plus"></i> Add</button>
                </div>

                <h4 class="header-title mt-0 mb-3">Mitra</h4>
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ $title ?? '' }} Usaha</th>
                                <th>Username</th>
                                <th>Phone</th>
                                {{-- <th>Logo</th> --}}
                                <th class="text-center">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($table as $i => $key)
                                <tr>
                                    <th><img src="{{ $key->profilePic() }}" alt="" style="max-width: 50px"
                                            class="rounded-circle"> </th>
                                    <td>{!! $key->is_busines
                                        ? '<a target="_blank" href="' .
                                            $key->url .
                                            '">' .
                                            $key->name .
                                            ' <span class="badge badge-primary">Bisnis</span></a>'
                                        : $key->name . ' <span class="badge badge-success">Perorangan</span>' !!}</td>
                                    <td>{{ $key->person }}</td>
                                    <td>{{ $key->phone }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-warning btnEdit" data-toggle="modal"
                                            data-target="#editModal" data-id="{{ $key->id }}"
                                            data-logo="{{ $key->profilePic() }}" data-is_busines="{{ $key->is_busines }}"
                                            data-url="{{ $key->url }}" data-name="{{ $key->name }}"
                                            data-person="{{ $key->person }}" data-phone="{{ $key->phone }}"><i
                                                class="fas fa-edit"></i></button>
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
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New {{ $title ?? '' }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Usaha {{ $title ?? '' }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" class="form-control" required
                                                data-parsley-minlength="1" placeholder="Nama {{ $title ?? '' }}" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Username Login</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="person" class="form-control person" required
                                                data-parsley-minlength="1" placeholder="Owner" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="phone" class="form-control phone" required
                                                data-parsley-minlength="1" placeholder="62 812 3456 7890" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Account Bisnis</label>
                                        <div class="col-sm-9">
                                            <div class="checkbox checkbox-pink">
                                                <input id="checkbox" name="is_bisnis" type="checkbox" class="check"
                                                    data-parsley-multiple="group1">
                                                <label for="checkbox">Yes</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row" hidden id="inpUrl">
                                        <label class="col-sm-3 col-form-label">Url Bisnis</label>
                                        <div class="col-sm-9">
                                            <input type="url" name="url" class="form-control url"
                                                data-parsley-minlength="1" placeholder="ex: www.baliwedding.co" />
                                        </div>
                                    </div>
                                    <div class="form-group row" hidden id="InpLogo">
                                        <label class="col-sm-3 col-form-label">Logo Bisnis</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="logo" class="dropify" data-default-file="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>

            </div>
        </div>
    </div>

    {{-- modal edit --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update {{ $title ?? '' }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Usaha {{ $title ?? '' }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" id="name" class="form-control"
                                                required data-parsley-minlength="1"
                                                placeholder="Nama {{ $title ?? '' }}" />
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" id="id">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Username Login</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="person" class="form-control person" required
                                                id="person" data-parsley-minlength="1" placeholder="Owner" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="phone" class="form-control phone"
                                                id="phone" required data-parsley-minlength="1"
                                                placeholder="62 812 3456 7890" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Account Bisnis</label>
                                        <div class="col-sm-9">
                                            <div class="checkbox checkbox-pink">
                                                <input id="checkbox_up" name="is_bisnis" type="checkbox" class="check"
                                                    data-parsley-multiple="group1">
                                                <label for="checkbox_up">Yes</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row" hidden id="inpUrl_up">
                                        <label class="col-sm-3 col-form-label">Url Bisnis</label>
                                        <div class="col-sm-9">
                                            <input type="url" name="url" class="form-control url"
                                                data-parsley-minlength="1" placeholder="ex: www.baliwedding.co"
                                                id="url" />
                                        </div>
                                    </div>
                                    <div class="form-group row" hidden id="InpLogo_up">
                                        <label class="col-sm-3 col-form-label">Logo Bisnis</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="logo" class="dropify"
                                                data-default-file="{{ '' }}" id="logoUpdate" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>

            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $('.check').on('change', function() {
            $('#inpUrl').attr('hidden', false);
            $('#InpLogo').attr('hidden', false);
        })
        $('.btnEdit').on('click', function() {
            const id = $(this).data('id');
            const is_busines = $(this).data('is_busines');
            const url = $(this).data('url');
            const name = $(this).data('name');
            const person = $(this).data('person');
            const phone = $(this).data('phone');
            const logo = $(this).data('logo');

            $('#id').val(id);
            $('#name').val(name);
            $('#person').val(person);
            $('#phone').val(phone);

            if (is_busines === 1) {
                $('#checkbox_up').prop('checked', true);
                $('#inpUrl_up').attr('hidden', false);
                $('#InpLogo_up').attr('hidden', false);
                $('#url').val(url);
                $('#logoUpdate').attr('data-default-file', logo)
                // $('.dropify').dropify();

            } else {
                $('#checkbox_up').prop('checked', false);
            }
        })
    </script>
@endpush
