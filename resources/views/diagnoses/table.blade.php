<div class="table-responsive">
    <table class="table" id="diagnoses-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Dentist</th>
        <th>Note</th>
        <th>Total Amount</th>
        <th>Total Paid</th>
        <th>Patient Id</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($diagnoses as $diagnosis)
            <tr>
                <td>{{ $diagnosis->name }}</td>
            <td>{{ $diagnosis->dentist }}</td>
            <td>{{ $diagnosis->note }}</td>
            <td>{{ $diagnosis->total_amount }}</td>
            <td>{{ $diagnosis->total_paid }}</td>
            <td>{{ $diagnosis->patient_id }}</td>
            <td>{{ $diagnosis->status }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['diagnoses.destroy', $diagnosis->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('diagnoses.show', [$diagnosis->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('diagnoses.edit', [$diagnosis->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
