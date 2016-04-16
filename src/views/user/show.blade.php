@extends('acl::layouts.master')

@section('parent','<a href="'.route("user.index").'" class="breadcrumb page-title">المستخدمون</a>')
@section('title','عرض')

@section('content')
    <div class='row'>
        <a href='{{route("user.create")}}' class='btn waves-effect waves-light blue'>جديد<i class="material-icons left">add</i></a>
    </div>

    @if(count($user))
        {{ \Form::mtStatic(translate('name'), $user->name  ) }}
        {{ \Form::mtStatic(translate('email'), $user->email  ) }}
        {{ \Form::mtStatic(translate('user_name'), $user->user_name  ) }}
        {{ \Form::mtStatic(translate('mobile_no'), $user->mobile_no  ) }}
        {{ \Form::mtStatic(translate('allowed_gender'), $settings['gender'][$user->allowed_gender]  ) }}

    @endif

    <div class='section'>
        <a class='waves-effect waves-light btn left red lighten-2' href='{{route('user.edit',$user->id)}}'>تعديل</a>
    </div>

@stop