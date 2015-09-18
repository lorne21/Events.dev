@extends('layouts.master')

<style>

label{
    color: white;
}

.create{
    color: white;
}

.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}


</style>

@section('content')
      <div class="container">
        <h1 class="create">Create an Event</h1>

        {{ Form::open(array('action' => array('EventsController@store'), 'files'=>true)) }}
            <div class="form-group">
                {{ Form::label('title', 'Event Name') }}
                {{ Form::text('title', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('description', 'Event Description') }}
                {{ Form::textarea('description', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('price', 'Cover Price: $') }}
                {{ Form::number('price'); }}
            </div>

            <div class="form-group">
                {{ Form::label('date', 'Event Date') }}
                {{ Form::date('date'); }}
            </div>

            <div class="form-group">
                {{ Form::label('start_time', 'Start Time') }}
                {{ Form::time('start_time')}}
            </div>

            <div class="form-group">
                {{ Form::label('end_time', 'End Time') }}
                {{ Form::time('end_time'); }}
            </div>

            <div class="form-group">
                {{ Form::label('location', 'Location') }}
                {{ Form::text('location', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('address', 'Address') }}
                {{ Form::text('address', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('city', 'City') }}
                {{ Form::text('city', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('state', 'State') }}
                {{ Form::text('state', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('zip', 'Zip Code') }}
                {{ Form::text('zip', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{-- <div class="col-md-6"> --}}
                    {{ Form::label('img', 'Add Event Photo') }}
                    <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-info btn-file">Upload Image 
                            {{ Form::file('img') }}
                            </span>
                        </span>
                        {{ Form::text('img', null, ['class' => 'form-control', 'readonly']) }}
                    </div>
                {{-- </div> --}}
            </div>
            <div class="clearfix"></div>
            <br>
            <button class="btn btn-primary">Post Event!</button>
        {{ Form::close() }}
      </div>
 

<script>
 $(document).on('change', '.btn-file :file', function() {
  var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);
});

$(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
        
    });
});

</script>
 
 @stop