@extends('partials.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="dropdown float-right">
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addModal"><i
                            class="fas fa-plus"></i> Add</button>
                </div>

                <h4 class="header-title mt-0 mb-3">ALL {{ $title ?? '' }}</h4>
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ $title ?? '' }} Name</th>
                                <th class="text-center">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($table as $i => $key)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $key->feature_name }}</td>
                                    <td class="text-center">
                                        <form action="/fitur/{{ $key->id }}" method="POST">
                                            <button class="btn btn-sm btn-warning btnEdit" data-toggle="modal"
                                                data-target="#editModal" data-id="{{ $key->id }}"
                                                data-feature_name="{{ $key->feature_name }}"><i
                                                    class="fas fa-edit"></i></button>

                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger btnDelete" type="submit"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </form>
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New {{ $title ?? '' }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama {{ $title ?? '' }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="feature_name" class="form-control" required
                                                data-parsley-minlength="1" placeholder="Nama {{ $title ?? '' }}" />
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
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit {{ $title ?? '' }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="" method="POST" id="formEdit">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="id" id="id">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama {{ $title ?? '' }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="feature_name" class="form-control" id="feature_name"
                                                required data-parsley-minlength="1"
                                                placeholder="Nama {{ $title ?? '' }}" />
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
        $('.btnEdit').on('click', function() {

            const id = $(this).data('id')
            const feature_name = $(this).data('feature_name');
            console.log('id', id);
            $('#id').val(id);
            $('#feature_name').val(feature_name);
            $('#formEdit').attr('action', `/fitur/${id}`);
        });
        $('.btnDelete').on('click', function(e) {
            e.preventDefault();

            // Store the form element for later use
            var form = $(this).closest('form');

            // Display SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user clicks "Yes, delete it!", submit the form
                    form.submit();
                }
            });
        });
    </script>
@endpush
