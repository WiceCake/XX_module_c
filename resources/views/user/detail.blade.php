@extends('layouts.admin')
@section('title', 'User - '.$user->username)
@section('main')

{{-- Shows specific details for platform users and developers --}}

<h3>History</h3>
<table class="table table-striped">
    <tr>
        <td>ID</td>
        <td>USERNAME</td>
        <td>GAME TITLE</td>
        <td>VERSION</td>
        <td>SCORE</td>
        <td>DESCRIPTION</td>
    </tr>
    @foreach ($get as $info)
        <tr>
            <td>{{$info->id}}</td>
            <td>{{$info->username}}</td>
            <td>{{$info->title}}</td>
            <td>{{$info->version}}</td>
            <td>{{$info->score}}</td>
            <td>{{$info->description}}</td>
        </tr>
    @endforeach
</table>
@endsection
