<div class="table-responsive text-nowrap">
    {{-- table content --}}
    <table class="table table-hover" id="tab">
        <thead>
            <tr>
                <th>
                    @if ($sliders->count() > 0)
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
            @foreach($sliders as $slider)
                <tr class="delete_slider">
                    <td class="text-center">
                        <div class="form-check form-check-danger">
                            <input class="form-check-input checkSingle" type="checkbox" value="" id="{{$slider->id}}">
                        </div>
                    </td>
                    <td><img src="{{$slider->image}}" width="50px" height="50px" alt=""></td>
                    <td>{{$slider->title}}</td>
                    <td class="product-action">
                        <a class="btn rounded-pill btn-primary" href="{{route('admin.introsliders.show' , ['id' => $slider->id])}}"><i class="fa fa-eye"></i></a>
                        <a class="btn rounded-pill btn-primary" href="{{route('admin.introsliders.edit' , ['id' => $slider->id])}}"><i class="fa fa-edit"></i></a>
                        <span class="delete-row btn rounded-pill btn-danger" data-url="{{url('admin/introsliders/'.$slider->id)}}"><i class="fa fa-trash"></i></span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- table content --}}
    {{-- no data found div --}}
    @if ($sliders->count() == 0)
        <x-admin.empty/>
    @endif
    {{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($sliders->count() > 0 && $sliders instanceof \Illuminate\Pagination\AbstractPaginator )
    <div class="d-flex justify-content-center mt-3">
        {{$sliders->links()}}
    </div>
@endif
{{-- pagination  links div --}}