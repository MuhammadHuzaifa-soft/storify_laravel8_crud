@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class=" card">
                <div class="d-flex  justify-content-between card-header">Edit Stories

                    <a href="{{ route('stories.index') }}" class="btn btn-sm btn-primary">Back</a>
                </div>


                <div class="card-body">

                    {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                        @endforeach
                    </div>
                    @endif --}}

                    <form action="{{ route('stories.update' , [$story]) }}" method="post">
                        @csrf
                        @method('PUT')

                        @include('stories.form')

                        <button class="btn btn-primary">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
