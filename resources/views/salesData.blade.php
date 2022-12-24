@extends('layouts.layout')
@section('content')
    <div><check-search :no="{{json_encode($no)}}"/></div>
@endsection

@section('scripts')
@endsection
