@extends('government::layouts.master')

@section('page-content')
@section('page-title')
    {{'Reported People Population Base on Registration in'}} {{governmentChartPage()}}
@endsection
<div class="col md-12">
    {!! $population->container() !!}
    {!! $population->script() !!}
</div>
@endsection


