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
                        <h1><a href="{{ url('backend/admin/banner') }}">Banner</a> > Discount Rooms</h1>
                    </div>
                    <div class="section-body">
                        <div class="card">
                            @if($check->page_create == 1)
                            <div class="card-header">
                                <!-- add user button -->
                                <div class="text-right">
                                    <a class="btn btn-success" href="{{ url('backend/banner/discount-rooms/add/'.$banner->id) }}"><i
                                            class="fa fa-image"></i> add</a>
                                </div><br>
                            </div>
                            @endif
                            <div class="card-body ">
                                <div class="table-responsive">
                                    <table id="simpletable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col" class="text-center"><i class="fa fa-user"></i> Poolvilla
                                                </th>
                                                <th scope="col" class="text-center"><i class="fa fa-home"></i> Room
                                                </th>
                                                <th scope="col" class="text-center"><i class="fa fa-calendar"></i> start date
                                                </th>
                                                <th scope="col" class="text-center"><i class="fa fa-calendar"></i> end date
                                                </th>
                                                <th scope="col" class="text-center"><i class="fa fa-check"></i> Status</th>
                                                @if($check->page_edit == 1 || $check->page_delete == 1)
                                                <th scope="col" class="text-center"><i class="fa fa-cog "></i> Tools
                                                </th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($discountrooms as $key=>$b)
                                            <tr>
                                                <td class="text-center">{{ $key+1 }}</td>
                                                <td class="text-center">{{ $b->name_en }}</td>
                                                <td class="text-center">{{ $b->name }}</td>
                                                <td class="text-center">{{ $b->ref_start_date }}</td>
                                                <td class="text-center">{{ $b->ref_end_date }}</td>
                                                <td class="text-center">
                                                    @if($b->status == 1)
                                                    <span class="text-success">Active</span>
                                                    @else
                                                    <span class="text-danger">Deactive</span>
                                                    @endif
                                                </td>
                                                @if($check->page_edit == 1 || $check->page_delete == 1)
                                                <td class="text-center">
                                                    @if($check->page_edit == 1)
                                                    <a class="btn btn-warning"
                                                        href="{{ url('backend/banner/discount-rooms/edit/'.$banner->id.'/'.$b->id_roomdetails) }}">Edit</a>
                                                    @endif
                                                    @if($check->page_delete == 1)
                                                    <button class="btn btn-danger"
                                                        onclick="confirm_delete('{{ $b->id_roomdetails }}')">Delete</button>
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
                </section>
            </div>
        </div>
        @include('layout.footer')
    </div>
    @include('layout.script')
    <!-- form delete -->
    <form action="{{ url('backend/banner/discount-rooms/delete/'.$banner->id) }}" method="POST" id="delete_form">
        @csrf
        <input type="hidden" name="id" id="delete_id2">
    </form>
    <script>
        $('#simpletable').dataTable();

        function confirm_delete(id) {
            Swal.fire({
                title: 'Are you sure to delete?',
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
