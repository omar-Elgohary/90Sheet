{{-- @foreach ($routes as $value)

    @if ($value->getName() !== null && isset($value->getAction()['title']) && isset($value->getAction()['icon']) && isset($value->getAction()['type']) && $value->getAction()['type'] == 'parent')

        @if (in_array($value->getName(), $my_routes) && isset($value->getAction()['sub_route']) && $value->getAction()['sub_route'] == true && isset($value->getAction()['child']) && count($value->getAction()['child']))

            @include('admin.shared.sidebar.dropdown', compact('value' , 'routes_data'))

        @elseif (in_array($value->getName(), $my_routes))

            @include('admin.shared.sidebar.single_side_bar' , compact('value'))

        @endif

    @endif

@endforeach --}}

@if (auth('admin')->user()->type == 'super_admin')

    @foreach ($routes_data as $key => $value)

        @if ( $value['icon'] != null && $value['sub_route'] && $value['count'] )

            @include('admin.shared.sidebar.dropdown', compact('value' , 'routes_data'))

        @else

            @include('admin.shared.sidebar.single_side_bar' , compact('value', 'key'))

        @endif

    @endforeach
@else

    @foreach ($routes_data as $key => $value)

        @if ( $value['icon'] != null && $value['sub_route'] && $value['count'] )

            @include('admin.shared.sidebar.dropdown', compact('value' , 'routes_data'))

        @else

            @include('admin.shared.sidebar.single_side_bar' , compact('value'))

        @endisset

    @endforeach

    {{-- @foreach ($routes_data as $key => $value)

        @if ($value['icon'] != null && $value->getAction()['type'] == 'parent')

            @if (in_array( $key , $my_routes) && isset($value->getAction()['sub_route']) && $value->getAction()['sub_route'] == true && isset($value->getAction()['child']) && count($value->getAction()['child']))

                @include('admin.shared.sidebar.dropdown', compact('value' , 'routes_data'))

            @elseif (in_array($value->getName(), $my_routes))

                @include('admin.shared.sidebar.single_side_bar' , compact('value'))

            @endif

        @endif

    @endforeach --}}
@endif