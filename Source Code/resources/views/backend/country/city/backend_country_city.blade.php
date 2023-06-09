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
                        <h1>Country : {{ $country[0]->country_name }}</h1>
                    </div>

                    <div class="section-body">

                        <div class="card">
                            @if($check->page_create == 1)
                            <div class="card-header">
                                <!-- add user button -->
                                <div class="text-right">
                                    <a href="{{url('backend/country/city/add/'.$country[0]->country_id)}}"
                                        class="btn btn-success "><i class="fa fa-plus"></i> add</a>
                                </div><br>
                            </div>
                            @endif
                            <div class="card-body ">
                                <div class="table-responsive">
                                    <table id="simpletable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col"><i class="fa fa-flag"></i> City Name</th>
                                                <th scope="col"><i class="far fa-image"></i> City Image</th>
                                                @if($check->page_edit == 1 || $check->page_delete == 1)
                                                <th scope="col"><i class="fa fa-cog"></i> Tools</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($i = 1)
                                            @foreach($city as $row)
                                            <tr>
                                                <td style="width: 10%">{{ $i }}</td>
                                                <td style="width: 35%">{{ $row->name_en }}</td>
                                                <td style="width: 35%">
                                                    <img src="{{ asset('frontend_assets/city_image/'.$row->city_image) }}"
                                                        height="150px" alt="">
                                                </td>
                                                @if($check->page_edit == 1 || $check->page_delete == 1)
                                                <td style="width: 20%">
                                                    @if($check->page_edit == 1)
                                                    <a class="btn btn-warning text-white"
                                                        href="{{url('backend/country/city/edit/'.$row->code)}}"><i
                                                            class="fa fa-pencil-square-o"></i> Edit</a>
                                                    @endif
                                                    @if($check->page_delete == 1)
                                                    <button class="btn btn-danger text-white"
                                                      type="button" onclick="confirm_delete('{{$row->code}}')"><i
                                                            class="fa fa-pencil-square-o"></i> Delete</button>
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
                    window.location ="{{url('backend/country/city/delete')}}/"+id;
                }
            });
        }

    </script>
</body>

</html>
