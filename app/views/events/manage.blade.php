
{{-- TO BE EDITED --}}

@extends('layouts.master')
<style>

table {
    color: rgba(255,255,255,1);
}

.manage{
	color: rgba(255,255,255,1);
}

.showmodal{
	color: black;
}

</style>


@section('content')

	<div ng-app="angularManage">
		<div class="container" ng-controller="ManageController">
			<h2 class='manage'>Manage Events<h2>
			<table class='table table-bordered'>
				<tr>
					<th>Title</th>
					<th>Event Date</th>
					<th>Event Location</th>
					<th>Start Time</th>
					<th>Edit Post</th>
					<th>Remove Post</th>
				</tr>
				<tr ng-repeat="event in events">
					<td><a href="#" data-toggle="modal" data-target="">@{{event.title}}</a>

					{{-- DISPLAY MODAL --}}
    
				     
				    
				    {{-- END DISPLAY MODAL --}}

					</td>
					<td>@{{ event.date }}</td>
					<td>@{{ event.location }}</td>
					<td>@{{ event.start_time }}</td>

					<td><btn class="btn btn-warning" data-toggle="modal" data-target="">Edit</btn>

					{{-- EDIT MODAL --}}
    
				      
				    
				    {{-- END EDIT MODAL --}}
				    </td>
					<td><btn class="btn btn-danger" ng-click="">Delete</btn></td>

				</tr>
			</table>
		</div>
	</div>

	
<script src="/js/jquery.js"></script>
<script src="/js/moment.js"></script>
<script src="/js/moment-timezone-with-data-2010-2020.js"></script>
<script type="text/javascript" src="/js/angular.min.js"></script>
<script type="text/javascript" src="/js/angularManage.js"></script>

@stop