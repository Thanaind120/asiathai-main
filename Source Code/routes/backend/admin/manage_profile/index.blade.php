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
                        <h1>Admin Account Manage</h1>
                    </div>

                    <div class="section-body">

                        <div class="card">
                            @if($check->page_create == 1)
                            <div class="card-header">
                                <!-- add user button -->
                                <div class="text-right">
                                    <a href="{{url('backend/admin/add-admin')}}" class="btn btn-success "><i
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
                                                <th scope="col"><i class="fa fa-user"></i> Name</th>
                                                <th scope="col"><i class="fa fa-envelope"></i> Email</th>
                                                <th scope="col"><i class="fa fa-user"></i> Position</th>
                                                <th scope="col"><i class="fa fa-check"></i> Status</th>
                                                @if($check->page_edit == 1 || $check->page_delete == 1)
                                                <th scope="col"><i class="fa fa-key"></i> Password</th>
                                                <th scope="col"><i class="fa fa-cog"></i> Tools</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($user as $key=>$u)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$u->name}}</td>
                                                <td>{{$u->email}}</td>

                                                <td>@if($u->position == 2)
                                                    Admin
                                                    @endif
                                                    @if($u->position == 1)
                                                    Super Admin
                                                    @endif
                                                </td>
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
                                                        href="{{url('backend/admin/update_profile/'.$u->id)}}"><i
                                                            class="fa fa-pencil-square-o"></i> Edit</a>  
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
    <form action="{{url('/backend/admin_reset')}}" method="POST" id="reset_password">
        @csrf
        <input type="hidden" name="id" id="id_reset">
    </form>
    <script>
        $('#simpletable').dataTable();

        function confirm_reset(id) {
            Swal.fire({
                title: 'Are you sure to reset?',
                text: "Reset password:m123456",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    //   $('#form_del').attr('action',get_path);
                    $('#id_reset').val(id);
                    $('#reset_password').submit();
                }
            });
        }

    </script>

</body>

</html>
