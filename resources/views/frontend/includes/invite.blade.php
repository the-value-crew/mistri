<div class="tab-pane fade row m-0 invite" id="invite-tab" role="tabpanel">

    <div class="checkout--wrapper">
        {{--<h2 class="title--description">Invite a friend</h2>--}}
        <h2 class="card__title">INVITE A FRIEND, GET POINTS</h2>
        {{--<p class="para">Give a friend AED 50 when they sign up using your personal link and get AED 50 when their job is completed!--}}

            {{--Share your personal link with your friends</p>--}}
        <div class="code">Your referral code <a href="#!">{{Auth::user()->refer_code}}</a></div>
    </div>


</div>