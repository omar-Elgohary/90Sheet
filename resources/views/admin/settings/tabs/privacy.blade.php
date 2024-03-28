<div id="privacy" class="content">
    <form action="{{route('admin.settings.update')}}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
        @method('put')
        @csrf
        <div class="row g-3">
            <div class="col-12">
                <x-admin.inputs.textarea name="privacy_ar"  label="{{__('admin.privacy_policy_in_arabic')}}"  required placeholder="{{__('admin.privacy_policy_in_arabic')}}"  inValidMessage="{{ __('admin.this_field_is_required') }}" value="{!! settings('privacy_ar') !!}" />
            </div>

            <div class="col-12">
                <x-admin.inputs.textarea name="privacy_en"  label="{{__('admin.privacy_policy_in_english')}}"  required placeholder="{{__('admin.privacy_policy_in_english')}}"  inValidMessage="{{ __('admin.this_field_is_required') }}" value="{!! settings('privacy_en') !!}" />
            </div>
            <div class="col-12 d-flex justify-content-center mt-3">
                <button type="submit" class="btn rounded-pill btn-primary m-2 submit_button">{{__('admin.update')}}</button>
                <a href="{{ url()->previous() }}" type="reset" class="btn rounded-pill btn-outline-warning m-2">{{__('admin.back')}}</a>
            </div>
        </div>
    </form>
</div>
