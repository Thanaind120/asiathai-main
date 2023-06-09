<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.style')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('layout.nav')
            @include('layout.menu')
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Role Account Manage</h1>
                    </div>

                    <div class="section-body ">
                        <div class="card col-8">

                            <div class="card-body p-0">

                                <form action="{{url('backend/role_profile/save')}}" method="POST">
                                    @csrf
                                    @if(!isset($role))
                                    <input type="hidden" name="type" value="1">
                                    @else
                                    <input type="hidden" name="id" value="{{$role->id}}">
                                    <input type="hidden" name="type" value="2">
                                    @endif

                                    @if(!isset($role))

                                    <div class="form-group row ml-4 mt-5">
                                        <label for="position_name" class="col-md-2 col-form-label">Position :</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="position_name"
                                                name="position_name" value="" required>
                                        </div>
                                    </div>

                                    <div class="form-group row ml-4 mt-5">
                                        <label for="customCheckbox" class="col-md-2 col-form-label">Permissions :</label>
                                        <div class="col-md-2">
                                            Page View <br><br>
                                            <div class="col-md-12">
                                                &nbsp;&nbsp;&nbsp;<input type="checkbox" id="page_view" name="page_view"
                                                    value="1">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            Page create <br><br>
                                            <div class="col-md-12">
                                                &nbsp;&nbsp;&nbsp;<input type="checkbox" id="page_create"
                                                    name="page_create" value="1">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            Page Edit <br><br>
                                            <div class="col-md-12">
                                                &nbsp;&nbsp;&nbsp;<input type="checkbox" id="page_edit" name="page_edit"
                                                    value="1">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            Page Delete <br><br>
                                            <div class="col-md-12">
                                                &nbsp;&nbsp;&nbsp;<input type="checkbox" id="page_delete"
                                                    name="page_delete" value="1">
                                            </div>
                                        </div>
                                    </div>

                                    @endif

                                    <!-- form update -->
                                    @if(isset($role))

                                    <div class="form-group row ml-4 mt-5">
                                        <label for="position_name" class="col-md-2 col-form-label">Position :</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="position_name"
                                                name="position_name" value="{{ @$role->position_name }}">
                                        </div>
                                    </div>

                                    <div class="form-group row ml-4 mt-5">
                                        <label for="customCheckbox" class="col-md-2 col-form-label">Permissions :</label>
                                        <div class="col-md-2">
                                            Page View <br><br>
                                            <div class="col-md-12">
                                                &nbsp;&nbsp;&nbsp;<input type="checkbox" id="page_view" name="page_view"
                                                    value="1" {{ ( @$role_permission->page_view=='1')?'checked':'' }}>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            Page create <br><br>
                                            <div class="col-md-12">
                                                &nbsp;&nbsp;&nbsp;<input type="checkbox" id="page_create"
                                                    name="page_create" value="1"
                                                    {{ ( @$role_permission->page_create=='1')?'checked':'' }}>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            Page Edit <br><br>
                                            <div class="col-md-12">
                                                &nbsp;&nbsp;&nbsp;<input type="checkbox" id="page_edit" name="page_edit"
                                                    value="1" {{ ( @$role_permission->page_edit=='1')?'checked':'' }}>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            Page Delete <br><br>
                                            <div class="col-md-12">
                                                &nbsp;&nbsp;&nbsp;<input type="checkbox" id="page_delete"
                                                    name="page_delete" value="1"
                                                    {{ ( @$role_permission->page_delete=='1')?'checked':'' }}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row ml-4 mt-5">
                                        <label class="col-md-2 col-form-label">Status :</label>
                                        <div class="col-md-10 mt-2">
                                            <div class="custom-control custom-switch">
                                                @if( empty($role) )
                                                <input type="checkbox" class="custom-control-input" id="customSwitch"
                                                    name="status" value="1" checked>
                                                @else
                                                <input type="checkbox" class="custom-control-input" id="customSwitch"
                                                    name="status" value="1" {{ ( @$role->status=='1')?'checked':'' }}>
                                                @endif
                                                <label class="custom-control-label" for="customSwitch"> Active /
                                                    Deactive</label>
                                            </div>
                                        </div>
                                    </div>

                                    @endif

                                    <div class="form-group mb-0 row">
                                        <div class="col-md-6">
                                            <a class="btn btn-secondary btn-sm waves-effect"
                                                href="{{ url("backend/role") }}">
                                                <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                                            </a>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <button type="submit" class="btn btn-success btn-sm waves-effect">
                                                <i class="fa fa-save font-size-16 align-middle mr-1"></i>
                                                @if(!isset($role))Save @else Update
                                                @endif
                                            </button>
                                        </div>
                                    </div><br>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
            </section>
        </div>
        @include('layout.footer')
    </div>
    </div>

    @include('layout.script')
</body>

</html>
