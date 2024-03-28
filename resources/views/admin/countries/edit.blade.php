@extends('admin.layout.master')
{{-- extra css files --}}
@section('css')

@endsection
{{-- extra css files --}}

@section('content')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="country match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('admin.edit')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form  method="POST" action="{{route('admin.countries.update' , ['id' => $country->id])}}" class="store form-horizontal" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="row">

                                    <div class="col-12">
                                        <x-admin.inputs.image  name="image"  inValidMessage="{{ __('admin.this_field_is_required') }}" src="{{ $country->image }}" />
                                    </div>

                                    @foreach (languages() as $lang)
                                        <div class="col-md-4 col-12">
                                            <x-admin.inputs.text name="name[{{$lang}}]" label="{{__('site.name_'.$lang)}}"  required placeholder="{{__('site.write') . __('site.name_'.$lang)}}"  inValidMessage="{{ __('admin.this_field_is_required') }}" value="{{ $country->getTranslation('name', $lang) }}" />
                                        </div>
                                    @endforeach

                                    <div class="col-md-4 col-12">
                                        <x-admin.inputs.text name="key" type="number" label="{{__('admin.country_code')}}"  required placeholder="{{__('admin.enter_country_code')}}"  inValidMessage="{{ __('admin.this_field_is_required') }}" value="{{ $country->key }}" />
                                    </div>
                                    <div class="col-12 d-flex justify-content-center mt-3">
                                        <x-admin.inputs.submitButton name="{{__('admin.update')}}"/>
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

    {{-- show selected image script --}}
        @include('admin.shared.addImage')
    {{-- show selected image script --}}

    {{-- submit edit form script --}}
    <x-admin.inputs.formAjax className="store"/>
    {{-- submit edit form script --}}
    
@endsection