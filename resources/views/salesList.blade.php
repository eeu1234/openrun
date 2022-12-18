@extends('layouts.layout')
@section('content')
    <div><sales-log :no="{{json_encode($no)}}"/></div>
    <div><check-search/></div>
@endsection

@section('scripts')
@endsection

