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
                        <h1>Pool Villa Manage</h1>
                    </div>

                    <div class="section-body">

                        <div class="card">
                            @if($check->page_create == 1)
                            <div class="card-header">
                                <!-- add user button -->
                                <div class="text-right">
                                    <a class="btn btn-success "
                                        href="{{url('backend/admin/add_poolvilla/'.$user->id)}}"><i
                                            class="fa fa-plus"></i> add</a>
                                </div><br>
                            </div>
                            @endif
                            <div class="card-body ">
                                <div class="table-responsive">
                                    <table id="simpletable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col" class="text-center"><i class="fa fa-hotel"></i> Pool
                                                    Villa Name</th>
                                                <th scope="col" class="text-center"><i class="fa fa-home"></i> Max Guest
                                                </th>
                                                <th scope="col" class="text-center"><i class="fa fa-home"></i> Bedrooms
                                                </th>
                                                <th scope="col" class="text-center"><i class="fa fa-check"></i> Status
                                                </th>
                                                <!-- <th scope="col"><i class="fa fa-hotel"></i> Description</th> -->
                                                @if($check->page_edit == 1 || $check->page_delete == 1)
                                                <th scope="col" class="text-center"><i class="fa fa-cog"></i> Tools</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($poolvilla as $key=>$poolvilla)
                                            <tr>
                                                <td class="text-center">{{$key+1}}</td>
                                                <td class="text-center">{{$poolvilla->hotel_name}}</td>
                                                <td class="text-center">{{$poolvilla->max_guest}}</td>
                                                <td class="text-center">{{$poolvilla->bedrooms}}</td>
                                                <td class="text-center">
                                                    @if($poolvilla->status==1)
                                                    <span class="text-success">Active</span>
                                                    @else
                                                    <span class="text-danger">Deactive</span>
                                                    @endif
                                                </td>
                                                @if($check->page_edit == 1 || $check->page_delete == 1)
                                                <td class="text-center">
                                                    @if($check->page_edit == 1)
                                                    <form method="post"
                                                        action="{{url('backend/manage_poolvilla_pages')}}">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$poolvilla->id}}">
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <select name="poovilla_manage_type"
                                                                    class="form-control">
                                                                    <option disabled selected>Select</option>
                                                                    <option value="1">Manage Image</option>
                                                                    <option value="2">Manage Description(EN)</option>
                                                                    <option value="7">Manage Description(TH)</option>
                                                                    <option value="3">More about Poolvilla</option>
                                                                    <option value="4">Q&A Poolvilla</option>
                                                                    <option value="5">Manage House</option>
                                                                    <option value="6">Reserve List</option>

                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <button type="submit"
                                                                    class="btn btn-secondary">Go</button>
                                                            </div>
                                                        </div>
                                                    </form>
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

    @include('layout.script')
    <!-- form to reset password -->
    <form action="{{url('/backend/member_reset')}}" method="POST" id="reset_password">
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
