<div class="app-brand demo">
    <a href="{{ url('admin/dashboard')}}" class="app-brand-link">
              <span class="app-brand-logo demo">
               <img class="brand-logo img-logo w-auto h-auto" style="width: 55px !important;" src="{{Cache::get('settings')['logo']}}" alt="">
              </span>
        <span class="app-brand-text demo menu-text fw-bold">{{ Cache::get('settings')['intro_name_' . lang()] }}</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
    </a>
</div>

<div class="menu-inner-shadow"></div>
<ul class="menu-inner py-1">

{!! \App\Traits\SideBarTrait::sidebar() !!}
</ul>

{{--<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">--}}
{{--    <div class="navbar-header">--}}
{{--        <ul class="nav navbar-nav flex-row">--}}
{{--            <li class="nav-item mr-auto">--}}
{{--                <a class="navbar-brand" href="{{url('admin/dashboard')}}">--}}
{{--                    <img class="brand-logo img-logo w-auto h-auto" src="{{Cache::get('settings')['logo']}}" alt="">--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--    <div class="shadow-bottom"></div>--}}
{{--    <div class="main-menu-content">--}}
{{--        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">--}}
{{--            {!! \App\Traits\SideBarTrait::sidebar() !!}--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</div>--}}