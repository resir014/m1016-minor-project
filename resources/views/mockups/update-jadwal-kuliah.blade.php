@extends('app')

@section('content')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Perubahan Jadwal</h3>
        </div>
        <div class="panel-body">
            {!! Form::open() !!}
                <div class="form-group text-center">
                    {!! Form::label('draft-id', 'Draft ID:') !!}
                    {!! Form::text('draft-id', '') !!}
                    {!! Form::submit('Show', ['class' => 'btn btn-sm btn-primary']) !!}
                </div>
            {!! Form::close() !!}

        </div>
    </div>

</div>
@endsection
