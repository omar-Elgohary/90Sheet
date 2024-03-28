
<div class="modal fade" id="acceptModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form class="store needs-validation"  novalidate enctype="multipart/form-data" action="{{route('admin.settlements.changeStatus')}}" method="POST">
            @csrf
            <input type="hidden" name="id" class="notify_id">
            <input type="hidden" name="notify" class="email" value="email">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">{{__('admin.Settlement_request')}}</h5>
                    <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <x-admin.inputs.image  name="image" required  inValidMessage="{{ __('admin.this_field_is_required') }}" desc="{{ __('admin.receipt_photo') }}" />
                        </div>

                        <div class="form-group text-center">
                            <input type="hidden" name="id" class="settlement_id" value="">
                            <input type="hidden" id="status" name="status" value="accepted">
                            <x-admin.inputs.text name="amount" label="{{__('admin.settlement_amount')}}"  disabled className="form-control amountText text-center" />
                            <input class="form-control text-center" id="amount" type="hidden" name="amount" value="">
                        </div>

                    </div>

                </div>

                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn rounded-pill btn-primary submit_button" >{{__('admin.confirm')}}</button>
                    <button type="button" class="btn rounded-pill btn-secondary" data-bs-dismiss="modal">{{__('admin.close')}}</button>
                </div>
            </div>
        </form>
    </div>
</div>


