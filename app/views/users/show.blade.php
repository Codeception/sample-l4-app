@extends('layouts.scaffold')

@section('main')

<h1>Show User</h1>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
			<th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ link_to_route('users.edit', 'Edit', array($user->id), array('class' => 'btn btn-info')) }}</td>
        </tr>
    </tbody>
</table>

@stop