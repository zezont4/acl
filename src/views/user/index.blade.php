
@extends('acl::layouts.master')
@section('title','المستخدمون')
@section('content')
<div class='row col s12'>
	<a href='{{route('user.create')}}' class='btn waves-effect waves-light blue'>جديد<i class='material-icons left'>add</i></a>
	<a href='#search_modal' class='btn waves-effect waves-light left blue modal-trigger'>بحث متقدم<i class='material-icons left'>search</i></a>
</div>
@include('acl::layouts._search',['model'=>'User'])
@if(count($users))
<?php $arrow = config('zlg.sorting_arrow','<i class="material-icons right grey-text text-darken-1">arrow_drop_up</i>');?>
 <table class='highlight responsive-table'>
    <thead>
        <tr>
		@include('acl::layouts._th',['model'=>'user','field'=> translate('name')])
		@include('acl::layouts._th',['model'=>'user','field'=> translate('email')])
		@include('acl::layouts._th',['model'=>'user','field'=> translate('user_name')])
		@include('acl::layouts._th',['model'=>'user','field'=> translate('mobile_no')])
		@include('acl::layouts._th',['model'=>'user','field'=> translate('allowed_gender')])

        <th>&nbsp;</th>
        </tr>

        </thead>
        @foreach($users as $user)
     <tr @if($user->trashed()) class='deleted' @endif >
   		<td>{{ $user->name  }}</td>
		<td>{{ $user->email  }}</td>
		<td>{{ $user->user_name  }}</td>
		<td>{{ $user->mobile_no  }}</td>
		<td>{{  $settings['gender'][$user->allowed_gender] }}</td>

    	<td><a title='تعديل' href="{{ route('user.edit',  ['id' => $user->id] ) }}"><i class="material-icons">edit</i></a></td>
    <tr>
    @endforeach
</table>
    <div class='section'>
        {{ $users->appends(request()->query())->render() }}
    </div>

    @else
        <div class='center-align blue-text lighten-2'>
            <h4>لا توجد بيانات</h4>
        </div>

@endif
@stop