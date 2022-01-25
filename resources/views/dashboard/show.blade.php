@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class=" card">
                <div class="d-flex  justify-content-between card-header">Stories

                    <a href="{{ route('dashboard.index') }}" class="btn btn-sm btn-primary">Back</a>
                </div>


                <div class="card-body">
                    <table class="table table-light">
                        <thead class="thead-light card-header">
                            {{ $story->title }} By {{ $story->user->name }}
                        </thead>
                        <tbody>
                            <td>
                                {{ $story->body }}
                                <p class="font-bold">
                                    {{ $story->UploadedTime }}
                                </p>
                            </td>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection