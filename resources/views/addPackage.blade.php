@extends('master.index')
@section('content')
    <div class="row">
        <div class="col-sm-12">
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

                <h4 class="header-title mt-0 mb-3">Fields validation</h4>

                <div class="row">
                    <div class="col-xl-6">
                        <h5>Validation type</h5>
                        <p class="text-muted font-13 mb-3">
                            Your awesome text goes here.
                        </p>

                        <form class="form-horizontal group-border-dashed" action="#">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Required</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" required placeholder="Type something" />
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Equal To</label>
                                <div class="col-sm-3">
                                    <input type="password" id="pass2" class="form-control" required
                                        placeholder="Password" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="password" class="form-control" required data-parsley-equalto="#pass2"
                                        placeholder="Re-Type Password" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">E-Mail</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" required parsley-type="email"
                                        placeholder="Enter a valid e-mail" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">URL</label>
                                <div class="col-sm-6">
                                    <input parsley-type="url" type="url" class="form-control" required
                                        placeholder="URL" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Digits</label>
                                <div class="col-sm-6">
                                    <input data-parsley-type="digits" type="text" class="form-control" required
                                        placeholder="Enter only digits" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Number</label>
                                <div class="col-sm-6">
                                    <input data-parsley-type="number" type="text" class="form-control" required
                                        placeholder="Enter only numbers" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Alphanumeric</label>
                                <div class="col-sm-6">
                                    <input data-parsley-type="alphanum" type="text" class="form-control" required
                                        placeholder="Enter alphanumeric value" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Textarea</label>
                                <div class="col-sm-6">
                                    <textarea required class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-3 col-sm-9 mt-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div><!-- end col -->

                    <div class="col-xl-6">
                        <h5>Range validation</h5>
                        <p class="text-muted font-13 mb-3">
                            Your awesome text goes here.
                        </p>

                        <form class="form-horizontal group-border-dashed" action="#">

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Min Length</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" required data-parsley-minlength="6"
                                        placeholder="Min 6 chars." />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Max Length</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" required data-parsley-maxlength="6"
                                        placeholder="Max 6 chars." />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Range Length</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" required data-parsley-length="[5,10]"
                                        placeholder="Text between 5 - 10 chars length" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Min Value</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" required data-parsley-min="6"
                                        placeholder="Min value is 6" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Max Value</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" required data-parsley-max="6"
                                        placeholder="Max value is 6" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Range Value</label>
                                <div class="col-sm-6">
                                    <input class="form-control" required type="text range" min="6" max="100"
                                        placeholder="Number between 6 - 100" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Regular Exp</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" required
                                        data-parsley-pattern="#[A-Fa-f0-9]{6}" placeholder="Hex. Color" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Min check</label>
                                <div class="col-sm-6">
                                    <div class="checkbox checkbox-pink">
                                        <input id="checkbox1" type="checkbox" data-parsley-multiple="groups"
                                            data-parsley-mincheck="2">
                                        <label for="checkbox1"> And this </label>
                                    </div>
                                    <div class="checkbox checkbox-pink">
                                        <input id="checkbox2" type="checkbox" data-parsley-multiple="groups"
                                            data-parsley-mincheck="2">
                                        <label for="checkbox2"> Can't check this </label>
                                    </div>
                                    <div class="checkbox checkbox-pink">
                                        <input id="checkbox3" type="checkbox" data-parsley-multiple="groups"
                                            data-parsley-mincheck="2" required>
                                        <label for="checkbox3"> This too </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Max check</label>
                                <div class="col-sm-6">
                                    <div class="checkbox checkbox-pink">
                                        <input id="checkbox4" type="checkbox" data-parsley-multiple="group1">
                                        <label for="checkbox4"> And this </label>
                                    </div>
                                    <div class="checkbox checkbox-pink">
                                        <input id="checkbox5" type="checkbox" data-parsley-multiple="group1">
                                        <label for="checkbox5"> Can't check this </label>
                                    </div>
                                    <div class="checkbox checkbox-pink">
                                        <input id="checkbox6" type="checkbox" data-parsley-multiple="group1"
                                            data-parsley-maxcheck="1">
                                        <label for="checkbox6"> This too </label>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="offset-sm-3 col-sm-9">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div>
        </div><!-- end col -->
    </div>
@endsection
