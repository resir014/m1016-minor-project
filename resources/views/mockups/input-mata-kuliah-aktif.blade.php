@extends('app')

@section('content')
	
	<div class="col-sm-12">
		<a href="{{ route('courses.index') }}">&larr; Go back to all courses</a>
		<h4>Course :</h4>
	    <div class="panel panel-default">
	        <div class="panel-body form-horizontal payment-form">
	            
	            <div class="form-group">
	                <label for="description" class="col-sm-2 control-label">Description</label>
	                <div class="col-sm-9">
	                    <input type="text" class="form-control" id="description" name="description">
	                </div>
	            </div> 
	            <div class="form-group">
	                <label for="amount" class="col-sm-2 control-label">Amount</label>
	                <div class="col-sm-9">
	                    <input type="number" class="form-control" id="amount" name="amount">
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="status" class="col-sm-2 control-label">Status</label>
	                <div class="col-sm-4">
				        <div class="radio radio-primary">
				            <input type="radio" name="radio1" id="radio1" value="option1" checked>
				            <label for="radio1">
				            	Inactive
				            </label>
				        </div>
				        <div class="radio radio-primary">
				            <input type="radio" name="radio1" id="radio2" value="option2">
				            <label for="radio2">
				                Active
				            </label>
				        </div>
	                </div>	
	            </div>
	            <div class="form-group">
	                <label for="date" class="col-sm-2 control-label">Date</label>
	                <div class="col-sm-9">
	                    <input type="date" class="form-control" id="date" name="date">
	                </div>
	            </div>   
	            <div class="form-group">
	                <div class="col-sm-12 text-right">
	                    <button type="button" class="btn btn-default btn-primary">
	                        <span class="glyphicon glyphicon-plus"></span> Save
	                    </button>
	                </div>
	            </div>
	        </div>
	    </div>            
	</div> 
@stop