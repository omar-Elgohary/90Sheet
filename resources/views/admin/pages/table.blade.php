<div class="table-responsive text-nowrap">


    {{-- table content --}}
    <table class="table" id="tab">
        <thead>
        <tr>
            <th>{{__('admin.title')}}</th>
            <th>{{__('admin.content')}}</th>
            <th>{{__('admin.control')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($pages as $page)
            <tr class="delete_row">
                <td>{{ $page->title }}</td>
                <td>{!! Str::limit($page->content, 100) !!}</td>
                <td class="product-action">
                    <a class="btn rounded-pill btn-primary" href="{{ route('admin.pages.edit', ['id' => $page->id]) }}">
                        <i class="fa fa-edit"></i>
                    </a>
{{--                    <a class="btn rounded-pill btn-primary" href="{{ route('admin.pages.show', ['id' => $page->id]) }}">--}}
{{--                        <i class="fa fa-eye"></i>--}}
{{--                    </a>--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{-- table content --}}
    {{-- no data found div --}}
    @if ($pages->count() == 0)
        <x-admin.empty/>
    @endif
    {{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($pages->count() > 0 && $pages instanceof \Illuminate\Pagination\AbstractPaginator )
    <div class="d-flex justify-content-center mt-3">
        {{$pages->links()}}
    </div>
@endif