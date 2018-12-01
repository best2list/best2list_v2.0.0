@extends('layouts.two-col.two-col')
@section('sidebar')
    @parent
@endsection
@section('content')

    <div class="card">
        <div class="card-header">{{ $menu->title }}</div>
        <div class="card-body">
            {{ $menu->text }}
        </div>
    </div>

@endsection
