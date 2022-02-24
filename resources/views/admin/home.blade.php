@extends('layouts.dashboard')

@section('content')
    <h1>Salve {{ $user->name }} nell'area protetta</h1>

    @if ($user->userInfo)
        <div>Numero di telefono: {{ $userInfo->phone }} </div>
        <div>Indirizzo: {{ $userInfo->adress }} </div>
    @endif
@endsection