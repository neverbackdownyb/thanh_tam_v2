@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lịch sử thanh toán</h1>
                    <h7>Bệnh nhân: {{ $partients->name }}</h7>
                    <br>
                    <h7>Số điện thoại: {{ $partients->phone }}</h7>
                    <br>
                    <h7>Tổng tiền phải trả: {{  number_format($totalAmount) }} đ</h7>
                    <br>
                    <h7>Tổng tiền đã trả: {{  number_format($totalPaid) }} đ</h7>
                    <br>
                    <h7>Còn nợ: {{  number_format($totalAmount - $totalPaid) }} đ</h7>
                    <br>
                    <br>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('partients.index') }}">
                        Back
                    </a>
                </div>

                <div class="col-sm-6">
                    <a class="btn btn-primary float-left"   data-toggle="modal" data-target="#exampleModal">
                        Thêm mới
                    </a>

                </div>
            </div>
        </div>

    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('partients.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection

<input type="hidden" value="{{ $partients->id }}" id="partientId">
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thanh toán mới</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group col-sm-12">
                    {!! Form::label('Lần khám', 'Lần điều trị:') !!}
                    <select name="diagnosis" id="diagnosis" class="form-control">
                    @foreach($diagnosis as $key => $item)
                            <option value="{!! $item->id !!}">{!! $item->name !!}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-sm-12">
                    {!! Form::label('payment-type', 'Hình thức thanh toán:') !!}
                    <select name="payment-type" id="payment-type" class="form-control">
                        @foreach(\App\Models\Payments::$listPaymentType as $key => $item)
                            <option value="{!! $key !!}">{!! $item !!}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Province Id Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('total_paid', 'Số tiền Thanh Toán:') !!}
                    {!! Form::number('total_paid', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Province Id Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('note', 'Ghi chú:') !!}
                    {!! Form::text('note', null, ['class' => 'form-control']) !!}
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" onclick="addNewPayment()">Lưu lại</button>
            </div>
        </div>
    </div>
</div>

<script>
    function addNewPayment() {
        var totalPaid = $('#total_paid').val();
        if (totalPaid.length == 0) {
            alert('Vui lòng nhập vào số tiền cần thanh toán')
            return;
        }
        var note = $('#note').val();
        var paymentType = $('#payment-type').val();
        var diagnosisId = $('#diagnosis').val();
        var partientId = $('#partientId').val();

        if (partientId.length == 0) {
            alert('Thông tin bệnh nhân chưa đúng. Vui lòng kiểm tra lại')
            return;
        }

        $.ajax(
            '/ajax-add-payment', {
                type: 'GET',
                data: {diagnosisId, paymentType, note, partientId, totalPaid},
                success: function (res) {
                    if (res.status) {
                        location.reload();
                    } else {
                        alert(res.message)
                    }
                },
                error: function (e) {
                    console.log(e);
                }
            });

    }

</script>
