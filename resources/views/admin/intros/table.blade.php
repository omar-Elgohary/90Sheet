<div class="table-responsive text-nowrap">

    {{-- table content --}}
    <table class="table table-hover" id="tab">
        <thead>
            <tr>
                <th>
                    @if ($intros->count() > 0)
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
            @foreach($intros as $intro)
                <tr class="delete_intro">
                    <td class="text-center">
                        <div class="form-check form-check-danger">
                            <input class="form-check-input checkSingle" type="checkbox" value="" id="{{$intro->id}}">
                        </div>
                    </td>
                    <td><img src="{{$intro->image}}" width="50px" height="50px" alt=""></td>
                    <td>{{$intro->title}}</td>
                    <td class="product-action">
                       <a class="btn rounded-pill btn-primary m-2" href="{{route('admin.intros.show' , ['id' => $intro->id])}}"><i class="fa fa-eye"></i></a>
                        <a class="btn rounded-pill btn-primary m-2" href="{{route('admin.intros.edit' , ['id' => $intro->id])}}"><i class="fa fa-edit"></i></a>
                        <span class="delete-row btn rounded-pill btn-danger m-2" data-url="{{url('admin/intros/'.$intro->id)}}"><i class="fa fa-trash"></i></span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- table content --}}
    {{-- no data found div --}}
    @if ($intros->count() == 0)
        <x-admin.empty/>
    @endif
    {{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($intros->count() > 0 && $intros instanceof \Illuminate\Pagination\AbstractPaginator )
    <div class="d-flex justify-content-center mt-3">
        {{$intros->links()}}
    </div>
@endif
{{-- pagination  links div --}}