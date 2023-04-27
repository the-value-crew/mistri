<div class="tab-pane fade row m-0 wallet" id="wallet-tab" role="tabpanel">

    <div class="checkout--wrapper">
        <h2 class="title--description">Total Points : <b class="price"> {{$wallet->point}}</b></h2>
        @if($count != 0)
        <table class="table table-borderless">
            <caption>Transaction history</caption>
            <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Remark</th>
                <th scope="col">Points</th>
            </tr>
            </thead>
            <tbody>

            @foreach($walletRecords as $walletRecord)
            <tr>
                <td>{{$walletRecord->created_at->format('d-M-y')}}</td>
                <td ><span class="bg-success status">Wallet Point Received</span></td>
                <td>{{$walletRecord->remark}}</td>
                <td>+Points {{$walletRecord->wallet_credit}}</td>
            </tr>
            @endforeach

            @foreach($refers as $refer)
            <tr>
                <td>{{$refer->created_at->format('d-M-y')}}</td>
                <td ><span class="bg-danger status">Wallet Amount Waiting</span></td>
                <td>Refer to user {{\App\User::find($refer->used_by_user)->name}}</td>
                <td>+Points {{point_for_refer()}}</td>
            </tr>
            @endforeach

            </tbody>
        </table>
            <p style="font-size: 10px;color: #DC143C;font-weight: bold">*{{$points_per_currency}} Points = 1 AED</p>
        @endif
    </div>
    @if($count == 0)
    <div class="checkout--wrapper empty"><span class="material-icons">money_off</span>
        <h2 class="title--description">Looks like you haven't made any transaction yet.
            Once you make it, all the details will appear here.</h2>
    </div>
    @endif
</div>
