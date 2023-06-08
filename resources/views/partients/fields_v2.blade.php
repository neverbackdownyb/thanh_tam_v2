
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
    {!! Form::number('birth_day', null, ['class' => 'form-control']) !!}
</div>
<!-- Province Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('province_id', 'Địa chỉ:') !!}
    {!! Form::text('province_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Province Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('diagnosis', 'Chuẩn Đoán') !!}
    {!! Form::text('diagnosis', null, ['class' => 'form-control']) !!}
</div>


<!-- Birth Day Field -->
<div class="form-group col-sm-6">
    {!! Form::label('schedule', 'Lịch hẹn tái khám:') !!}
    {!! Form::text('schedule', null, ['class' => 'form-control']) !!}
</div>

@if(1== 2)
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
@endif
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

        $('#phone').select2({
            placeholder: 'Nhập số điện thoại',
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
                            id: user.id,
                            text: user.name,
                            full_name: user.full_name,
                            birth_day: user.birth_day,
                            province_id : user.province_id
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

        $('#phone').on('select2:select', function(e) {
            var selectedUser = e.params.data;
            $('#name').val(selectedUser.full_name);
            $('#province_id').val(selectedUser.province_id);
            $('#birth_day').val(selectedUser.birth_day);
        });
    });

    create = {
        changePhoneNumber(phone) {
            $.ajax('/ajax-get-customer-by-phone', {
                type: 'GET',
                data: {phone},
                success: function (res) {
                    var element = `<ul class="select2-results__options" role="listbox" id="select2-phone-results" aria-expanded="true" aria-hidden="false"><li class="select2-results__option select2-results__option--selectable select2-results__option--highlighted" role="option" data-select2-id="select2-data-77-o39p" aria-selected="true">3434</li></ul>`

                    $("#phone").append(element).append(res)

                },
                error: function (e) {

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
