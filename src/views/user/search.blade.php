
@extends('acl::layouts.master')

@section('parent','<a href="'.route("user.index").'" class="breadcrumb page-title">المستخدمون</a>')
@section('title','')

@section('content')

    {{ Form::open(['route' => 'user.index', 'method' => 'get']) }}

    @include('acl::user._form',['btnLabel' => 'بحث','formType' => 'search'])

    {{ Form::close() }}

@stop