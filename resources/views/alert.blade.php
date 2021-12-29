<div>
    @if (session()->has('error'))
        <div class="">
            {{ session()->get('error') }}
        </div>
    @elseif(session()->has('success'))
        <div class="">
            {{ session()->get('success') }}
        </div>
    @endif
</div>
