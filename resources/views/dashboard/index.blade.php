@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class=" d-flex  justify-content-between card-header">Home page
                    <div class="float-right">
                        <a href="{{ route('dashboard.index') }}">All</a>|
                        <a href="{{ route('dashboard.index' , ['type' => 'short']) }}">Short</a>|
                        <a href="{{ route('dashboard.index' , ['type' => 'long']) }}">Long</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <th>title</th>
                                <th>type</th>
                                <th>auther</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stories as $story)
                            <tr>
                                <td>
                                    <a href="{{ route('dashboard.show' , [$story]) }}">{{ $story->title }}</a>

                                </td>
                                <td>{{ $story->type }}</td>
                                <td>{{ $story->user->name }}</td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $stories->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- {{ dd(DB::getQueryLog()) }} --}}