@extends('layouts.app')
{{-- <Navbar></Navbar> --}}

@section('content')
<jumbo-home></jumbo-home>

<homepage-section
:title="'Our best doctors'"
:subtitle="'best in class'"
:description="'Descrizione della section dei dottori'"
>
    <div class="bottom">
        {{-- carousel with card-doctor --}}
        <card-doctor></card-doctor>
    </div>
</homepage-section>

<homepage-section
:title="'Our services'"
:subtitle="'best in class'"
:description="'Descrizione della section dei servizi'"
>
    <div class="bottom">
        <h1>Carosello con lista dei servizi</h1>
    </div>
</homepage-section>
@endsection