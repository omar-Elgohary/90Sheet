<div id="api" class="content">
    <form action="{{route('admin.settings.update')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
        @method('put')
        @csrf
        <div class="row g-3">

            <div class="col-12 col-md-6">
                <x-admin.inputs.text type="text" name="live_chat" label="{{__('admin.live_chat')}}"  required placeholder="{{__('admin.live_chat')}}"  inValidMessage="{{ __('admin.this_field_is_required') }}" value="{{ settings('live_chat') }}" />
            </div>

            <div class="col-12 col-md-6">
                <x-admin.inputs.text type="text" name="google_analytics" label="{{__('admin.google_analytics')}}"  required placeholder="{{__('admin.google_analytics')}}"  inValidMessage="{{ __('admin.this_field_is_required') }}" value="{{ settings('google_analytics') }}" />
            </div>

            <div class="col-12 col-md-6">
                <x-admin.inputs.text type="text" name="google_places" label="{{__('admin.google_places')}}"  required placeholder="{{__('admin.google_places')}}"  inValidMessage="{{ __('admin.this_field_is_required') }}" value="{{ settings('google_places') }}" />
            </div>

            <div class="col-12 d-flex justify-content-center mt-3">
                <button type="submit" class="btn rounded-pill btn-primary m-2 submit_button">{{__('admin.update')}}</button>
                <a href="{{ url()->previous() }}" type="reset" class="btn rounded-pill btn-outline-warning m-2">{{__('admin.back')}}</a>
            </div>
        </div>
    </form>
</div>
