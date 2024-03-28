
@if(session()->has('error'))
    <p style="font-size: 15px; text-align: center" class="ogin-box-msg alert alert-danger" id="notification">{{ session()->get('error') }}</p>
@endif

@if(session()->has('success'))
    <p style="font-size: 15px; text-align: center" class="ogin-box-msg alert alert-success" id="notification">{{ session()->get('success') }}</p>
@endif


