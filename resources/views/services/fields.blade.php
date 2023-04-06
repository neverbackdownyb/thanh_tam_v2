<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Tên dịch vụ:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Đơn giá:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Trạng thái:') !!}
    {!! Form::select('status', \App\Models\Services::$arrayStatus, null, ['class' => 'form-control']) !!}
</div>
