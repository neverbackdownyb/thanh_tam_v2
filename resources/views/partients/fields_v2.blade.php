
<style>
    @media  screen and (max-width: 800px) {
        input.form-control {
            width: auto;
        }

        select.form-control {
            width: auto;
        }
    }

</style>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Số điện thoại:') !!}
    <select class="select2 col-sm-12" id="phone" name="phone"></select>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Họ tên:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Birth Day Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birth_day', 'Ngày sinh:') !!}
    <input class="form-control" type="date" id="birth_day" name="birth_day">

{{--    {!! Form::number('birth_day', null, ['class' => 'form-control']) !!}--}}

</div>
<!-- Province Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('province_id', 'Thành phố:') !!}
    <select class="selectProvince col-sm-12" id="province_id" name="province_id" onchange="create.changeProvince()">
        @foreach($province as $item)
            <option {{--{!! $item->province_id == $provinceId ? 'selected' : '' !!}--}} value="{{ $item->province_id }}"> {!! $item->name !!}</option>
        @endforeach
    </select>
</div>

<!-- Province Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district_id', 'Quận Huyện:') !!}
    <select class="selectDistrict col-sm-12" id="district_id" name="district_id" onchange="create.changeDistrict()"> </select>
</div>

<!-- Province Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ward_id', 'Phường xã:') !!}
    <select class="selectWard col-sm-12" id="ward_id" name="ward_id">
    </select>
</div>

<!-- Province Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('diagnosis', 'Chuẩn Đoán') !!}
    {!! Form::text('diagnosis', null, ['class' => 'form-control']) !!}
</div>


<!-- Birth Day Field -->
<div class="form-group col-sm-6">
    {!! Form::label('schedule', 'Lịch hẹn tái khám:') !!}
    <input class="form-control" type="datetime-local" id="dateInput" name="schedule">
</div>

