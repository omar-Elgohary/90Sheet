@extends('admin.layout.master')

@section('content')
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('admin.show')}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                                <div class="form-body">
                                    <div class="row">
                                        @if($settlement->image)
                                        <div class="col-md-12 col-12">
                                            <x-admin.inputs.image  name="image" src="{{ $settlement->image }}" disabled desc="{{ __('admin.receipt_photo') }}" />
                                        </div>
                                        @else
                                            <div class="col-12">
                                                <div class="form-control text-center">
                                                    لا يوجد صوره إيصال
                                                </div>
                                            </div>
                                        @endif

                                        <div class="col-6">
                                            <x-admin.inputs.text name="name" label="{{__('admin.service_provider_name')}}"  disabled value="{{ $settlement->transactionable?->name }}" />
                                        </div>

                                        <div class="col-6">
                                            <x-admin.inputs.text name="name" label="{{__('admin.settlement_amount')}}"  disabled value="{{ $settlement->amount }}" />
                                        </div>

                                        <div class="col-12">
                                            <x-admin.inputs.text name="name" label="{{__('admin.order_status')}}"  disabled value="{{ __('site.'.$settlement->status) }}" />
                                        </div>
                                        <div class="col-12 d-flex justify-content-center mt-3">
                                            <a href="{{ url()->previous() }}" type="reset" class="btn rounded-pill btn-outline-warning m-2">{{__('admin.back')}}</a>
                                        </div>

                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')

@endsection