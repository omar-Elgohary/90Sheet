@extends('admin.layout.master')
{{-- extra css files --}}
@section('css')

@endsection
{{-- extra css files --}}

@section('content')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('admin.add')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form  method="POST" action="{{route('admin.countries.store')}}" class="store form-horizontal needs-validation" novalidate>
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <x-admin.inputs.image  name="image"  inValidMessage="{{ __('admin.this_field_is_required') }}" />
                                    </div>

                                    @foreach (languages() as $lang)
                                        <div class="col-md-4 col-12">
                                            <x-admin.inputs.text name="name[{{$lang}}]" label="{{__('site.name_'.$lang)}}"  required placeholder="{{__('site.write') . __('site.name_'.$lang)}}"  inValidMessage="{{ __('admin.this_field_is_required') }}" />
                                        </div>
                                    @endforeach

                                    <div class="col-md-4 col-12">
                                        <x-admin.inputs.text name="key" type="number" label="{{__('admin.country_code')}}"  required placeholder="{{__('admin.enter_country_code')}}"  inValidMessage="{{ __('admin.this_field_is_required') }}" />
                                    </div>


                                    <div class="col-12 d-flex justify-content-center mt-3">
                                        <x-admin.inputs.submitButton name="{{__('admin.add')}}"/>
                                        <a href="{{ url()->previous() }}" type="reset" class="btn rounded-pill btn-outline-warning m-2">{{__('admin.back')}}</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
<x-admin.config sweetAlert2 validation select2/>

@section('js')

    {{-- submit add form script --}}
    <x-admin.inputs.formAjax className="store"/>
    {{-- submit add form script --}}

    
  {{-- show selected image script --}}
     @include('admin.shared.addImage')
  {{-- show selected image script --}}
    
@endsection