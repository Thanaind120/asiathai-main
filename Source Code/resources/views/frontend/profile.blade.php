<!doctype html>
<html lang="th">
<head>
    <title>@lang('lang.poolvilla')</title>
    @include('frontend/inc_header')
    <link rel="stylesheet" href="{{ asset('assets_frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_frontend/css/owl.theme.default.min.css') }}">
    <script src="{{ asset('assets_frontend/js/owl.carousel.min.js') }}"></script>
    <?php $active[2]='active'; ?>
</head>
<body>
    @include('frontend/inc_navbar')
    <div class="bg-orange">
        {{-- <div class="clearfix"> --}}
            {{-- <div class="float-end width-search">
                <input class="form-control empty orange" type="text" id="iconified"
                    placeholder="&#xF002;  Where  are  you  looking for ?" aria-label="default input example">
            </div> --}}
        {{-- </div> --}}
    </div>
    <div class="bg-grey-2">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="none-mobile">
                        @include('frontend/inc_account')
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="mt-4"></div>
                    <div class="text-title text-grey text-bold mb-3">@lang('lang.user_detail')</div>
                    <div class="box-white">
                        <form method="POST" enctype="multipart/form-data"
                            action="{{ url(Session::get('lang').'/profile/id='.Auth::guard('member')->user()->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="col-sm-8">
                                <input type="hidden" value="{{ Auth::guard('member')->user()->id }}">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label text-bold text-tiny">@lang('lang.first_name')</label>
                                    <input type="text" class="form-control" id="firstname" placeholder=""
                                        name="firstname" value="{{ Auth::guard('member')->user()->firstname }}" maxlength="255">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label text-bold text-tiny">@lang('lang.last_name')</label>
                                    <input type="text" class="form-control" id="lastname" placeholder="" name="lastname"
                                        value="{{ Auth::guard('member')->user()->lastname }}" maxlength="255">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label text-bold text-tiny">@lang('lang.e_mail')</label>
                                    <input type="email" class="form-control" id="email" placeholder="" name="email"
                                        onblur="check_email(this)" value="{{ Auth::guard('member')->user()->email }}" maxlength="255">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label text-bold text-tiny">@lang('lang.phone_number')</label>
                                    <input type="text" class="form-control" id="phone" placeholder="" name="phone"
                                        onblur="check_phone(this)" value="{{ Auth::guard('member')->user()->phone }}" maxlength="255">
                                </div>
                            </div>
                            <div class="row g-1">
                                <div class="col-sm-4">
                                    {{-- <button class="btn-grey" data-bs-dismiss="modal">Cancel</button> --}}
                                    <a href="{{ url(Session::get('lang').'/profile') }}" class="btn btn-grey" data-bs-dismiss="modal"
                                        style="color:grey;border-radius: 15px;font-size: 12px;">@lang('lang.cancel')</a>
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="btn-search-booking">@lang('lang.save')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="text-title text-grey text-bold mt-4 mb-3">@lang('lang.payment_method')</div>
                    <div class="row mb-3">
                        @foreach ($payment as $key => $val)
                        <div class="col-sm-4 col-6">
                            <div class="box-white visa">
                                <div class="clearfix mb-2">
                                    <div class="float-start">
                                        <img class="visa-icon" src="{{ asset('assets_frontend/images/logo-visa.jpg') }}">
                                    </div>
                                    <div class="float-end">
                                        <a href="" class="text-tiny text-blue" data-bs-toggle="modal"
                                            data-bs-target="#edit-card"
                                            onclick="show_edit('{{$val->id}}','{{$val->credit_number}}','{{$val->credit_name}}','{{$val->credit_date}}','{{$val->credit_cvv}}')">@lang('lang.edit')</a>
                                    </div>
                                </div>
                                <div class="text-tiny text-grey">{{ $val->credit_number }}</div>
                                <div class="text-tiny text-grey">*{{ $val->credit_name }}*</div>
                                <div class="text-tiny text-grey">*{{ $val->credit_date }}*</div>
                                <div class="clearfix">
                                    <div class="float-end">
                                        <button class="text-red text-tiny btn-trach"
                                            onclick="delete_payment({{ $val->id }})">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Modal edit card-->
                                <div class="modal fade" id="edit-card" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <form method="POST" enctype="multipart/form-data"
                                        action="{{ url(Session::get('lang').'/profile/payment/id='.$val->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">@lang('lang.edit_credit_card')</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="">
                                                        <label for="exampleFormControlInput2"
                                                            class="form-label text-bold text-tiny">@lang('lang.creditanddebit_card_number')</label>
                                                        <input type="text" class="form-control"
                                                            id="card_number_for_edit" name="credit_number"
                                                            onblur="check_cards(this)" value="{{ $val->credit_number }}"
                                                            maxlength="19">
                                                        <!-- id for insert -->
                                                        <input type="hidden" name="id" id="id_for_edit">
                                                    </div>
                                                    <div class="">
                                                        <label for="exampleFormControlInput3"
                                                            class="form-label text-bold text-tiny">@lang('lang.card_holder_name')</label>
                                                        <input type="text" class="form-control" id="card_name_for_edit"
                                                            name="credit_name" value="{{ $val->credit_name }}"
                                                            maxlength="255">
                                                    </div>
                                                    <div class="">
                                                        <label for="exampleFormControlInput3"
                                                            class="form-label text-bold text-tiny">@lang('lang.expiry_date')</label>
                                                        <input type="text" class="form-control" id="card_date_for_edit"
                                                            name="credit_date" value="{{ $val->credit_date }}"
                                                            maxlength="7">
                                                    </div>
                                                    <div class="">
                                                        <label for="exampleFormControlInput3"
                                                            class="form-label text-bold text-tiny">@lang('lang.cvv')</label>
                                                        <input type="text" class="form-control" id="card_cvv_for_edit"
                                                            name="credit_cvv" value="{{ $val->credit_cvv }}"
                                                            maxlength="19">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="row g-1 justify-content-end">
                                                        <div class="col-sm-4">
                                                            {{-- <button class="btn-grey" data-bs-dismiss="modal"
                                                                id="reDirect">Cancel</button> --}}
                                                            <a href="{{ url(Session::get('lang').'/profile') }}" class="btn btn-grey"
                                                                data-bs-dismiss="modal"
                                                                style="color:grey;border-radius: 15px;font-size: 12px;">@lang('lang.cancel')</a>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <button type="submit"
                                                                class="btn-search-booking">@lang('lang.save')</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-sm-4 col-6">
                            <div class="box-white visa">
                                <a data-bs-toggle="modal" data-bs-target="#add-card">
                                    <div class="btn-add text-blue"><i class="fas fa-plus"></i></div>
                                    <div class="text-tiny text-blue text-center">@lang('lang.add_credit_card')</div>
                                </a>
                            </div>
                        </div>
                        <!-- Modal add card -->
                        <div class="modal fade" id="add-card" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <form method="POST" enctype="multipart/form-data" action="{{ url(Session::get('lang').'/profile/payment') }}">
                                @csrf
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">@lang('lang.add_credit_card')</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="">
                                                <label for="exampleFormControlInput2"
                                                    class="form-label text-bold text-tiny">@lang('lang.creditanddebit_card_number')</label>
                                                <input type="text" class="form-control" id="credit_number"
                                                    name="credit_number" maxlength="19" onblur="check_card(this)"
                                                    required>
                                            </div>
                                            <div class="">
                                                <label for="exampleFormControlInput3"
                                                    class="form-label text-bold text-tiny">@lang('lang.card_holder_name')</label>
                                                <input type="text" class="form-control" id="credit_name"
                                                    name="credit_name" maxlength="255" required>
                                            </div>
                                            <div class="">
                                                <label for="exampleFormControlInput3"
                                                    class="form-label text-bold text-tiny">@lang('lang.expiry_date')</label>
                                                <input type="text" class="form-control" id="credit_date"
                                                    name="credit_date" maxlength="7" required>
                                            </div>
                                            <div class="">
                                                <label for="exampleFormControlInput3"
                                                    class="form-label text-bold text-tiny">@lang('lang.cvv')</label>
                                                <input type="text" class="form-control" id="credit_cvv"
                                                    name="credit_cvv" maxlength="19" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="row g-1 justify-content-end">
                                                <div class="col-sm-4">
                                                    {{-- <button class="btn-grey" data-bs-dismiss="modal"
                                                        id="reDirect">Cancel</button> --}}
                                                    <a href="{{ url(Session::get('lang').'/profile') }}" class="btn btn-grey"
                                                        data-bs-dismiss="modal"
                                                        style="color:grey;border-radius: 15px;font-size: 12px;">@lang('lang.cancel')</a>
                                                </div>
                                                <div class="col-sm-4">
                                                    <button type="submit" class="btn-search-booking">@lang('lang.save')</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-title text-grey text-bold mb-3 mt-4">@lang('lang.change_password')</div>
                    <div class="box-white">
                        <form method="POST" enctype="multipart/form-data"
                            action="{{ url(Session::get('lang').'/profile/updated/id='.Auth::guard('member')->user()->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="col-sm-8">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label text-bold text-tiny">@lang('lang.current_password')</label>
                                    <input type="password" class="form-control" id="exampleFormControlInput1"
                                        placeholder="@lang('lang.current_password')" name="password_3" maxlength="255" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label text-bold text-tiny">@lang('lang.new_password')</label>
                                    <input type="password" class="form-control" id="exampleFormControlInput1"
                                        placeholder="@lang('lang.new_password')" name="password_1" maxlength="255" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label text-bold text-tiny">@lang('lang.confirm_new_password')</label>
                                    <input type="password" class="form-control" id="exampleFormControlInput1"
                                        placeholder="@lang('lang.confirm_new_password')" name="password_2" maxlength="255" required>
                                </div>
                            </div>
                            <div class="row g-1">
                                <div class="col-sm-4">
                                    {{-- <button class="btn-grey" data-bs-dismiss="modal" id="reDirect">Cancel</button> --}}
                                    <a href="{{ url(Session::get('lang').'/profile') }}" class="btn btn-grey" data-bs-dismiss="modal"
                                        style="color:grey;border-radius: 15px;font-size: 12px;">@lang('lang.cancel')</a>
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="btn-search-booking">@lang('lang.save')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="space-footer"></div>
                </div>
            </div>
        </div>
    </div>
    @include('frontend/inc_footer')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script type="text/javascript">
        $('#firstname').on('keypress', function (event) {
            var regex = new RegExp("^[ก-ฮๆไำะัี๊ฯุูึโ้็่๋าแิื์a-zA-Z]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });
        $('#lastname').on('keypress', function (event) {
            var regex = new RegExp("^[ก-ฮๆไำะัี๊ฯุูึโ้็่๋าแิื์a-zA-Z]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });

        function check_phone(inputtxt) {
            var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
            if (inputtxt.value.match(phoneno)) {
                return true;
            } else {
                alert('You have entered an incorrect phone number! Example xxx-xxx-0011');
                return false;
            }
        }
        $('#phone').on('keypress', function (event) {
            var regex = new RegExp("^[0-9-]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });

        function check_card(inputtxt) {
            var phoneno = /^\(?([0-9]{4})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
            if (inputtxt.value.match(phoneno)) {
                return true;
            } else {
                alert('You have entered an incorrect credit card number! Example xxxx-xxxx-xxxx');
                return false;
            }
        }
        $('#credit_number').on('keypress', function (event) {
            var regex = new RegExp("^[0-9-]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });

        function check_cards(inputtxt) {
            var phoneno = /^\(?([0-9]{4})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
            if (inputtxt.value.match(phoneno)) {
                return true;
            } else {
                alert('You have entered an incorrect credit card number! Example xxxx-xxxx-xxxx');
                return false;
            }
        }
        $('#card_number_for_edit').on('keypress', function (event) {
            var regex = new RegExp("^[0-9-]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });

        function check_email(elm) {
            var regex_email = /^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*\@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.([a-zA-Z]){2,4})$/
            if (!elm.value.match(regex_email)) {
                alert('You have entered an invalid email address!');
            } else {

            }
        }
        $('#email').on('keypress', function (event) {
            var regex = new RegExp("^[a-zA-Z0-9@.?-]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });

        function show_edit(id, credit_number, credit_name, credit_date, credit_cvv) {
            // ส่งค่าไปยัง input ด้วย id
            $('#id_for_edit').val(id);
            $('#card_number_for_edit').val(credit_number)
            $('#card_name_for_edit').val(credit_name)
            $('#card_date_for_edit').val(credit_date)
            $('#card_cvv_for_edit').val(credit_cvv)
        }

        function delete_payment(id) {

            swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: "DELETE",
                            url: "{!! url(Session::get('lang').'/profile/payment/delete/id=" + id + "') !!}",
                            data: {
                                '_token': "{{ csrf_token() }}"
                            },
                            success: function (data) {
                                console.log(data);
                                location.reload();
                            }
                        });
                    }
                });
        }

    </script>
</body>

</html>