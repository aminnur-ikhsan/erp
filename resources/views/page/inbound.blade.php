@extends('layout.first')

@section('title', 'Inbound')

@section('head')
    {{-- START STYLE --}}
@endsection

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Data Inbound</h1>
        @livewire('inbound')
    </div>
@endsection

@section('script')
    {{-- START SCRIPT --}}
@endsection
