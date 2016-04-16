@extends('acl::layouts.master')

@section('parent','<a href="'.route("user.index").'" class="breadcrumb page-title">المستخدمون</a>')
@section('title','جديد')

@section('content')

    {{ \Form::open(['route' => 'user.store']) }}

    @include('acl::user._form',['btnLabel' => 'حفظ','formType' => 'create'])

    {{ \Form::close() }}

@stop