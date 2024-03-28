
<div class="modal fade" id="cancelModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form class="store" action="{{route('admin.settlements.changeStatus')}}" method="POST">
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
                <div class="modal-body text-center">
                    {{__('admin.you_are_about_to_decline_the_settlement_request')}}
                    <input type="hidden" name="id" class="settlement_id" value="">
                    <input type="hidden" id="status" name="status" value="rejected">
                </div>

                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn rounded-pill btn-primary submit_button" >{{__('admin.confirm')}}</button>
                    <button type="button" class="btn rounded-pill btn-secondary" data-bs-dismiss="modal">{{__('admin.close')}}</button>
                </div>
            </div>
        </form>
    </div>
</div>



<!-- Modal -->
<div  class="modal fade store" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('admin.Settlement_request')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="top:5px;left: 11px">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                {{__('admin.you_are_about_to_decline_the_settlement_request')}}
            </div>
            <form class="store" action="{{route('admin.settlements.changeStatus')}}" method="POST">
                @csrf
                <div class="modal-footer justify-content-center">
                    <input type="hidden" name="id" class="settlement_id" value="">
                    <input type="hidden" id="status" name="status" value="rejected">
                    <button type="submit" class="btn btn-success submit_button">{{__('admin.confirm')}}</button>
                    <a class="btn btn-danger" data-dismiss="modal"
                       style="text-decoration: none;color: white">{{__('admin.close')}}</a>
                </div>
            </form>
        </div>
    </div>
</div>