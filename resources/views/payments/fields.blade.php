<!-- Treatment Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('treatment_id', 'Treatment Id:') !!}
    {!! Form::number('treatment_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::number('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Money Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_money', 'Total Money:') !!}
    {!! Form::number('total_money', null, ['class' => 'form-control']) !!}
</div>

<!-- Note Field -->
<div class="form-group col-sm-6">
    {!! Form::label('note', 'Note:') !!}
    {!! Form::text('note', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>