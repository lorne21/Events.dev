@extends('layouts.master')

<style type="text/css">

h1{
    color: #fff;
}
label {
    color: #fff;
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
        <h1 class="create">Create an Profile</h1>

        {{ Form::open(array('action' => array('UsersController@store'), 'files'=>true)) }}
            <div class="form-group">
                {{ Form::label('band_name', 'Band Name') }}
                {{ Form::text('band_name', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('email', 'Band Email') }}
                {{ Form::email('email', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', array('class' => 'form-control')) }}
            </div>


         	<div class="form-group">
                {{ Form::label('password_confirmation', 'Password Confirmation') }}
                {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
            </div>
            

            <div class="form-group">
                {{ Form::label('genre', 'Genre') }}
                {{ Form::text('genre', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('about', 'About the Band') }}
                {{ Form::textarea('about', null, array('class' => 'form-control')) }}
            </div>

          

            <div class="form-group">
                {{-- <div class="col-md-6"> --}}
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
            <button class="btn btn-primary">Create Profile!</button>
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



