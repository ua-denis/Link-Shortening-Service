@extends('layouts.app')

@section('content')
    <div class="alert alert-success" role="alert">
        Short link created! <a href="{{ $shortLink }}" target="_blank">{{ $shortLink }}</a>
    </div>
@endsection
