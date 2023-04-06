<tr class="data-{{$id}}">
    <th scope="row">
        <select id="service-{{$id}}" class="form-control" name="service[]" onchange="changeService({{$id}})">
            <option>Chọn dịch vụ</option>
            @foreach ($services as $item)
                <option value="{{ $item->id }}"> {{ $item->name }} </option>
            @endforeach
        </select>
        <div class="row" style="display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;  padding: 0 8px">
            <i style="flex: auto" class="fa fa-plus" aria-hidden="true" id="add-new-{{$id}}" onclick="addNew({{$id}})"></i>
            <i class="fa fa-trash" aria-hidden="true" onclick="remove({{$id}})"></i>
        </div>
    </th>
    <td>
        <input id="price-{{$id}}" step="10000" type="number" name="price[]" class="form-control" onchange="changePriceOrQuality({{$id}})">
    </td>
    <td>
        <input id="quality-{{$id}}" type="number" name="quality[]" class="form-control"  onchange="changePriceOrQuality({{$id}})">
    </td>
    <td>
        <input id="total-money-{{$id}}" type="number" class="form-control">
    </td>
{{--    <td>--}}
{{--        <i class="fa fa-plus" aria-hidden="true" id="add-new-{{$id}}" onclick="addNew({{$id}})"></i>--}}
{{--        <i class="fa fa-trash" aria-hidden="true" onclick="remove({{$id}})"></i>--}}
{{--    </td>--}}
</tr>
