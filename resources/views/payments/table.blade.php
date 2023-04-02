<div class="table-responsive">
    <table class="table" id="payments-table">
        <thead>
        <tr>
            <th>Treatment Id</th>
        <th>Type</th>
        <th>Total Money</th>
        <th>Note</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($payments as $payments)
            <tr>
                <td>{{ $payments->treatment_id }}</td>
            <td>{{ $payments->type }}</td>
            <td>{{ $payments->total_money }}</td>
            <td>{{ $payments->note }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['payments.destroy', $payments->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('payments.show', [$payments->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('payments.edit', [$payments->id]) }}"
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
