@extends('layouts.app')

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <div class="card-text">
                <div class="col-md-8">
                    <h3>Categories</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <form class="mt-2 mb-4" action="{{ route('categories.store') }}" method="post">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="name" class="form-control" placeholder="enter category name..." required>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Add category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
