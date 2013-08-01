<div class="container">

	<h1>Ideas</h1>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>name</th>
				<th>idea</th>
				<th>Date Entered</th>
			</tr>
		</thead>
		<tbody>
		@foreach( $ideas as $idea )
			<tr>
				<td>{{ $idea->id }}</td>
				<td>{{ $idea->name }}</td>
				<td>{{ $idea->idea }}</td>
				<td>{{ $idea->created_at }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	{{ $ideas->links() }}
</div> <!-- /container -->