@extends('layouts.layout')
@section('content')
    <div><product_view :no="{{json_encode($no)}}"/></div>
@endsection

@section('scripts')
@endsection


