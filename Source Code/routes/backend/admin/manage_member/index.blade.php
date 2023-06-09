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
                        <h1>Member Account Manage</h1>
                    </div>

                    <div class="section-body">

                        <div class="card">
                            @if($check->page_create == 1)
                            <div class="card-header">
                                <!-- add user button -->
                                <div class="text-right">
                                    <a href="{{url('backend/admin/add-member')}}" class="btn btn-success "><i
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
                                                <th scope="col"><i class="fa fa-user"></i> Full Name</th>
                                                <th scope="col"><i class="fa fa-envelope"></i> E-Mail</th>
                                                <th scope="col"><i class="fa fa-phone"></i> Phone Number</th>
                                                <th scope="col"><i class="fa fa-check"></i> Status</th>
                                                @if($check->page_edit == 1 || $check->page_delete == 1)
                                                <th scope="col"><i class="fa fa-key"></i> Password</th>
                                                <th scope="col"><i class="fa fa-cog"></i> Tools</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($member as $key=>$u)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$u->firstname}} {{$u->lastname}}</td>
                                                <td>{{$u->email}}</td>
                                                <td>{{$u->phone}}</td>
                                                <td>
                                                    @if($u->status==1)
                                                    <span class="text-success">Active</span>
                                                    @else
                                                    <span class="text-danger">Deactive</span>
                                                    @endif
                                                </td>
                                                @if($check->page_edit == 1 || $check->page_delete == 1)
                                                <td>
                                                    <button class="btn btn-primary"
                                                        onclick="confirm_reset('{{$u->id}}')">Reset</button>
                                                </td>
                                                <td>
                                                    <a class="btn btn-warning text-white"
                                                        href="{{url('backend/admin/update_member/'.$u->id)}}"><i
                                                            class="fa fa-pencil-square-o"></i> Edit</a>
                                                    {{-- <button class="btn btn-danger"
                                                        onclick="confirm_delete('{{$u->id}}')">Delete</button> --}}
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

    @include('layout.script')
    <!-- form to reset password -->
    <form action="{{url('/backend/member_reset')}}" method="POST" id="reset_password">
        @csrf
        <input type="hidden" name="id" id="id_reset">
    </form>
    <!-- form delete -->
    <form action="{{url('backend/member_profile/delete')}}" method="POST" id="delete_form">
        @csrf
        <input type="hidden" name="id" id="delete_id2">
    </form>
    <script>
        $('#simpletable').dataTable();

        function confirm_reset(id) {
            Swal.fire({
                title: 'Are you sure to reset?',
                text: "Reset password:p123456",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {

                    $('#id_reset').val(id);
                    $('#reset_password').submit();
                }
            });
        }

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
