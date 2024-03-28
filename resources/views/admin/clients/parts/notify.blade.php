<div class="card mb-3 card-border-shadow-danger">
    <div class="card-header">
        <h4>{{ __('admin.send_notify') }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.clients.notify') }}" class="form notify-form needs-validation" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            <input type="hidden" name="notify" value="notifications">
            <input type="hidden" name="id" value="{{ $row->id }}">



            <x-admin.inputs.textarea name="body_ar" cols="1" rows="3"  label="{{__('admin.the_message_in_arabic')}}"  required placeholder="{{__('admin.the_message_in_arabic')}}"  inValidMessage="{{ __('admin.this_field_is_required') }}" />

            <div class="error error_body_ar"></div>
            <br>


            <x-admin.inputs.textarea name="body_en" cols="1" rows="3" label="{{__('admin.the_message_in_english')}}"  required placeholder="{{__('admin.the_message_in_english')}}"  inValidMessage="{{ __('admin.this_field_is_required') }}" />
            <div class="error error_body_en"></div>
            <br>
            <hr>

            <div class="d-flex align-items-center">
                <button type="submit" class="btn rounded-pill btn-primary m-2 send-notify-button">
                    <i class="feather icon-navigation"></i>
                    {{  __('admin.send') }}</button>
            </div>
        </form>
    </div>
</div>