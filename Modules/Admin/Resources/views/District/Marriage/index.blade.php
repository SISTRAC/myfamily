@extends('admin::layouts.master')

@section('page-content')    
    @if(empty($district->marriages()))
        <h3>{{'Marriages record not found in '.$district->name.' District'}}</h3>
    @else
    <div class="row">
        <div class="col-xs-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{'Husband'}}</th>
                        <th>{{'Wife'}}</th>
                        <th>{{'Marriage Date'}}</th>
                        <th>{{'Family'}}</th>
                        <th>{{'Location'}}</th>
                        <th>{{'Birth'}}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                	
                    @foreach($district->marriages() as $marriage)
                        
                        <tr>
                            <td>{{$marriage->husband->profile->user->first_name}} {{$marriage->husband->profile->user->last_name}}</td>
                            <td>{{$marriage->wife->profile->user->first_name}} {{$marriage->wife->profile->user->last_name}}</td>
                            <td>{{date('d:M:Y',$marriage->date)}}</td>
                            <td>{{$marriage->husband->profile->family->name}}</td>
                            <td>{{$marriage->husband->profile->family->location->area->town->name}}</td>
                            <td>{{!is_null($marriage->wife->mother) ? count($marriage->wife->mother->births) : '0'}}</td>
                            <td>
                                <a href="{{route('district.family.marriage.edit',[$district->lga->state->name,$district->lga->name,$district->name,$marriage->husband->profile->family->location->area->town->name,$marriage->husband->profile->family->name,$marriage->id])}}" class="btn btn-warning">Edit</a><br>

                                <a href="" class="btn btn-warning">New Birth</a>
                            </td>
                        </tr>
                       
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
@endsection    