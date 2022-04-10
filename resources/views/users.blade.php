@extends('layout')
@section('content')

@foreach($users as $user)
<div>
    <ul class="mt-5">
        <li class="px-2 py-2 shadow hover:shadow border-b border mb-1"><a class="hover:underline font-bold text-blue-700 transition-all" href="/{{ $user['email'] }}">{{ $user['email'] }}</a></li>
    </ul>
</div>
@endforeach

@endsection
