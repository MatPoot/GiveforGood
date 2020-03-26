@extends('layouts.apptemplate')
@section('content')
<a href="{{ route('login.provider', 'google') }}"
   class="btn btn-secondary">{{ __('Google Sign in') }}</a>

@endsection
