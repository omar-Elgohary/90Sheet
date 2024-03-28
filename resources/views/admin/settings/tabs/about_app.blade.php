<div id="about_app" class="content">
    <form action="{{route('admin.settings.update')}}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="row g-3">

            <div class="col-12">
                <x-admin.inputs.textarea name="about_ar"  label="{{__('admin.about_the_application_in_arabic')}}"  required placeholder="{{__('admin.about_the_application_in_arabic')}}"  inValidMessage="{{ __('admin.this_field_is_required') }}" value="{!! settings('about_ar') !!}" />
            </div>

            <div class="col-12">
                <x-admin.inputs.textarea name="about_en"  label="{{__('admin.about_the_application_in_english')}}"  required placeholder="{{__('admin.about_the_application_in_english')}}"  inValidMessage="{{ __('admin.this_field_is_required') }}" value="{!! settings('about_en') !!}" />
            </div>
            <div class="col-12 d-flex justify-content-center mt-3">
                <button type="submit" class="btn rounded-pill btn-primary m-2 submit_button">{{__('admin.update')}}</button>
                <a href="{{ url()->previous() }}" type="reset" class="btn rounded-pill btn-outline-warning m-2">{{__('admin.back')}}</a>
            </div>
        </div>
    </form>

</div>
