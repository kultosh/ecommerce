@extends('layouts.app')

@section('content')

    <h2>Submit your shop</h2>

    <form action="{{route('shops.store')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Name of shop</label>
            <input type="text" class="form-control" name="name" id="" placeholder="">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="" rows="5" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

@endsection
