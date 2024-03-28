<div class="table-responsive text-nowrap">

    {{-- table content --}}
    <table class="table table-hover" id="tab">
        <thead>
            <tr>
                <th>
                    @if ($reports->count() > 0)
                        <div class="form-check form-check-danger">
                            <input class="form-check-input p-2" type="checkbox" id="checkedAll">
                        </div>
                    @endif
                </th>
                <th>{{__('admin.*')}}</th>
                <th>{{__('admin.ip')}}</th>
                <th>{{__('admin.control')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
                <tr class="delete_report">
                    <td class="text-center">
                        <div class="form-check form-check-danger">
                            <input class="form-check-input checkSingle" type="checkbox" value="" id="{{$report->id}}">
                        </div>
                    </td>
                    <td>{{$report->subject}}</td>
                    <td>{{$report->ip}}</td>
                    <td class="product-action">
                        <a class="btn rounded-pill btn-primary m-2" href="{{route('admin.reports.show' , ['id' => $report->id])}}"><i class="fa fa-eye"></i></a>
                        <span class="delete-row btn rounded-pill btn-danger m-2" data-url="{{url('admin/reports/'.$report->id)}}"><i class="fa fa-trash"></i></span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- table content --}}
    {{-- no data found div --}}
    @if ($reports->count() == 0)
        <x-admin.empty/>
    @endif
    {{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($reports->count() > 0 && $reports instanceof \Illuminate\Pagination\AbstractPaginator )
    <div class="d-flex justify-content-center mt-3">
        {{$reports->links()}}
    </div>
@endif
{{-- pagination  links div --}}