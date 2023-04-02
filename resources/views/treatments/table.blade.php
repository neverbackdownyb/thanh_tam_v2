<div class="table-responsive">
    <table class="table" id="treatments-table">
        <thead>
        <tr>
            <th>Diagnosis Id</th>
        <th>Cure</th>
        <th>Unit Price</th>
        <th>Quality</th>
        <th>Discount</th>
        <th>Total Amount</th>
        <th>Note</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($treatments as $treatments)
            <tr>
                <td>{{ $treatments->diagnosis_id }}</td>
            <td>{{ $treatments->cure }}</td>
            <td>{{ $treatments->unit_price }}</td>
            <td>{{ $treatments->quality }}</td>
            <td>{{ $treatments->discount }}</td>
            <td>{{ $treatments->total_amount }}</td>
            <td>{{ $treatments->note }}</td>
            <td>{{ $treatments->status }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['treatments.destroy', $treatments->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('treatments.show', [$treatments->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('treatments.edit', [$treatments->id]) }}"
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
