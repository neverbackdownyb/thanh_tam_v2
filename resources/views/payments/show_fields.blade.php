<!-- Treatment Id Field -->
<div class="col-sm-12">
    {!! Form::label('treatment_id', 'Treatment Id:') !!}
    <p>{{ $payments->treatment_id }}</p>
</div>

<!-- Type Field -->
<div class="col-sm-12">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ $payments->type }}</p>
</div>

<!-- Total Money Field -->
<div class="col-sm-12">
    {!! Form::label('total_money', 'Total Money:') !!}
    <p>{{ $payments->total_money }}</p>
</div>

<!-- Note Field -->
<div class="col-sm-12">
    {!! Form::label('note', 'Note:') !!}
    <p>{{ $payments->note }}</p>
</div>

