@extends('admin.layout.master')

@section('css')

@endsection
  
@section('content')

    <div class="content-body">
        <!-- account setting page start -->
        <section id="page-account-settings">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="bs-stepper wizard-icons wizard-icons-example mt-2">
                        <div class="bs-stepper-header">
                            <div class="step" data-target="#notifications">
                                <button type="button" class="step-trigger">
                          <span class="bs-stepper-icon">
                            <i class="fa fa-bell"></i>
                          </span>
                                    <span class="bs-stepper-label">{{__('admin.send_notification')}}</span>
                                </button>
                            </div>
                            <div class="line">
                                <i class="ti ti-chevron-right"></i>
                            </div>
                            <div class="step" data-target="#sms">
                                <button type="button" class="step-trigger">
                          <span class="bs-stepper-icon">
                           <i class="fa fa-sms"></i>
                          </span>
                                    <span class="bs-stepper-label"> {{__('admin.send_sms')}}</span>
                                </button>
                            </div>
                            <div class="line">
                                <i class="ti ti-chevron-right"></i>
                            </div>
                            <div class="step" data-target="#email">
                                <button type="button" class="step-trigger">
                          <span class="bs-stepper-icon">
                            <i class="fa fa-paper-plane"></i>
                          </span>
                                    <span class="bs-stepper-label">{{__('admin.send_email')}}</span>
                                </button>
                            </div>

                        </div>
                        <div class="bs-stepper-content">
                            @include('admin.notifications.tabs.notifications')
                            @include('admin.notifications.tabs.sms')
                            @include('admin.notifications.tabs.email')
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- account setting page end -->

    </div>

@endsection
<x-admin.config sweetAlert2 validation stepper select2 />


@section('js')

<script>
    $(document).ready(function(){
        $(document).on('submit','.notify-form',function(e){
            e.preventDefault();
            var url = $(this).attr('action')
            $.ajax({
                url: url,
                method: 'post',
                data: new FormData($(this)[0]),
                dataType:'json',
                processData: false,
                contentType: false,
                beforeSend: function(){
                    $(".send-notify-button").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disable',true)
                },
                success: (response)=>{
                    $(".text-danger").remove()
                    $('.store input').removeClass('border-danger')
                    $(".send-notify-button").html("{{__('admin.send')}}").attr('disable',false)
                    Swal.fire({
                                position: 'top-start',
                                icon: 'success',
                                title: '{{__('admin.send_successfully')}}',
                                showConfirmButton: false,
                                timer: 1500,
                                confirmButtonClass: 'btn btn-primary',
                                buttonsStyling: false,
                            })
                    $(this).trigger("reset")
                },
                error: function (xhr) {
                    $(".send-notify-button").html("{{__('admin.send')}}").attr('disable',false)
                    $(".text-danger").remove()
                    $('.store input').removeClass('border-danger')

                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('.store input[name='+key+']').addClass('border-danger')
                        $('.store input[name='+key+']').after(`<span class="mt-5 text-danger">${value}</span>`);
                        $('.store select[name='+key+']').after(`<span class="mt-5 text-danger">${value}</span>`);
                    });
                },
            });

        });
    });
</script>
@endsection