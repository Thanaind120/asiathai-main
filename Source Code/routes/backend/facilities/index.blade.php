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
                        <h1>Manage Facilities</h1>
                    </div>

                    <div class="section-body">

                        <div class="card">
                            @if($check->page_create == 1)
                            <div class="card-header">
                                <!-- add user button -->
                                <div class="text-right">
                                    <a href="{{url('backend/admin/add_facilities')}}" class="btn btn-success "><i
                                            class="fa fa-plus"></i> add</a>
                                </div><br>
                            </div>
                            @endif
                            <div class="card-body ">
                                <div class="table-responsive">
                                    <table id="simpletable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col" class="text-center"> Facilities</th>
                                                @if($check->page_edit == 1 || $check->page_delete == 1)
                                                <th scope="col" class="text-center"><i class="fa fa-cog "></i> Tools
                                                </th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($facilities as $key=>$f)
                                            <tr>
                                                <td class="text-center">{{$key+1}}</td>
                                                <td class="text-center">{{$f->facilities}}</td>
                                                @if($check->page_edit == 1 || $check->page_delete == 1)
                                                <td class="text-center">
                                                    @if($check->page_edit == 1)
                                                    <a class="btn btn-warning"
                                                        href="{{url('backend/admin/edit_facilities/'.$f->id)}}">Edit</a>
                                                    @endif
                                                    @if($check->page_delete == 1)
                                                    <button class="btn btn-danger"
                                                        onclick="confirm_delete('{{$f->id}}')">Delete</button>
                                                    @endif
                                                </td>
                                                @endif
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </section>
        </div>
        @include('layout.footer')
    </div>
    </div>
    <!-- start edit user -->
    <div class="modal fade" id="upload" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="was-validated" method="POST" action="{{ url('director/managing-user') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title"><i class="image"></i>Upload Image</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="file" accept="image/png, image/gif, image/jpeg" class="form-control">
                    </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary waves-effect waves-light "
                            data-dismiss="modal">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end edit user -->
    <!-- form delete -->
    <form action="{{url('backend/facilities/delete')}}" method="POST" id="delete_form">
        @csrf
        <input type="hidden" name="id" id="delete_id2">
    </form>
    @include('layout.script')
    <!-- form to reset password -->
    <form action="{{url('/backend/member_reset')}}" method="POST" id="reset_password">
        @csrf
        <input type="hidden" name="id" id="id_reset">
    </form>
    <script>
        // $('#simpletable').dataTable();

        function confirm_delete(id) {

            Swal.fire({
                title: 'Are you sure to delete?',
                // text: "Reset password:m123456",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {

                    $('#delete_id2').val(id);
                    $('#delete_form').submit();
                }
            });
        }

    </script>
</body>

</html>
