<div id="terms_and_conditions" class="content">
    <form action="{{route('admin.settings.update')}}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
        @method('put')
        @csrf
        <div class="row g-3">
            <div class="col-12">
                <x-admin.inputs.textarea name="terms_ar"  label="{{__('admin.conditions_and_conditions_in_arabic')}}"  required placeholder="{{__('admin.conditions_and_conditions_in_arabic')}}"  inValidMessage="{{ __('admin.this_field_is_required') }}" value="{!! settings('terms_ar') !!}" />
            </div>

            <div class="col-12">
                <x-admin.inputs.textarea name="terms_en"  label="{{__('admin.conditions_and_conditions_of_english')}}"  required placeholder="{{__('admin.conditions_and_conditions_of_english')}}"  inValidMessage="{{ __('admin.this_field_is_required') }}" value="{!! settings('terms_en') !!}" />
            </div>

            <div class="col-12 d-flex justify-content-center mt-3">
                <button type="submit" class="btn rounded-pill btn-primary m-2 submit_button">{{__('admin.update')}}</button>
                <a href="{{ url()->previous() }}" type="reset" class="btn rounded-pill btn-outline-warning m-2">{{__('admin.back')}}</a>
            </div>
        </div>
    </form>
</div>
