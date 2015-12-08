@extends('app')

@section('content')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Perubahan Jadwal</h3>
        </div>
        <div class="panel-body">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID Mahasiswa</th>
                        <th>Nama Mahasiswa</th>
                        <th>Nilai Sementara</th>
                        <th>Nilai Tugas</th>
                        <th>Nilai UTS</th>
                        <th>Nilai UAS</th>
                        <th>Nilai Sumatif</th>
                    </tr>
                </thead>
                <tbody>
                    <tr data-toggle="modal" data-target="#testModal">
                        <td>1</td>
                        <td>17283748</td>
                        <td>Test 1</td>
                        <td>99</td>
                        <td>79</td>
                        <td>83</td>
                        <td>95</td>
                        <td>89</td>
                    </tr>
                    <tr data-toggle="modal" data-target="#testModal">
                        <td>2</td>
                        <td>17283749</td>
                        <td>Test 2</td>
                        <td>96</td>
                        <td>79</td>
                        <td>83</td>
                        <td>95</td>
                        <td>89</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-labelledby="testModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">17283748 - Jancuk</h4>
                </div>
                {!! Form::open() !!}
                <div class="modal-body">
                        <div class="form-group">
                            {!! Form::label('nilai-tugas', 'Nilai Tugas') !!}
                            {!! Form::text('nilai-tugas', '79', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('nilai-uts', 'Nilai UTS') !!}
                            {!! Form::text('nilai-uts', '83', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('nilai-uas', 'Nilai UAS') !!}
                            {!! Form::text('nilai-uas', '95', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('nilai-sumatif', 'Nilai Sumatif') !!}
                            {!! Form::text('nilai-sumatif', '89', ['class' => 'form-control']) !!}
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {!! Form::submit('Save changes', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12 text-right">
            <button type="button" class="btn btn-primary preview-add-button">
                Submit
            </button>
            <button type="button" class="btn btn-default preview-add-button">
                Update
            </button>
        </div>
    </div>
</div>
@endsection
