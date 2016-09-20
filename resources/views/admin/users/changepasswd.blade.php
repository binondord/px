@extends('layouts.modal')

@section('title')
    Change Password for {!! $user->email !!}
@stop

@section('header')
    @parent
    {!! Form::model(null, array('action' => array('\App\Http\Controllers\UsersController@saveChangePasswd',$id),'method'=>'put')) !!}
    <input name="c7token" type="hidden" value="{{ csrf_token() }}" data-ng-init="bind._token='{{ csrf_token() }}'" data-ng-model="bind._token">

@stop

@section('content')

    <div class="form-group">
        {!! Form::label('password', 'New Password') !!}
        {!! Form::password('password',array('class'=>'form-control password', 'id' => '','placeholder'=>'New Password', 'data-ng-model'=>'bind.password')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('confirm_password', 'Confirm Password') !!}
        {!! Form::password('confirm_password',array('class'=>'form-control', 'id' => '','placeholder'=>'Confirm Password', 'data-ng-model'=>'bind.confirm_password')) !!}
    </div>

@endsection


@section('buttons')
    <div class="form-group">
        {!! Form::button('Submit', array('class' => 'btn btn-success',"ng-click"=>"ok()")) !!}
        {!! Form::button('Cancel',array('class'=>'btn cancel',"ng-click"=>"cancel()")) !!}
    </div>
    {!! Form::close() !!}
@stop