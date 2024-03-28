<div class="table-responsive text-nowrap">
    {{-- table content --}}
    <table class="table table-hover" id="tab">
        <thead>
            <tr>
                <th>
                    @if ($socials->count() > 0)
                        <div class="form-check form-check-danger">
                            <input class="form-check-input p-2" type="checkbox" id="checkedAll">
                        </div>
                    @endif
                </th>
                <th>{{__('admin.image')}}</th>
                <th>{{__('admin.name')}}</th>
                <th>{{__('admin.Link')}}</th>
                <th>{{__('admin.control')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($socials as $social)
                <tr class="delete_social">
                    <td class="text-center">
                        <div class="form-check form-check-danger">
                            <input class="form-check-input checkSingle" type="checkbox" value="" id="{{$social->id}}">
                        </div>
                    </td>
                    <td><img src="{{$social->icon}}" width="50px" height="50px" alt=""></td>
                    <td>{{$social->name}}</td>
                    <td>{{$social->link}}</td>
                    <td class="product-action">
                        <a class="btn rounded-pill btn-primary m-2" href="{{route('admin.socials.show' , ['id' => $social->id])}}"><i class="fa fa-eye"></i></a>
                        <a class="btn rounded-pill btn-primary m-2" href="{{route('admin.socials.edit' , ['id' => $social->id])}}"><i class="fa fa-edit"></i></a>
                        <span class="delete-row btn rounded-pill btn-danger m-2" data-url="{{url('admin/socials/'.$social->id)}}"><i class="fa fa-trash"></i></span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- table content --}}
    {{-- no data found div --}}
    @if ($socials->count() == 0)
        <x-admin.empty/>
    @endif
    {{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($socials->count() > 0 && $socials instanceof \Illuminate\Pagination\AbstractPaginator )
    <div class="d-flex justify-content-center mt-3">
        {{$socials->links()}}
    </div>
@endif
{{-- pagination  links div --}}