@if(session()->has('error'))
    <p style="font-size: 15px; text-align: center" class="ogin-box-msg alert alert-danger">{{ session()->get('error') }}</p>
@endif

@if(session()->has('success'))
    <p style="font-size: 15px; text-align: center" class="ogin-box-msg alert alert-success">{{ session()->get('success') }}</p>
@endif