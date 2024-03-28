<div class="table-responsive text-nowrap">
    {{-- table content --}}
    <table class="table table-hover" id="tab">
        <thead>
            <tr>
                <th>
                    @if ($cities->count() > 0)
                        <div class="form-check form-check-danger">
                            <input class="form-check-input p-2" type="checkbox" id="checkedAll">
                        </div>
                    @endif
                </th>
                <th>{{__('admin.date')}}</th>
                <th>{{__('admin.name')}}</th>
                <th>{{__('admin.region')}}</th>
                <th>{{__('admin.control')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cities as $city)
                <tr class="delete_city">
                    <td class="text-center">
                        <div class="form-check form-check-danger">
                            <input class="form-check-input checkSingle" type="checkbox" value="" id="{{$city->id}}">
                        </div>
                    </td>
                    <td>{{\Carbon\Carbon::parse($city->created_at)->format('d/m/Y')}}</td>
                    <td>{{$city->name}}</td>
                    <td>{{$city->region->name}}</td>
                    <td class="product-action">
                        <a class="btn rounded-pill btn-primary m-2" href="{{route('admin.cities.show' , ['id' => $city->id])}}"><i class="fa fa-eye"></i></a>
                        <a class="btn rounded-pill btn-primary m-2" href="{{route('admin.cities.edit' , ['id' => $city->id])}}"><i class="fa fa-edit"></i></a>
                        <span class="delete-row btn rounded-pill btn-danger m-2" data-url="{{url('admin/cities/'.$city->id)}}"><i class="fa fa-trash"></i></span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- table content --}}
    {{-- no data found div --}}
    @if ($cities->count() == 0)
        <x-admin.empty/>
    @endif
    {{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($cities->count() > 0 && $cities instanceof \Illuminate\Pagination\AbstractPaginator )
    <div class="d-flex justify-content-center mt-3">
        {{$cities->links()}}
    </div>
@endif
{{-- pagination  links div --}}