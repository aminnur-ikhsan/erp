@extends('layout.first')

@section('title', 'Laporan Keuangan')

@section('head')
    {{-- START STYLE --}}
@endsection

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Daftar Akun</h1>
        @livewire('finance.account-list')
    </div>
@endsection

@section('script')
    {{-- START SCRIPT --}}
@endsection
