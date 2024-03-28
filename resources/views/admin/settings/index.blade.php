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
                      <div class="step" data-target="#app-setting">
                          <button type="button" class="step-trigger">
                          <span class="bs-stepper-icon">
                            <i class="fa fa-gear"></i>
                          </span>
                              <span class="bs-stepper-label">{{__('admin.app_setting')}}</span>
                          </button>
                      </div>
                      <div class="line">
                          <i class="ti ti-chevron-right"></i>
                      </div>
                      <div class="step" data-target="#terms_and_conditions">
                          <button type="button" class="step-trigger">
                          <span class="bs-stepper-icon">
                              <i class="fa fa-edit"></i>
                          </span>
                              <span class="bs-stepper-label">{{__('admin.terms_and_conditions')}}</span>
                          </button>
                      </div>
                      <div class="line">
                          <i class="ti ti-chevron-right"></i>
                      </div>
                      <div class="step" data-target="#about_app">
                          <button type="button" class="step-trigger">
                          <span class="bs-stepper-icon">
                           <i class="fa fa-edit"></i>
                          </span>
                              <span class="bs-stepper-label"> {{__('admin.about_app')}}</span>
                          </button>
                      </div>
                      <div class="line">
                          <i class="ti ti-chevron-right"></i>
                      </div>
                      <div class="step" data-target="#privacy">
                          <button type="button" class="step-trigger">
                          <span class="bs-stepper-icon">
                            <i class="fa fa-user-shield"></i>
                          </span>
                              <span class="bs-stepper-label">{{__('admin.Privacy_policy')}}</span>
                          </button>
                      </div>
                      <div class="line">
                          <i class="ti ti-chevron-right"></i>
                      </div>
                      <div class="step" data-target="#smtp">
                          <button type="button" class="step-trigger">
                          <span class="bs-stepper-icon">
                            <i class="fa fa-envelope"></i>
                          </span>
                              <span class="bs-stepper-label">{{__('admin.email_data')}}</span>
                          </button>
                      </div>
                      <div class="line">
                          <i class="ti ti-chevron-right"></i>
                      </div>

                      <div class="step" data-target="#notification">
                          <button type="button" class="step-trigger">
                          <span class="bs-stepper-icon">
                            <i class="fa fa-bell"></i>
                          </span>
                              <span class="bs-stepper-label">{{__('admin.notification_data')}}</span>
                          </button>
                      </div>
                      <div class="line">
                          <i class="ti ti-chevron-right"></i>
                      </div>
                      <div class="step" data-target="#api">
                          <button type="button" class="step-trigger">
                          <span class="bs-stepper-icon">
                            <i class="fa fa-laptop-code"></i>
                          </span>
                              <span class="bs-stepper-label">{{__('admin.api_data')}}</span>
                          </button>
                      </div>
                  </div>
                  <div class="bs-stepper-content">
                      @include('admin.settings.tabs.app-setting')
                      @include('admin.settings.tabs.terms_and_conditions')
                      @include('admin.settings.tabs.about_app')
                      @include('admin.settings.tabs.privacy')
                      @include('admin.settings.tabs.smtp')
                      @include('admin.settings.tabs.notification')
                      @include('admin.settings.tabs.api')
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- account setting page end -->

</div>

@endsection
<x-admin.config sweetAlert2 validation stepper ckeditor />

@section('js')



    <script>
            CKEDITOR.replace( 'textarea-terms_ar' );
            CKEDITOR.replace( 'textarea-terms_en' );
            CKEDITOR.replace( 'textarea-about_ar' );
            CKEDITOR.replace( 'textarea-about_en' );
            CKEDITOR.replace( 'textarea-privacy_ar' );
            CKEDITOR.replace( 'textarea-privacy_en' );
            CKEDITOR.replace( 'privacy_en_editor' );
    </script>
  {{-- show selected image script --}}
    @include('admin.shared.addImage')
  {{-- show selected image script --}}
@endsection

