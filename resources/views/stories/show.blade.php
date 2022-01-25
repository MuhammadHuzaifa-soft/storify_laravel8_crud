@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class=" card">
                <div class="d-flex  justify-content-between card-header">Stories

                    <a href="{{ route('stories.index') }}" class="btn btn-sm btn-primary">Back</a>
                </div>


                <div class="card-body">
                    <table class="table table-light">
                        <thead class="thead-light">
                            {{ $story->title }}
                        </thead>
                        <tbody>
                            <td>
                                {{ $story->body }}
                            </td>
                            <td>
                                {{ $story->status == 1 ? 'yes' : 'no' }}
                            </td>
                            <td>{{ $story->type }}</td>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
