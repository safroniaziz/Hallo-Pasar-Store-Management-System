@extends('layouts.app')

@section('menu')
    @include('frontend/menu')
@endsection

@section('category')
    @include('frontend/_category')
@endsection

@section('produks')
    @include('frontend/_produks')
@endsection

@section('rekomendasi')
    @include('frontend/_rekomendasi')
@endsection
