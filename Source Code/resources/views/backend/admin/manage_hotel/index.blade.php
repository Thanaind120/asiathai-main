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
                        <h1>Partner Account Manage</h1>
                    </div>

                    <div class="section-body">

                        <div class="card">
                            @if($check->page_create == 1)
                            <div class="card-header">
                                <!-- add user button -->
                                <div class="text-right">
                                    <a href="{{url('backend/admin/add-hotel')}}" class="btn btn-success "><i
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
                                                <th scope="col"><i class="fa fa-user text-center"></i> Name</th>
                                                <th scope="col"><i class="fa fa-envelope text-center"></i> Email</th>
                                                <th scope="col"><i class="fa fa-address text-center"></i> Address</th>
                                                <th scope="col"><i class="fa fa-address text-center"></i> Tel.</th>
                                                <th scope="col"><i class="fa fa-check text-center"></i> Status</th>
                                                @if($check->page_edit == 1)
                                                <th scope="col"><i class="fa fa-key text-center"></i> Password</th>
                                                @endif
                                                @if($check->page_edit == 1 || $check->page_view == 1 || $check->page_delete == 1)
                                                <th class="text-center"><i class="fa fa-cog "></i> Tools</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($user as $key=>$u)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$u->firstname}} {{$u->lastname}}</td>
                                                <td>{{$u->email}}</td>
                                                <td>{{$u->address}}</td>
                                                <td>{{$u->phone_number}}</td>
                                                <td>
                                                    @if($u->status==1)
                                                    <span class="text-success">Active</span>
                                                    @else
                                                    <span class="text-danger">Deactive</span>
                                                    @endif
                                                </td>
                                                @if($check->page_edit == 1)
                                                <td class="text-center">    
                                                    <button class="btn btn-primary "
                                                        onclick="confirm_reset('{{$u->id}}')">Reset</button>
                                                </td>
                                                @endif
                                                @if($check->page_edit == 1 || $check->page_view == 1 || $check->page_delete == 1)
                                                <td class="text-center">
                                                    @if($check->page_edit == 1)
                                                    <a class="btn btn-warning text-white"
                                                        href="{{url('backend/admin/update_hotel/'.$u->id)}}"> Edit <i
                                                            class="fa fa-user"></i></a>
                                                    @endif
                                                    @if($check->page_view == 1)
                                                    <a class="btn btn-info text-white"
                                                        href="{{url('backend/admin/hotel/'.$u->id)}}"> Pool Villa<i
                                                            class="fa fa-hotel"></i></a>
                                                    @endif
                                                    {{-- <form action="post">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <select name="MangePage" class="form-control" required>
                                                                    <option disabled selected>Select</option>
                                                                    <option value="1">Edit Profile</option>
                                                                    <option value="2">Edit Pool Villa</option>
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Go</button>
                                                            </div>
                                                        </div>
                                                    </form> --}}
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
    <form action="{{url('/backend/hotel_reset')}}" method="POST" id="reset_password">
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

                    $('#id_reset').val(id);
                    $('#reset_password').submit();
                }
            });
        }

    </script>
</body>

</html>
