@extends('layouts.master')

@section('content')

<!-- Modal -->


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('action' => 'HomeController@doLogin')) }}
          <div class="form-group">
              {{ Form::label('email', 'eMail Address') }}
              {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
          </div>
          <div class="form-group">
              {{ Form::label('password', 'Password') }}
              {{ Form::password('password', array('class' => 'form-control')) }}
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-primary">Log In</button>
          </div>
        {{ Form::close() }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@stop