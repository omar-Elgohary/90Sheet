<div class="table-responsive text-nowrap">
    {{-- table content --}}
    <table class="table table-hover" id="tab">
        <thead>
            <tr>
                <th>
                    @if ($howWorks->count() > 0)
                        <div class="form-check form-check-danger">
                            <input class="form-check-input p-2" type="checkbox" id="checkedAll">
                        </div>
                    @endif
                </th>
                <th>{{__('admin.image')}}</th>
                <th>{{__('admin.address')}}</th>
                <th>{{__('admin.control')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($howWorks as $howWork)
                <tr class="delete_howWork">
                    <td class="text-center">
                        <div class="form-check form-check-danger">
                            <input class="form-check-input checkSingle" type="checkbox" value="" id="{{$howWork->id}}">
                        </div>
                    </td>
                    <td><img src="{{$howWork->image}}" width="50px" height="50px" alt=""></td>
                    <td>{{$howWork->title}}</td>
                    <td class="product-action">
                        <a class="btn rounded-pill btn-primary" href="{{route('admin.introhowworks.show' , ['id' => $howWork->id])}}"><i class="fa fa-eye"></i></a></span>
                        <a class="btn rounded-pill btn-primary" href="{{route('admin.introhowworks.edit' , ['id' => $howWork->id])}}"><i class="fa fa-edit"></i></a>
                        <span class="delete-row btn rounded-pill btn-danger" data-url="{{url('admin/introhowworks/'.$howWork->id)}}"><i class="fa fa-trash"></i></span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- table content --}}
    {{-- no data found div --}}
    @if ($howWorks->count() == 0)
        <x-admin.empty/>
    @endif
    {{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($howWorks->count() > 0 && $howWorks instanceof \Illuminate\Pagination\AbstractPaginator )
    <div class="d-flex justify-content-center mt-3">
        {{$howWorks->links()}}
    </div>
@endif
{{-- pagination  links div --}}