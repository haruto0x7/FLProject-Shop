<!-- List DataTable -->
<div class="row">
    <div class="col-12">
        <div class="card" style="padding:15px;">
            <div class="card-datatable table-responsive pt-0">
                <table class="table" id="withdraw-table">
                    <thead>
                        <tr>
                            <!-- <th>#</th> -->
                            <th>Email</th>
                            <th>Style</th>
                            <th>Transaction</th>
                            <th>Exchange</th>
                            <th>Type</th>
                            <th>Datetime</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($credits))
                        @foreach($credits as $credit)
                        @if($credit->type == 'Withdraw')
                        @if($credit->ordertype == 'Order')
                        <tr>
                            <td>{{ $credit->email }}</td>
                            <td>{{ $credit->style }}</td>
                            <td>{{ $credit->transaction }}</td>
                            <td>{{ $credit->exchange }}</td>
                            <td>{{ $credit->type }}</td>
                            <td>{{ $credit->created_at }}</td>
                        </tr>
                        @endif
                        @endif
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--/ List DataTable -->