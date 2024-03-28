<div id="notification" class="content">
    <form action="{{route('admin.settings.update')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
        @method('put')
        @csrf
        <div class="row g-3">
            <div class="col-12 col-md-6">
                <x-admin.inputs.text type="text" name="firebase_key" label="{{__('admin.server_key')}}"  required placeholder="{{__('admin.server_key')}}"  inValidMessage="{{ __('admin.this_field_is_required') }}" value="{{ settings('firebase_key') }}" />
            </div>

            <div class="col-12 col-md-6">
                <x-admin.inputs.text type="text" name="firebase_sender_id" label="{{__('admin.sender_identification')}}"  required placeholder="{{__('admin.sender_identification')}}"  inValidMessage="{{ __('admin.this_field_is_required') }}" value="{{ settings('firebase_sender_id') }}" />
            </div>

            <div class="col-12 d-flex justify-content-center mt-3">
                <button type="submit" class="btn rounded-pill btn-primary m-2 submit_button">{{__('admin.update')}}</button>
                <a href="{{ url()->previous() }}" type="reset" class="btn rounded-pill btn-outline-warning m-2">{{__('admin.back')}}</a>
            </div>
        </div>
    </form>
</div>
