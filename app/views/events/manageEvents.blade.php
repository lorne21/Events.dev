
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

	<h2 class='manage'>Manage Posts<h2>
	<div ng-app="angularBlog">
		<div class="container" ng-controller="ManageController">
			<table class='table table-bordered'>
				<tr>
					<th>Title</th>
					<th>Author</th>
					<th>Created At</th>
					<th>Edit Post</th>
					<th>Remove Post</th>
				</tr>
				<tr ng-repeat="post in posts">
					<td><a href="#" data-toggle="modal" data-target="@{{ '#displayModal' + $index }}">@{{post.title}}</a>

					{{-- DISPLAY MODAL --}}
    
				      <div class="modal fade" ng-attr-id="@{{ 'displayModal' + $index }}" tabindex="-1" role="dialog" aria-labelledby="@{{ 'displayModalLabel' + $index }}">
				        <div class="modal-dialog" role="document">
				          <div class="modal-content">
				            <div class="modal-header">
				              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				              <div class="modal-title" ng-attr-id="@{{ 'displayModalLabel' + $index }}"><img ng-src="@{{post.img_path}}" width="100%"></div>
				            </div>
				            <div class="modal-body">
				              <h3 class="showmodal">@{{post.title}}</h3>
				              <h4 class="showmodal">@{{post.user.first_name}} @{{post.user.last_name}}</h4>
				              <p>@{{post.body}}</p>
				            </div>
				            <div class="modal-footer">
				              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				            </div>
				          </div>
				        </div>
				      </div>
				    
				    {{-- END DISPLAY MODAL --}}

					</td>
					<td>@{{post.user.first_name}} @{{post.user.last_name}}</td>
					<td>@{{ post.created_at | phpDate : "MMMM Do, YYYY h:mm a" }}</td>
					<td><btn class="btn btn-warning" data-toggle="modal" data-target="@{{ '#editModal' + $index }}">Edit</btn>

					{{-- EDIT MODAL --}}
    
				      <div class="modal fade" ng-attr-id="@{{ 'editModal' + $index }}" tabindex="-1" role="dialog" aria-labelledby="@{{ 'editModalLabel' + $index }}">
				        <div class="modal-dialog" role="document">
				          <div class="modal-content">
				            <div class="modal-header">
				              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				              <div class="modal-title showmodal" ng-attr-id="@{{ 'editModalLabel' + $index }}">
				              	<img ng-src="@{{post.img_path}}" width="100%"></div>
				            </div>
				            <div class="modal-body">
				              <form novalidate name="editForm" ng-submit="editItem($index)">
							          <div class="form-group">
							              <label for="title" class="showmodal">Title</label>
							              <input type="text" class="form-control showmodal" id="title" ng-model="post.title" required>
							          </div> 
							          <div class="form-group">
							              <label for="body" class="showmodal">Content</label>
							              <input type="textarea" class="form-control showmodal" id="body" ng-model="post.body" required>
							          </div>
							          <button class="btn btn-primary" type="submit" ng-click="editPost($index)">Save Changes</button>
							          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							    </form>
				            <div class="modal-footer"></div>
				          </div>
				        </div>
				      </div>
				    
				    {{-- END EDIT MODAL --}}
				    </td>
					<td><btn class="btn btn-danger" ng-click="deletePost($index)">Delete</btn></td>

				</tr>
			</table>
		</div>
	</div>

	

<script src="/js/moment.js"></script>
<script src="/js/moment-timezone-with-data-2010-2020.js"></script>
<script type="text/javascript" src="/js/angular.min.js"></script>
<script type="text/javascript" src="/js/angularBlog.js"></script>

@stop