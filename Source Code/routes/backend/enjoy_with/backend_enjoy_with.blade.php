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
                        <h1>Enjoy With</h1>
                    </div>

                    <div class="section-body">

                        <div class="card">
                            @if($check->page_create == 1)
                            <div class="card-header">
                                <!-- add user button -->
                                <div class="text-right">
                                    <a href="{{url('backend/enjoy_with/add')}}" class="btn btn-success "><i
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
                                                <th scope="col"><i class="fa fa-flag"></i> Enjoy with Name</th>
                                                <th scope="col"><i class="far fa-image"></i> Enjoy with Image</th>
                                                @if($check->page_edit == 1 || $check->page_delete == 1)
                                                <th scope="col"><i class="fa fa-cog"></i> Tools</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($i = 1)
                                            @foreach($enjoy as $row)
                                            <tr>
                                                <td style="width: 10%">{{ $i }}</td>
                                                <td style="width: 35%">{{ $row->enjoy_name }}</td>
                                                <td style="width: 35%">
                                                    <img src="{{ asset('frontend_assets/enjoy_image/'.$row->enjoy_image) }}"
                                                        height="150px" alt="">
                                                </td>
                                                @if($check->page_edit == 1 || $check->page_delete == 1)
                                                <td style="width: 20%">
                                                    @if($check->page_edit == 1)
                                                    <a class="btn btn-warning text-white"
                                                        href="{{url('backend/country/enjoy_with/edit/'.$row->enjoy_id)}}"><i
                                                            class="fa fa-pencil-square-o"></i> Edit</a>
                                                    @endif
                                                    @if($check->page_delete == 1)
                                                    <a class="btn btn-danger text-white"
                                                        href="{{url('backend/country/enjoy_with/delete/'.$row->enjoy_id)}}"><i
                                                            class="fa fa-pencil-square-o"></i> Delete</a>
                                                    @endif
                                                </td>
                                                @endif
                                            </tr>
                                            @php($i++)
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
