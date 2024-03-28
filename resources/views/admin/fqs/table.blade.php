<div class="table-responsive text-nowrap">

    {{-- table content --}}
    <table class="table table-hover" id="tab">
        <thead>
            <tr>
                <th>
                    @if ($fqss->count() > 0)
                        <div class="form-check form-check-danger">
                            <input class="form-check-input p-2" type="checkbox" id="checkedAll">
                        </div>
                    @endif
                </th>
                <th>{{__('admin.question')}}</th>
                <th>{{__('admin.control')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fqss as $fqs)
                <tr class="delete_fqs">
                    <td class="text-center">
                        <div class="form-check form-check-danger">
                            <input class="form-check-input checkSingle" type="checkbox" value="" id="{{$fqs->id}}">
                        </div>
                    </td>
                    <td>{{$fqs->question}}</td>
                    <td class="product-action">
                        <a class="btn rounded-pill btn-primary  m-2" href="{{route('admin.fqs.show' , ['id' => $fqs->id])}}"><i class="fa fa-eye"></i></a>
                        <a class="btn rounded-pill btn-primary  m-2" href="{{route('admin.fqs.edit' , ['id' => $fqs->id])}}"><i class="fa fa-edit"></i></a>
                        <span class="delete-row btn rounded-pill  btn-danger m-2" data-url="{{url('admin/fqs/'.$fqs->id)}}"><i class="fa fa-trash"></i></span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- table content --}}
    {{-- no data found div --}}
    @if ($fqss->count() == 0)
        <x-admin.empty/>
    @endif
    {{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($fqss->count() > 0 && $fqss instanceof \Illuminate\Pagination\AbstractPaginator )
    <div class="d-flex justify-content-center mt-3">
        {{$fqss->links()}}
    </div>
@endif
{{-- pagination  links div --}}