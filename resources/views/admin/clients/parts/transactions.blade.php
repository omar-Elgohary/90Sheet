
<div class="card store card-border-shadow-success">
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            {{-- table content --}}
            <table class="table table-hover" id="tab">
                <thead>
                    <tr>
                        <th>{{__('admin.date')}}</th>
                        <th>{{__('admin.amount')}}</th>
                        <th>{{__('admin.type')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)
                        <tr class="">
                            <td>{{\Carbon\Carbon::parse($transaction->created_at)->format('d/m/Y')}}</td>
                            <td  class="text-success">{{$transaction->amount }} <span> {{__('site.currency')}}</span></td>
                            <td>{{$transaction->type_text}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- table content --}}
            {{-- no data found div --}}
            @if ($transactions->count() == 0)
                <x-admin.empty/>
            @endif
            {{-- no data found div --}}
        
        </div>
        {{-- pagination  links div --}}
        @if ($transactions->count() > 0 && $transactions instanceof \Illuminate\Pagination\AbstractPaginator )
            <div class="d-flex justify-content-center mt-3">
                {{$transactions->links()}}
            </div>
        @endif
        {{-- pagination  links div --}}
    </div>
</div>