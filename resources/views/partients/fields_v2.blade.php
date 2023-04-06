<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Họ tên:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Số điện thoại:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
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


<div class="form-group col-sm-12">
    {!! Form::label('note', 'Điều trị:') !!}

    <table class="table table-bordered" name="selectedService[]">
        <thead>
        <tr>
            <th scope="col">Dịch vụ</th>
            <th scope="col">Giá tiền</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Tổng tiền</th>
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
            <td>
                <i class="fa fa-plus" aria-hidden="true" id="add-new-0" onclick="addNew(0)"></i>
                <i class="fa fa-trash" aria-hidden="true" onclick="remove(0)"></i>
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
