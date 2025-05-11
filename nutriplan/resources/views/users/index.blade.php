@extends('layouts.app')

@section('content')

@if (session('user_id')===1)
    <div class="container">
        <h1>Liste des utilisateurs</h1>
        <ul>
            @foreach($users as $user)
                <li>{{ $user->name }} ({{ $user->email }})</li>
            @endforeach
        </ul>
    </div>
@else

@endif
@endsection
