<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
                        @if (!isset($discountrooms))
                        <h1 class="font-large-1">Create Discount Rooms</h1>
                        @else
                        <h1 class="font-large-1">Edit Discount Rooms</h1>
                        @endif
                    </div>
                    <div class="section-body">
                        <div class="card col-8">
                            <div class="card-body p-0">
                                @if (!isset($discountrooms))
                                <form action="{{ url('/backend/banner/discount-rooms/save/'.$banner->id) }}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $banner->id }}">
                                    <input type="hidden" name="type" value="1">
                                    @else
                                    <form
                                        action="{{ url('/backend/banner/discount-rooms/update/'.$banner->id.'/'.$discountrooms->id_roomdetails) }}"
                                        enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $banner->id }}">
                                        <input type="hidden" name="id_roomdetails"
                                            value="{{ $discountrooms->id_roomdetails }}">
                                        <input type="hidden" name="type" value="2">
                                        @endif
                                        <!-- form insert -->
                                        @if (!isset($discountrooms))
                                        <div class="form-group row ml-4 mt-5">
                                            <label for="" class="col-md-2 col-form-label">Poolvilla <font color="red">*</font> :</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="ref_poolvilla_id"
                                                    id="ref_poolvilla_id" required>
                                                    <option value="">Please select a pool villa</option>
                                                    @foreach ($poolvilla as $key => $val)
                                                    <option value="{{ $val->id }}">{{ $val->name_en }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4 mt-5">
                                            <label for="" class="col-md-2 col-form-label">Room <font color="red">*</font> :</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="ref_room_id" id="ref_room_id" required>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4 mt-5" style="display:none;">
                                            <label for="" class="col-md-2 col-form-label">Discount <font color="red">*</font> :</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="ref_discount_id"
                                                    id="ref_discount_id">
                                                </select>
                                                <select class="form-control" name="ref_start_date"
                                                    id="ref_start_date">
                                                </select>
                                                <select class="form-control" name="ref_end_date"
                                                    id="ref_end_date">
                                                </select>
                                            </div>
                                        </div>
                                        @else
                                        <!-- End : form insert -->
                                        <!-- form update -->
                                        <div class="form-group row ml-4 mt-5">
                                            <label for="" class="col-md-2 col-form-label">Poolvilla <font color="red">*</font> :</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="ref_poolvilla_id"
                                                    id="ref_poolvilla_id" required>
                                                    <option value="">Please select a pool villa</option>
                                                    @foreach ($poolvilla as $key => $val)
                                                    <option {{ ($discountrooms->ref_poolvilla_id == $val->id)? "selected" : "" }} value="{{ $val->id }}">{{ $val->name_en }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4 mt-5">
                                            <label for="" class="col-md-2 col-form-label">Room <font color="red">*</font> :</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="ref_room_id" id="ref_room_id" required>
                                                    <option value="">Please select a room</option>
                                                    @foreach ($room as $key => $val)
                                                    <option {{ ($discountrooms->ref_room_id == $val->id)? "selected" : "" }} value="{{ $val->id }}">{{ $val->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4 mt-5" style="display:none;">
                                            <label for="" class="col-md-2 col-form-label">Discount <font color="red">*</font> :</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="ref_discount_id" id="ref_discount_id">
                                                    @foreach ($discount as $key => $val)
                                                    <option {{ ($discountrooms->ref_discount_id == $val->id)? "selected" : "" }} value="{{ $val->id }}">{{ $val->id }}</option>
                                                    @endforeach
                                                </select>
                                                <select class="form-control" name="ref_start_date" id="ref_start_date">
                                                    @foreach ($discountSdate as $key => $val)
                                                    <option {{ ($discountrooms->ref_start_date == $val->start_date)? "selected" : "" }} value="{{ $val->start_date }}">{{ $val->start_date }}</option>
                                                    @endforeach
                                                </select>
                                                <select class="form-control" name="ref_end_date" id="ref_end_date">
                                                    @foreach ($discountEdate as $key => $val)
                                                    <option {{ ($discountrooms->ref_end_date == $val->end_date)? "selected" : "" }} value="{{ $val->end_date }}">{{ $val->end_date }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4 mt-5">
                                            <label class="col-md-2 col-form-label">Status :</label>
                                            <div class="col-md-10 mt-2">
                                                <div class="custom-control custom-switch">
                                                    @if (empty($discountrooms))
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch" name="status" value="1" checked>
                                                    @else
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch" name="status" value="1"
                                                        {{ @$discountrooms->status == '1' ? 'checked' : '' }}>
                                                    @endif
                                                    <label class="custom-control-label" for="customSwitch"> Active /
                                                        Deactive</label>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <!-- End : form update -->
                                        <div class="form-group mb-0 row">
                                            <div class="col-md-6">
                                                <a class="btn btn-secondary btn-sm waves-effect"
                                                    href="{{ url('/backend/admin/banner/discount-rooms/'.$banner->id) }}">
                                                    <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                                                </a>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <button type="submit" class="btn btn-success btn-sm waves-effect">
                                                    <i class="fa fa-save font-size-16 align-middle mr-1"></i>
                                                    @if (!isset($discountrooms))
                                                    Save
                                                    @else
                                                    Update
                                                    @endif
                                                </button>
                                            </div>
                                        </div><br>
                                        @if (!isset($discountrooms))
                                    </form>
                                    @else
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            @include('layout.footer')
        </div>
    </div>

    @include('layout.script')
    <script type="text/javascript">
        $('#ref_poolvilla_id').change(function () {
            var pid = $(this).val();
            if (pid) {
                $.ajax({
                    type: "GET",
                    url: "{!! url('/backend/banner/discount-rooms/getRoom/" + pid + "') !!}",
                    success: function (res) {
                        if (res) {
                            $("#ref_room_id").empty();
                            $("#ref_discount_id").empty();
                            $("#ref_start_date").empty();
                            $("#ref_end_date").empty();
                            $("#ref_room_id").append('<option>Please select a room</option>');
                            $.each(res, function (key, value) {
                                $("#ref_room_id").append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    }

                });
            }
        });

        $('#ref_room_id').change(function () {
            var rid = $(this).val();
            if (rid) {
                $.ajax({
                    type: "GET",
                    url: "{!! url('/backend/banner/discount-rooms/getDiscount/" + rid + "') !!}",
                    success: function (res) {
                        if (res) {
                            $("#ref_discount_id").empty();
                            $("#ref_start_date").empty();
                            $("#ref_end_date").empty();
                            $.each(res.discount, function (item, discount) {
                                $("#ref_discount_id").append('<option value="' + discount.id +
                                    '">' +
                                    discount.id + '</option>');
                                $("#ref_start_date").append('<option value="' + discount.start_date + '">' +
                                    discount.start_date + '</option>');
                                $("#ref_end_date").append('<option value="' + discount.end_date + '">' +
                                    discount.end_date + '</option>');
                            });
                        }
                    }
                });
            }
        });

    </script>

</body>

</html>
