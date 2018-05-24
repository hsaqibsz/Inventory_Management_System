@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="col-md-8 col-md-offset-2" >
             
                <h2> Edit new category</h2>

                <div class="card border-shadow" style="padding: 6px; margin: 5px;">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                     <form role="form" action="{{ route('category.update',$category->id) }}" method="post" enctype="multipart/form-data">
                       {{ csrf_field() }}
                       {{ method_field('patch') }}
                       <div class="box-body">
                           <div class="form-group">
                             <label for="name">Name</label>
                             <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
                           </div>

                        <div class="box-footer">
                         <input type="submit" class="btn btn-primary">
                         <a href='{{ route('category.index') }}' class="btn btn-warning">Back</a>
                       </div>
                     </form>
                     </div>
                 
            </div>
        </div>


    </div>
 
@endsection
