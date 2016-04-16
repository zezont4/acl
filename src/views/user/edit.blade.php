@extends('acl::layouts.master')

@section('parent','<a href="'.route("user.index").'" class="breadcrumb page-title">المستخدمون</a>')
@section('title','تعديل')

@section('content')

    @if($user->trashed())
        <div class='section'>
            <p class='red-text lighten-2 mid-size-font center-align'>هذا السجل محذوف</p>
        </div>
    @endif

    <div class="col m6">
        <h5 class="header">بيانات المستخدم</h5>
        <div class="divider"></div>
        <div class="section">
            {{ \Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put']) }}

            {{ \Form::mtText('user_name',translate('user_name') ,request('user_name',  null)) }}
            {{ \Form::mtText('name',translate('name') ,request('name',  null)) }}
            {{ \Form::mtText('email',translate('email') ,request('email',  null)) }}
            {{ \Form::mtText('mobile_no',translate('mobile_no') ,request('mobile_no',  null)) }}
            {{ \Form::mtRadio('allowed_gender',translate('allowed_gender'),request('allowed_gender',  null),$settings['gender'] ) }}

            <div class='section'>
                {{ \Form::mtButton('حفظ التعديلات', 'left red lighten-2') }}
            </div>

            {{ \Form::close() }}

        </div>
    </div>
    <div class="col m6">
        <h5 class="header">إعادة تعيين كلمة المرور</h5>
        <div class="divider"></div>
        <div class="section">
            {{ \Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put']) }}

            {{ \Form::mtPassword('password',translate('password') ) }}
            {{ \Form::mtPassword('confirm_password',translate('confirm_password')) }}

            <div class='section'>
                {{ \Form::mtButton('إعادة تعيين', 'left red lighten-2') }}
            </div>

            {{ \Form::close() }}
        </div>

        <div class='row-right'>

            @if($user->trashed())
                {{ \Form::open(['route' => ['user.restore', $user->id]]) }}
                {{ \Form::mtButton('تفعيل المستخدم', ' btn-flat waves-green green-text') }}
                {{ \Form::close() }}
            @else
                {{ \Form::open(['route' => ['user.destroy', $user->id], 'method' => 'delete']) }}
                {{ \Form::mtButton('تعطيل المستخدم', ' btn-flat waves-red red-text') }}
                {{ \Form::close() }}
            @endif

        </div>
    </div>

@stop