<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $diagnosis->name }}</p>
</div>

<!-- Dentist Field -->
<div class="col-sm-12">
    {!! Form::label('dentist', 'Dentist:') !!}
    <p>{{ $diagnosis->dentist }}</p>
</div>

<!-- Note Field -->
<div class="col-sm-12">
    {!! Form::label('note', 'Note:') !!}
    <p>{{ $diagnosis->note }}</p>
</div>

<!-- Total Amount Field -->
<div class="col-sm-12">
    {!! Form::label('total_amount', 'Total Amount:') !!}
    <p>{{ $diagnosis->total_amount }}</p>
</div>

<!-- Total Paid Field -->
<div class="col-sm-12">
    {!! Form::label('total_paid', 'Total Paid:') !!}
    <p>{{ $diagnosis->total_paid }}</p>
</div>

<!-- Patient Id Field -->
<div class="col-sm-12">
    {!! Form::label('patient_id', 'Patient Id:') !!}
    <p>{{ $diagnosis->patient_id }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $diagnosis->status }}</p>
</div>

