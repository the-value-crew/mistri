@extends('frontend.layouts.master')
@section('title','FAQ')

@section('content')

    <main class="common-page page--aboutus page--faq">
        <div class="screen">
            <div class="section-rule">
                <div class="wrapper">
                    <div class="title--wrapper ">
                        <h2 class="title--section">FAQ </h2>

                    </div>

                    <div class="accordion" id="accordionExample">
                        @foreach($faqs as $faq)
                         <div class="card">
                            <div class="card-header" id="headingOne">

                                <a  data-toggle="collapse" href="#collapseOne" class="collapsed">
                                    {{$faq->question}} <span>+</span>
                                </a>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    {!! $faq->answer !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>


                </div>

            </div>

        </div>

    </main>
    @endsection


@push('script')

<script>
    $(document).ready(()=>{
        let counter= 0;
    $('.card-header a').click((e)=>{
        setInterval(()=>{
        $('.card-header a span').html('-');
        $('.card-header a.collapsed span').html('+');
    },1000)
    })
    })

</script>
@endpush