<div class="container">

	<h1>Articles</h1>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>Title</th>
				<th>Author</th>
				<th>Status</th>
				<th>Created</th>
				<th>Last Updated</th>
			</tr>
		</thead>
		<tbody>
		@foreach( $articles as $article )
			<tr>
				<td>{{ $article->id }}</td>
				<td><a href="/admin/article/{{ $article->id }}/edit">{{ $article->title }}</a></td>
				<td><a href="/admin/user/{{ $article->user->id }}/edit">{{ $article->user->email }}</a></td>
				<td>{{ $article->status->name }}</td>
				<td>{{ $article->created_at }}</td>
				<td>{{ $article->updated_at }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>

</div> <!-- /container -->