@extends('layouts.layout')
@section('content')
    <div><product_view :no="{{json_encode($no)}}"/></div>
    <div><check-search/></div>
@endsection

@section('scripts')
@endsection


