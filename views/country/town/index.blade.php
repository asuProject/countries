@extends('layouts.base')

@section('title', __('cities'))

@section('contents')

	@if (count($errors) > 0)
		<div class="alert">
			<div class="alert alert-warning">
				<h4>Errors:</h4>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		</div>
	@endif
<? $i=0; ?>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>{{__('#')}}</th>
			<th>{{ __('city') }}</th>
			<th>{{ __('country') }}</th>
			<th>{{ __('Options') }}</th>
		</tr>
	</thead>
	<tbody>
		@foreach($towns as $i=>$town)
			<tr>
				<td>{{++$i}}</td>
				<td>{{$town->name}}</td>
				<td>{{$town->Country->name}}</td>
				<td><a href="{{ route('country.town.edit' , $town->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
					<div style="display: inline-block;">
						<form action="{{ route('country.town.destroy',$town->id) }}" method="post" onsubmit="return confirm('{{__('Delete town Confirmation')}}')">
						{{csrf_field()}}
						{{ method_field('DELETE') }}
						<button type="submit" class="btn btn-danger btn-xs icon-button"><span class="glyphicon glyphicon-remove"></span></button>
						</form>
					</div>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
	
@endsection
