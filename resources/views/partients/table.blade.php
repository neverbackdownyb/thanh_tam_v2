<div class="table-responsive">
    <table class="table" id="partients-table">
        <thead>
        <tr>
            <th>Phone</th>
        <th>Name</th>
        <th>Status</th>
        <th>Avatar</th>
        <th>Birth Day</th>
        <th>Province Id</th>
        <th>District</th>
        <th>Ward</th>
        <th>Note</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($partients as $partients)
            <tr>
                <td>{{ $partients->phone }}</td>
            <td>{{ $partients->name }}</td>
            <td>{{ $partients->status }}</td>
            <td>{{ $partients->avatar }}</td>
            <td>{{ $partients->birth_day }}</td>
            <td>{{ $partients->province_id }}</td>
            <td>{{ $partients->district }}</td>
            <td>{{ $partients->ward }}</td>
            <td>{{ $partients->note }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['partients.destroy', $partients->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('partients.show', [$partients->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('partients.edit', [$partients->id]) }}"
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
