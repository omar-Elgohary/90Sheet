@extends('admin.layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/index_page.css')}}">
@endsection

@section('content')

<div class="content-body">

    <div class="mb-1 d-flex justify-content-between m-0">
        <x-admin.buttons />
    </div>
    <div class="table_content_append">
    </div>
</div>

@endsection

@section('js')


    @include('admin.shared.deleteAll')
    @include('admin.shared.deleteOne')
    @include('admin.shared.filter_js' , [ 'index_route' => url('admin/pages')])
@endsection
