<div id='search_modal' class='modal modal-fixed-footer'>
    <div class='modal-content'>
        <div class='section'>
            {{ Form::open(['route' => strtolower($model).'.index', 'method' => 'get']) }}

            @include('acl::'.strtolower($model).'._form',['btnLabel' => 'بحث','formType' => 'search'])

            {{ Form::close() }}
        </div>
    </div>
</div>