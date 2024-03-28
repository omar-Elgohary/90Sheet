<li class="menu-item {{$value['routeName'] == Route::currentRouteName() ? 'active' : ''}}">
    <a href="{{route('admin.'.$value['routeName'])}}" class="menu-link">
        {!! $value['icon'] !!}
        <div data-i18n="{{__('routes.'.$value['title'])}}">{{__('routes.'.$value['title'])}}</div>
    </a>
</li>