<div class="form-group col-sm-12 table-responsive">
    {!! Form::label('note', 'Điều trị:') !!}

    <table style="overflow-x:auto;" class="table table-bordered" name="selectedService[]">
        <thead>
        <tr>
            <th scope="col">Dịch vụ</th>
            <th scope="col">Giá tiền </th>
            <th scope="col">SL</th>
            <th scope="col">Tổng</th>
        </tr>
        </thead>
        <tbody class="append">
        <tr class="data-0">
            <th scope="row">
                <select id="service-0" class="form-control" name="service[]" onchange="changeService(0)">
                    <option>Chọn dịch vụ</option>
                    @foreach ($services as $item)
                        <option value="{{ $item->id }}"> {{ $item->name }} </option>
                    @endforeach
                </select>

                <div class="row" style="display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px; padding: 0 8px"
                >
                    <i style="flex: auto" class="fa fa-plus" aria-hidden="true" id="add-new-0" onclick="addNew(0)"></i>
                    <i class="fa fa-trash" aria-hidden="true" onclick="remove(0)"></i>
                </div>
            </th>
            <td>
                <input step="10000" id="price-0" type="number" name="price[]" class="form-control"
                       onchange="changePriceOrQuality(0)">
            </td>
            <td>
                <input id="quality-0" type="number" name="quality[]" class="form-control"
                       onchange="changePriceOrQuality(0)">
            </td>
            <td>
                <input readonly id="total-money-0" type="number" class="form-control">
            </td>

        </tr>
        </tbody>
    </table>
    <div class="summary form-group col-sm-4">
        <label>Tổng tiền : <b class="total-amount"></b></label>
        <input  id="summary" type="hidden" name="summary" value="" >
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('payment-type', 'Hình thức thanh toán:') !!}
        <select name="payment-type" id="payment-type" class="form-control">
            @foreach(\App\Models\Payments::$listPaymentType as $key => $item)
                <option value="{!! $key !!}">{!! $item !!}</option>
            @endforeach
        </select>
    </div>

    <!-- Province Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('total_paid', 'Số tiền đã Thanh Toán:') !!}
        {!! Form::number('total_paid', null, ['class' => 'form-control', 'onkeyup'=>"changeTotalPaid(this.value)"]) !!}
    </div>

    <!-- Province Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('remaining_amount', 'Số tiền còn nợ:') !!}
        {!! Form::number('remaining_amount', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Note Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('note', 'Ghi chú:') !!}
        {!! Form::text('note', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    </div>
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<script>
    $(document).ready(function() {
        $('.select2').select2({
            tags: true,
            tokenSeparators: [',', ' ']
        });

        $('.selectProvince').select2({
            tags: false,
        });

       $('.selectWard').select2({
            tags: false,
        });

        $('#phone').select2({
            placeholder: 'Nhập tên hoặc số điện thoại',
            ajax: {
                url: '/ajax-get-customer-by-phone',
                dataType: 'json',
                delay: 150,
                data: function(params) {
                    return {
                        phone: params.term
                    };
                },
                processResults: function(data) {
                    var users = data.map(function(user) {
                        return {
                            id: user.phone,
                            text: user.name,
                            phone: user.phone,
                            full_name: user.full_name,
                            birth_day: user.birth_day,
                            province_id : user.province_id,
                            district: user.district,
                            ward :user.ward
                        };
                    });
                    return {
                        results: users
                    };
                },
                cache: true
            },
            minimumInputLength: 2,
            maximumInputLength : 10,
            tags: true,
        });

        $('#district_id').select2({
            placeholder: 'Nhập tên quận huyện',
        })

        create.setProvince(10)
        create.getAllDistrict(10)

        $('#phone').on('select2:select', function(e) {
            var selectedUser = e.params.data;
            $('#name').val(selectedUser.full_name);

            if(typeof selectedUser.province_id != "undefined") {
                create.setProvince(selectedUser.province_id)
                create.getAllDistrict(selectedUser.province_id, selectedUser.district)
                create.getAllWard(selectedUser.district, selectedUser.ward)
            }
            $('#birth_day').val(selectedUser.birth_day);
        });

    });

    create = {
        setProvince(provinceId) {
            $('#province_id').val(provinceId);

            $('.selectProvince').select2({
                tags: false
            });
        },

        setDistrict(districtId) {
            $("#district_id").val(districtId)

            $('.selectDistrict').select2({
                tags: false
            });
        },

        setWard(wardId) {
            $("#ward_id").val(wardId)

            $('.selectWard').select2({
                tags: false
            });
        },

        changeProvince() {
            var provinceId= $('#province_id').val();
            $('#district_id').val(0);
            $('#ward_id').val(0);
            this.getAllDistrict(provinceId)
            this.changeDistrict();
        },

        changeDistrict() {
            var districtId= $('#district_id').val();
            this.getAllWard(districtId)
        },

        getAllDistrict(provinceId, districtId) {
            $.ajax( '{{ route('ajax_district_by_province') }}', {
                type: 'GET',
                data: {provinceId},
                success: function (response) {
                    // Xóa tất cả các option hiện tại
                    var districts = response;
                    var districtSelect = $('#district_id');

                    districtSelect.empty();
                    // Thêm các option mới từ danh sách quận huyện
                    for (var i = 0; i < districts.length; i++) {
                        districtSelect.append('<option value="' + districts[i].district_id + '">' + districts[i].name + '</option>');
                    }


                },
                complete: function() {
                    if(typeof districtId != "undefined") {
                        create.setDistrict(districtId)
                    } else {
                        var districtDefaultId = $('#district_id').val();
                        create.getAllWard(districtDefaultId)
                    }
                 }
            });
    }, getAllWard(district, ward) {
            $.ajax( '{{ route('ajax_get_all_ward_by_district') }}', {
                type: 'GET',
                data: {district},
                success: function (response) {
                    // Xóa tất cả các option hiện tại
                    var ward = response;
                    var wardSelect = $('#ward_id');
                    wardSelect.empty();
                    // Thêm các option mới từ danh sách quận huyện
                    for (var i = 0; i < ward.length; i++) {
                        wardSelect.append('<option value="' + ward[i].wards_id + '">' + ward[i].name + '</option>');
                    }
                },
                complete: function() {
                    if(typeof ward != "undefined") {
                        create.setWard(ward)
                    }
                 }
            });
    }
    }


    function addNew(currentId) {
        var id = currentId + 1;
        $.ajax(
            '/ajax-append-service', {
                type: 'GET',
                data: {id},
                success: function (res) {
                    $('.append').append(res.html);
                    $("#add-new-" + currentId).hide();
                },
                error: function (e) {
                    console.log(e);
                }
            });
    }
    function changeTotalPaid(total) {
        var totalRemaining = $('#summary').val() - total;
        $("#remaining_amount").val(totalRemaining)
    }

    function changePriceOrQuality(key) {
        var price = $('#quality-' + key).val();
        var quality = $('#price-' + key).val();
        $('#total-money-' + key).val(price * quality);
        calcTotalMoney();
    }
    function calcTotalMoney() {
        let sum = 0;
        for (let i = 0; i < 30; i++) {
            var summaryItem = $("#total-money-" + i).val();
            if(summaryItem) {
                sum += parseFloat(summaryItem);
            }
        }

        $(".total-amount").text(sum)
        $('#summary').val(sum);

        //Tính lại số tiền còn nợ
        var totalRemaining = $('#summary').val() - $('#total_paid').val();

        $('#remaining_amount').val(totalRemaining)
    }
    function changeService(key) {
        var id = $("#service-" + key).val();
        $.ajax(
            '/ajax-get-service-info', {
                type: 'GET',
                data: {id},
                success: function (res) {
                    $('#price-' + key).val(res.price);
                    $('#quality-' + key).val(1);

                    var price = $('#quality-' + key).val();
                    var quality = $('#price-' + key).val();

                    $('#total-money-' + key).val(price * quality);
                    calcTotalMoney();

                },
                error: function (e) {
                    console.log(e);
                }
            });

    }

    function remove(key) {
        $('.data-' + key).remove();
        calcTotalMoney();
    }



</script>
