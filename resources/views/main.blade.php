@extends('layouts.layout')
@section('content')
    @if(isset($no))
        <div><calender :no="{{json_encode($no)}}"/></div>
    @else
        <div><calender/></div>
    @endif
@endsection

@section('scripts')
@endsection
