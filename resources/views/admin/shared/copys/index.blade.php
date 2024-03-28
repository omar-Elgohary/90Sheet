@extends('admin.layout.master')

@section('css')

@endsection

@section('content')

<x-admin.table 
    datefilter="true" 
    order="true" 
    extrabuttons="true"
    addbutton="{{ route('admin.copys.create') }}" 
    deletebutton="{{ route('admin.copys.deleteAll') }}" 
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
        'country_id' => [
            'input_type' => 'select' , 
            'rows'       => $countries , 
            'input_name' => __('admin.country') , 
        ] ,
        'intro_fqs_category_id' => [
            'input_type' => 'select' , 
            'rows'       => $categories , 
            'row_name'   => 'title' , 
            'input_name' => __('admin.section') , 
        ] ,
        
    ]" 
>

    <x-slot name="extrabuttonsdiv">
        {{-- <a type="button" data-toggle="modal" data-target="#notify" class="btn bg-gradient-info mr-1 mb-1 waves-effect waves-light notify" data-id="all"><i class="feather icon-bell"></i> {{ __('admin.Send_notification') }}</a> --}}
    </x-slot>

    <x-slot name="tableContent">
        <div class="card table_content_append">
            {{-- table content will appends here  --}}
        </div>
    </x-slot>
</x-admin.table>


    
@endsection
<x-admin.config table sweetAlert2 datePickr/>

@section('js')

    @include('admin.shared.deleteAll')
    @include('admin.shared.deleteOne')
    @include('admin.shared.filter_js' , [ 'index_route' => url('admin/copys')])
@endsection
