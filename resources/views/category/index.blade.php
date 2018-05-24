@extends('layouts.app')
@section('content')


  <div class="container">
 
        <div class="col-md-10 col-md-offset-2 " >
            <div class="panel panel-default " style="overflow-x: scroll;">
                <div class="panel-heading">Categories list <a href="{{route('category.create')}}" class="btn btn-info">Add New</a></div>
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>name</th>
                              <th>Delete</th>
                              <th>Edit</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($category as $category)
                            <tr>
                              <td>{{$category->name}}</td>
                              <td>  <form action="{{route('category.destroy',$category->id)}}" method="post" accept-charset="utf-8" >
                                <input type="submit" class="btn btn-danger" value="Delete" name="">
                                 {{csrf_field()}}
                                 {{method_field('DELETE')}}
                              </form>

                            </td>
                              <td><a href="{{route('category.edit',$category->id)}}"  title="" class="btn btn-primary">Edit</a></td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                 </div>
            </div>
 
    </div>
  </div>
 
@endsection
