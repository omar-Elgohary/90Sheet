<div class="table-responsive text-nowrap">

    {{-- table content --}}
    <table class="table table-hover" id="tab">
        <thead>
            <tr>
                <th>
                    @if ($countries->count() > 0)
                        <div class="form-check form-check-danger">
                            <input class="form-check-input p-2" type="checkbox" id="checkedAll">
                        </div>
                    @endif
                </th>
                <th>{{ __('admin.image') }}</th>
                <th>{{ __('admin.name') }}</th>
                <th>{{ __('admin.country_code') }}</th>
                <th>{{ __('admin.control') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($countries as $country)
                <tr>
                    <td class="text-center">
                        <div class="form-check form-check-danger">
                            <input class="form-check-input checkSingle" type="checkbox" value="" id="{{$country->id}}">
                        </div>
                    </td>
                    <td><img width="50" height="50" src="{{$country->image}}" alt=""></td>
                    <td>{{$country->name}}</td>
                    <td>{{$country->key}}</td>
                    <td class="product-action">
                        <a class="btn rounded-pill btn-primary m-2" href="{{route('admin.countries.show' , ['id' => $country->id])}}"><i class="fa fa-eye"></i></a>
                        <a class="btn rounded-pill btn-primary m-2" href="{{route('admin.countries.edit' , ['id' => $country->id])}}"><i class="fa fa-edit"></i></a>
                        <span class="delete-row btn rounded-pill btn-danger m-2" data-url="{{url('admin/countries/'.$country->id)}}"><i class="fa fa-trash"></i></span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- table content --}}
    {{-- no data found div --}}
    @if ($countries->count() == 0)
        <x-admin.empty/>
    @endif
    {{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($countries->count() > 0 && $countries instanceof \Illuminate\Pagination\AbstractPaginator )
    <div class="d-flex justify-content-center mt-3">
        {{$countries->links()}}
    </div>
@endif
{{-- pagination  links div --}}