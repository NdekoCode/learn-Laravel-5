@extends('layout')

@section('content')
    <div>
        <h2 class="title title-2">Actualités</h2>


        <ul class="mt-5">

            @foreach ($messages as $k => $msg)
                <li class="px-2 py-2 shadow hover:shadow border-b border mb-1">
                    <small><em>{{ $msg->created_at }}</em></small><br /> {{ $msg->content }}
                </li>
            @endforeach
        </ul>

    </div>
@endsection
