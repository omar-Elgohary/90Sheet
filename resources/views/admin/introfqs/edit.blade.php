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
                    <h4 class="card-title">{{__('admin.edit')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form  method="POST" action="{{route('admin.introfqs.update' , ['id' => $fqs->id])}}" class="store form-horizontal needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <x-admin.inputs.select name="intro_fqs_category_id" label="{{__('admin.section')}}"  required placeholder="{{__('admin.select_section')}}"  inValidMessage="{{ __('admin.this_field_is_required') }}">
                                            <x-slot name="options">
                                                <option value>{{__('admin.select_section')}}</option>
                                                @foreach ($categories as $category)
                                                    <option {{$category->id == $fqs->intro_fqs_category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
                                                @endforeach
                                            </x-slot>
                                        </x-admin.inputs.select>
                                    </div>

                                @foreach (languages() as $lang)
                                    <div class="col-md-6 col-12">
                                        <x-admin.inputs.text name="title[{{$lang}}]" label="{{__('site.question_'.$lang)}}"  required placeholder="{{__('site.write') . __('site.question_'.$lang)}}"  inValidMessage="{{ __('admin.this_field_is_required') }}" value="{{ $fqs->getTranslation('title', $lang) }}" />
                                    </div>
                                @endforeach
                                @foreach (languages() as $lang)
                                    <div class="col-6">
                                        <x-admin.inputs.textarea name="description[{{$lang}}]" label="{{__('site.answer_'.$lang)}}"  required placeholder="{{__('site.write') . __('site.answer_'.$lang)}}"  inValidMessage="{{ __('admin.this_field_is_required') }}" value="{{ $fqs->getTranslation('description', $lang) }}" />
                                    </div>
                                @endforeach

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

   {{-- submit edit form script --}}
   <x-admin.inputs.formAjax className="store"/>
   {{-- submit edit form script --}}
    
@endsection