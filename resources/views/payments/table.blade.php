<div class="table-responsive">
    <table class="table" id="payments-table">
        <thead>
        <tr>
            <th>STT</th>
            <th>Họ tên</th>
            <th>Tồng tiền</th>
            <th>Hình thức</th>
            <th>Thời gian</th>
        </tr>
        </thead>
        <tbody>
        @foreach($payments as $key => $item)
            <tr>
                <td> {{ $key + 1 }}</td>
                <td>{{ $item->patient->name }}</td>
                <td>{{ number_format($item->total_money) }}</td>
                <td>{{ \App\Models\Payments::$listPaymentType[$item->type] }}</td>
                <td>{{ $item->created_at }}</td>
                {{--  <td width="120">
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
                  </td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
