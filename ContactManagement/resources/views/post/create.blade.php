@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                <div class="d-flex justify-content-between">
                        <div>Create Posts </div>
                         <div><a href="{{route('posts.create')}}" class ="btn btn-success">Back</a></div>

                    </div>
                </div>

                <div class="card-body">
                    <form action="#" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="title">Image</label>
                            <input type="file" class="form-control" id="image"  placeholder="Choose an image" name="image">
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category">
                                <option value="">Select Category</option>

                                @if($categories->count()>0)
                                @foreach($categories as $category)
                                <option value="{{$category->id}} ">{{$category->name}}</option>
                                @endforeach
                                @endif
                        </select>

                        </div>
                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <select class="form-control" id="tags" name="tag[]" multiple>
                                <option value="">Select Tags</option>
                        </select>
                        
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
