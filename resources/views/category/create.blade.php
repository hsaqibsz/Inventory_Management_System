@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="col-md-8 col-md-offset-2" >
            <div class="panel panel-default">
                <div class="panel-heading">Add new category</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                     <form role="form" action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                       {{ csrf_field() }}
                       <div class="box-body">
                           <div class="form-group">
                             <label for="name">Name</label>
                             <input type="text" class="form-control" id="name" name="name" placeholder="name">
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


    </div>
 
@endsection
