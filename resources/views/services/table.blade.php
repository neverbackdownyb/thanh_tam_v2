<div class="table-responsive">
    <table class="table" id="services-table">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Đơn giá</th>
            <th>Trạng thái</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($services as $key  => $services)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $services->name }}</td>
                <td>{{ number_format($services->price) }}</td>
                <td>{{ \App\Models\Services::$arrayStatus[$services->status] }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['services.destroy', $services->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('services.show', [$services->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('services.edit', [$services->id]) }}"
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
