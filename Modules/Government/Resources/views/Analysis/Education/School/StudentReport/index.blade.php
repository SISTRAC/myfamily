@extends('government::layouts.master')

@section('page-content')
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
	    <form action="{{route('government.analysis.education.school.student.report.search')}}" method="post">
	    	@csrf
	    	<h2 class="text-primary">Search School Report Specification</h2>
	    	@include('government::Analysis.include')
	    	<button class="btn btn-info">Search School Report</button>
	    </form>
    </div>
</div>
@endsection

@section('footer')
    
@endsection