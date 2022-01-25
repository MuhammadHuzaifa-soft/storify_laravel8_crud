@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class=" d-flex  justify-content-between card-header">Stories
                    @can('create' ,App\Story::class)
                    <a href="{{ route('stories.create') }}" class="btn btn-sm btn-primary">Add Story</a>
                    @endcan


                </div>

                <div class="card-body">
                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <th>title</th>
                                <th>type</th>
                                <th>status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stories as $story)
                            <tr>
                                <td>{{ $story->title }}</td>
                                <td>{{ $story->type }}</td>
                                <td>{{ $story->status }}</td>
                                <td>{{ $story->status == 1 ? 'Yes' : 'No' }}</td>
                                <td>
                                    @can('view' ,$story)
                                    <a href="{{ route('stories.show' , [$story]) }}" class="btn btn-secondary">View</a>
                                    @endcan

                                    @can('update' ,$story)
                                    <a href="{{ route('stories.edit' , [$story]) }}" class="btn btn-primary">edit</a>
                                    @endcan

                                    @can('delete' ,$story)
                                    <form style="display: inline-block"
                                        action="{{ route('stories.destroy' , [$story]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $stories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection