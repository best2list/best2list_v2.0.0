@extends('admin.layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">{{ $menu->title }} <span class="@if($menu->status=='passive') alert alert-danger @else alert alert-success @endif">{{ $menu->status }}</span></div>
        <div class="card-body">
            {{ $menu->text }}
        </div>
    </div>

@endsection