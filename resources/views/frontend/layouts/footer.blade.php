<style>

    footer {
        margin-top: 20px;
        padding-top: 40px;
        color: white;
        background: #2f3640 !important;
    }
    footer>div {
        /* margin-top: 40px; */
        width: 90%;
        margin:auto;
    }
    footer a:hover {
        color: var(--site-primary);
    }

</style>
<footer>
    
    <div class="d-flex justify-content-between py-4 align-items-center">
        <div class="d-flex justify-content-between align-items-center">
            <i class="fab fa-cc-paypal fa-3x"></i>
            <img src="{{asset('/gallery/payment_methods/khalti.png')}}" height="40px" class="ml-2 bg-white rounded-lg p-1">
            <img src="{{asset('/gallery/payment_methods/esewa.png')}}" height="40" class="ml-2 bg-white rounded-lg p-1">
        </div>
        <div>Technology by: <a href="https://www.thesunbi.com/" target="_blank">SunBi</a></div>
    </div>
</footer>
