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
                              </select>  
                              <label for="status_filter">Filter By Status &nbsp; </label>
                              <input type="text" class="form-control" id="keyword" placeholder="Enter Keyword " id="keyword">
                              <span>&nbsp;</span>
                              <button type="button" class="btn btn-primary">Search</button>

                              <a href="#" class="btn btn-success">Clear</a>
                              
                        
                    
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
                            <a href="#"><i class="fas fa-sort-down"></I></a>
                            <a href="#"><i class="fas fa-sort-up"></I></a>
                            <a href="#"><i class="fas fa-sort"></I></a>
                          </th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>

                        <tr>
                          <td>1</td>
                          <td style="width: 35%">Post Title</td>
                          <td>Onix Lumumba</td>
                          <td>Technology</td>
                          <td align ="center">2</td>
                          <td style="width: 250px">
                            <a href="#" class="btn btn-primary">View</a>
                            <a href="#" class="btn btn-success">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                          </td>
                        </tr>

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
