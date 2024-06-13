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
                    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" value="{{old('title')}}" class="form-control" id="title" name="title" placeholder="Enter Title" name="title">
                            @if($errors->any('title'))
                            <span class="text-danger">{{$errors->first('title')}}</span>

                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{old('description')}}</textarea>
                            @if($errors->any('description'))
                            <span class="text-danger">{{$errors->first('description')}}</span>

                            @endif
                        </div>
                        <div class="form-group">
                            <label for="title">Image</label>
                            <input type="file" class="form-control" id="image"  placeholder="Choose an image" name="image">
                            @if($errors->any('image'))
                            <span class="text-danger">{{$errors->first('image')}}</span>

                            @endif
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category">
                                <option value="">Select Category</option>

                                @if($categories->count()>0)
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" 
                                {{(old('category')&& old('category')==$category->id)?'selected':''}} 
                                >{{$category->name}}
                            </option>
                                @endforeach
                                @endif
                        </select>
                        @if($errors->any('category'))
                            <span class="text-danger">{{$errors->first('category')}}</span>

                            @endif

                        </div>
                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <select class="form-control" id="tags" name="tags[]" multiple>
                                <option value="">Select Tags</option>
                                @if($tags->count()>0)
                                @foreach($tags as $tags)
                                <option value="{{$tags->id}}" 
                                {{(old('tags')&& in_array($tags->id,old('tags')) )?'selected':''}}>
                                {{$tags->name}}
                                    </option>
                                    @endforeach
                                    @endif
                        </select>
                        @if($errors->any('tags'))
                            <span class="text-danger">{{$errors->first('tags')}}</span>

                            @endif
                        
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script type= "text/javascript" >
    $("#category").select2({
    placeholder: "Select a category",
    allowClear: true
});
$("#tags").select2({
    placeholder: "Select tags",
    allowClear: true
});
</script>

@endsection
