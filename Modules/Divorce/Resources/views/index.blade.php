@extends('divorce::layouts.master')
@section('page-title')
{{'Divorece registration page'}}
@endsection

@section('page-content')
<form id="wizard-vertical" action="{{route('divorce.register')}}" method="POST">
	@csrf
	<section>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_first_name">Wife First Name</label>
			<div class="col-lg-8">
				<select name="first_name" class="form-control">
					<option value=""></option>
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_first_name">Wife Last Name</label>
			<div class="col-lg-8">
				<select name="last_name" class="form-control">
					<option value=""></option>
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_last_name">Wife Status</label>
			<div class="col-lg-8">
				<select name="status" class="form-control">
					<option value=""></option>
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_first_name">Reason For Divorce</label>
			<div class="col-lg-8">
				<textarea cols="12" rows="3" name="reason" class="form-control" placeholder="Brief reason of the divorce"></textarea>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="divorce"></label>
			<div class="col-lg-8">
				<input type="submit" value="Divorce" class="btn btn-primary btn-block">
			</div>
		</div>
		
	</section>
</form>

@endsection