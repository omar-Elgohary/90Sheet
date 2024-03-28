@extends('admin.layout.master')
{{-- extra css files --}}
@section('css')

@endsection
{{-- extra css files --}}
@section('content')

    <div class="content-body">
        <!-- account setting page start -->
        <section id="page-account-settings">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="bs-stepper wizard-icons wizard-icons-example mt-2">
                        <div class="bs-stepper-header">
                            <div class="step" data-target="#main_data">
                                <button type="button" class="step-trigger">
                          <span class="bs-stepper-icon">
                            <i class="fa fa-chalkboard-teacher"></i>
                          </span>
                                    <span class="bs-stepper-label">{{__('admin.main_data')}}</span>
                                </button>
                            </div>
                            <div class="line">
                                <i class="ti ti-chevron-right"></i>
                            </div>
                            <div class="step" data-target="#change_password">
                                <button type="button" class="step-trigger">
                          <span class="bs-stepper-icon">
                           <i class="fa fa-lock"></i>
                          </span>
                                    <span class="bs-stepper-label"> {{__('admin.change_password')}}</span>
                                </button>
                            </div>

                        </div>
                        <div class="bs-stepper-content">
                            <div id="main_data" class="content">
                                <form action="{{route('admin.profile.update')}}" method="post" enctype="multipart/form-data" class="form-horizontal needs-validation" novalidate>
                                    @method('put')
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <x-admin.inputs.image  name="image"  inValidMessage="{{ __('admin.this_field_is_required') }}" src="{{ auth('admin')->user()->image }}" />
                                        </div>
                                        <div class="col-6">
                                            <x-admin.inputs.text name="name" label="{{__('admin.name')}}"  required placeholder="{{__('admin.write_the_name')}}"  inValidMessage="{{ __('admin.this_field_is_required') }}" value="{{ auth('admin')->user()->name }}" />
                                        </div>

                                        <div class="col-6">
                                            <x-admin.inputs.text type="number" name="phone" label="{{__('admin.phone_number')}}"  required placeholder="{{__('admin.enter_phone_number')}}"  inValidMessage="{{ __('admin.this_field_is_required') }}" value="{{ auth('admin')->user()->phone }}" />
                                        </div>

                                        <div class="col-6">
                                            <x-admin.inputs.text type="email" name="email" label="{{__('admin.email')}}"  required placeholder="{{__('admin.enter_the_email')}}"  inValidMessage="{{ __('admin.this_field_is_required') }}" value="{{ auth('admin')->user()->email }}" />
                                        </div>
                                        <div class="col-12 d-flex justify-content-center mt-3">
                                            <button type="submit" class="btn rounded-pill btn-primary m-2 submit_button">{{__('admin.saving_changes')}}</button>
                                            <a href="{{ url()->previous() }}" type="reset" class="btn rounded-pill btn-outline-warning m-2">{{__('admin.back')}}</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="change_password" class="content">
                                <form action="{{route('admin.profile.update_password')}}" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
                                @method('put')
                                @csrf
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <x-admin.inputs.password name="old_password" required label="{{__('admin.old_password')}}"  inValidMessage="{{ __('admin.old_password') }}" />
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <x-admin.inputs.password name="password" required label="{{__('admin.new_password')}}"  inValidMessage="{{ __('admin.new_password') }}" />
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <x-admin.inputs.password name="password_confirmation" required label="{{__('admin.new_password_confirm')}}"  inValidMessage="{{ __('admin.new_password_confirm') }}" />
                                        </div>

                                        <div class="col-12 d-flex justify-content-center mt-3">
                                            <button type="submit" class="btn rounded-pill btn-primary m-2 submit_button">{{__('admin.saving_changes')}}</button>
                                            <a href="{{ url()->previous() }}" type="reset" class="btn rounded-pill btn-outline-warning m-2">{{__('admin.back')}}</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- account setting page end -->

    </div>


@endsection
<x-admin.config sweetAlert2 validation stepper />

@section('js')

  {{-- show selected image script --}}
    @include('admin.shared.addImage')
  {{-- show selected image script --}}

@endsection

