@extends('marriage::layouts.master')

@section('page-title')
{{'Marriage Registration Page'}}
@endsection

@section('page-content')
<div class="row">
	<div class="col-sm-12">
		<div class="card-box">
			@if(session('register'))
                @include('marriage::Marriage.Forms.registration_form')
			@else
                @include('marriage::Marriage.Forms.verification_form')
			@endif
		</div>
	</div>
</div><!-- End row -->
@endsection

@section('footer')
<script>
    const app = new Vue({
        el: '#family',
        data: {
            no: '',
            yes: '',
        },
        mounted() {
        
      },
    )};

</script>
@endsection