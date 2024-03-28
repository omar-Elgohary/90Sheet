@extends('admin.layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/index_page.css')}}">
@endsection

@section('content')

<div class="content-body">

    <div class="mb-1 d-flex justify-content-between m-0">

        <x-admin.buttons 
            extrabuttons="true"
            addbutton="{{ route('admin.paymentbrands.create') }}" 
            deletebutton="{{ route('admin.paymentbrands.deleteAll') }}" 
        >
            <x-slot name="extrabuttonsdiv">
                {{-- <a type="button" data-toggle="modal" data-target="#notify" class="btn bg-gradient-info mr-1 mb-1 waves-effect waves-light notify" data-id="all"><i class="feather icon-bell"></i> {{ __('admin.Send_notification') }}</a> --}}
            </x-slot>
        </x-admin.buttons>

        <x-admin.filter 
            datefilter="true" 
            order="true" 
            :searchArray="[
                'name' => [
                    'input_type' => 'text' , 
                    'input_name' => __('admin.name') , 
                ] ,
                'phone' => [
                    'input_type' => 'text' , 
                    'input_name' => __('admin.phone') , 
                ] ,
                'email' => [
                    'input_type' => 'text' , 
                    'input_name' => __('admin.email') , 
                ] ,
                'active' => [
                    'input_type' => 'select' , 
                    'rows'       => [
                      '1' => [
                        'name' => 'مفعل' , 
                        'id' => 1 , 
                      ],
                      '2' => [
                        'name' => 'غير مفعل' , 
                        'id' => 0 , 
                      ],
                    ] , 
                    'input_name' => __('admin.phone_activation_status') , 
                ] ,
                {{-- 'country_id' => [
                    'input_type' => 'select' , 
                    'rows'       => $countries , 
                    'input_name' => __('admin.country') , 
                ] ,
                'intro_fqs_category_id' => [
                    'input_type' => 'select' , 
                    'rows'       => $categories , 
                    'row_name'   => 'title' , 
                    'input_name' => __('admin.section') , 
                ] , --}}
                
            ]" 
        />

    </div>

    <div class="table_content_append">
        
    </div>
</div>

@endsection

@section('js')

    <script src="{{asset('admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/extensions/sweet-alerts.js')}}"></script>
    @include('admin.shared.deleteAll')
    @include('admin.shared.deleteOne')
    @include('admin.shared.filter_js' , [ 'index_route' => url('admin/paymentbrands')])
@endsection
