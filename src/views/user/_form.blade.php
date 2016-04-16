
{{ \Form::mtText('user_name',translate('user_name') ,request('user_name',  null)) }}

@if( $formType == 'create')
    {{ \Form::mtPassword('password',translate('password') ) }}
    {{ \Form::mtPassword('confirm_password',translate('confirm_password')) }}
@endif

{{ \Form::mtText('name',translate('name') ,request('name',  null)) }}
{{ \Form::mtText('email',translate('email') ,request('email',  null)) }}
{{ \Form::mtText('mobile_no',translate('mobile_no') ,request('mobile_no',  null)) }}
{{ \Form::mtRadio('allowed_gender',translate('allowed_gender'),request('allowed_gender',  null),$settings['gender'] ) }}

<div class='section'>
    {{ \Form::mtButton($btnLabel, 'left red lighten-2') }}
</div>