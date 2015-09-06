@extends('backend.template')

@section('breadcrumbs')
	{!! Breadcrumbs::render('/admin') !!}
@stop

@section('content')

	@include('partials/notices_bar')

	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				Latest Users
			</div>
			<!-- <div class="panel-body"> -->
				<ul class="panel-body list-group">
					@foreach( $users as $user )
					<li class="list-group-item"><a href="{{ url('/admin/users/show/' . $user->id ) }}">{{ $user->username }}</a> <small>({{ $user->created_at->diffForHumans() }})</small></li>
					@endforeach
				</ul>
			<!-- </div> -->
		</div>
	</div>

	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading">
				Latest Images
				@if( $images->count() > 0 )
				<a href="{{ url('/admin/images/recent' )}}" class="btn btn-default btn-xs pull-right">More</a>
				@endif
			</div>
			<div class="panel-body">
				<div class="panel-body">
					@if( $images->count() == 0 )
					There aren't any uploaded images yet.
					@endif
					@foreach( $images as $image )
					<div class="col-md-3">
						<div class="thumbnail">
							<img src="{{ $image->getPublicUrl() }}">
							<div class="caption">
								<p><strong>{{ $image->name }}</strong></p>
								<p><small>Uploaded {{ $image->created_at->diffForHumans() }}</small></p>
								<small> By
								@if( $image->user )
								<a href="{{ url('/admin/users/show/' . $image->user->id) }}">{{ $image->user->username }}</a>
								@else
								<a href="#">123.123.123.123</a>
								@endif
								</small>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

@stop