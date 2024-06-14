@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>Posts </div>
                         <div><a href="{{route('posts.create')}}" class ="btn btn-success"></a>Create Post</div>

                    </div>
                </div>

                <div class="card-body">
                    <div class="mb-2">
                        <form class="form-inline" action="">
                            <div class="form-group">
                                <label for="category_filter">Filter By Category &nbsp; </label>
                                <select class="form-control" id="category_filter" name="category">
                                 <option value="">Select Category</option>
                                 @if($categories->Count()>0)
                                @foreach($categories as $category)
                                <option value="{{$category->name}}" {{(Request::query('category') && Request::query('category')== $category->name)?'selected':''}}
                                >{{$category->name}}
                            </option>
                                @endforeach
                                @endif
                              </select>
                              <label for="status_filter">Filter By Status &nbsp; </label>
                              <input type="text" class="form-control" id="keyword" placeholder="Enter Keyword " id="keyword">
                              <span>&nbsp;</span>
                              <button type="button" onclick="search_posts()" class="btn btn-primary">Search</button>

                              @if(Request::query('category')||Request::query('keyword'))

                              <a href="{{route('post.index')}}" class="btn btn-success">Clear</a>
                              @endif
                        </form>
                    </div>
                   <div class="table-responsive">
                    <table style="width: 100%;" class="table table-stripped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Title</th>
                          <th>Created By</th>
                          <th>Category</th>
                          <th>Total Comments
                            @if(Request::query('sortByComments') && Request::query('sortByComments')=='asc')
                            <a href="javascript:sort('desc')"><i class="fas fa-sort-down"></I></a>

                            @elseif(Request::query('sortByComments') && Request::query('sortByComments')=='desc')
                            <a href="javascript:sort('asc')"><i class="fas fa-sort-up"></I></a>

                            @else
                            <a href="javascript:sort('asc')"><i class="fas fa-sort"></I></a>

                            @endif
                           
                          </th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      @if(count($posts))
                                @foreach($posts as $post)
                                <tr>
                          <td>{{$post->id}}</td>
                          <td style="width: 35%">{{$post->title}}</td>
                          <td>{{$post->user->name}}</td>
                          <td>T{{$post->category->name}}</td>
                          <td align ="center">{{$post->comments_Count}}</td>
                          <td style="width: 250px">
                            <a href="{{route('post.show', $post->id)}}" class="btn btn-primary">View</a>
                            <a href="{{route('post.edit', $post->id)}" class="btn btn-success">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                          </td>
                        </tr>
                         @endforeach
                            @else
                                <tr>
                                  <td colspan="6">No Posts Found</td>
                                </tr>
                                @endif
                       </tbody>
                        </table>

                    </div>
                   </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
  var query=<?php echo json_encode((object)Request::query()); ?>;

  
  function search post(){

    object.assign(query,{'category':$('#category_filter').val()});
    object.assign(query,{'keyword':$('#keyword').val()});

    window.location.href = "{{route('post.index')}}?"+$.param(query);
  }
  function sort(value){
    object.assign(query,{'sortByComments': value});

    window.location.href = "{{route('post.index')}}?"+$.param(query);
  }
  </script>
  @endsection
