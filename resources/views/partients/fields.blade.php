<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Họ Tên:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Số điện thoại:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Birth Day Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birth_day', 'Ngày Sinh:') !!}
    {!! Form::date('birth_day', $partients->birth_day, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Province Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('province_id', 'Thành Phố:') !!}
    {!! Form::number('province_id', null, ['class' => 'form-control']) !!}
</div>

<!-- District Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district', 'Quận/Huyện:') !!}
    {!! Form::number('district', null, ['class' => 'form-control']) !!}
</div>

<!-- Ward Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ward', 'Xã:') !!}
    {!! Form::number('ward', null, ['class' => 'form-control']) !!}
</div>

<!-- Note Field -->
<div class="form-group col-sm-6">
    {!! Form::label('note', 'Địa chỉ:') !!}
    {!! Form::text('note', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>
