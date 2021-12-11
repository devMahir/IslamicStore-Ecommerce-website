@extends('admin.admin-master')

@section('category') active @endsection

@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dashboard</a>
        <a href="{{ route('admin.category') }}" class="breadcrumb-item active">Category</a>
        <span class="breadcrumb-item active">Edit</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-8 m-auto">
                <div class="card">
                    <div class="card-header">Edit Category

                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('success')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form action="{{ route('update.category') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $category->id }}" name="cat_id">
                            <div class="form-group">
                                <label for="exampleInputEmail">Add Categorey</label>
                                <input type="text" name="category_name" class="form-control @error('category_name') is-invalid                            
                                @enderror" id="exampleInputEmail" aria-describedby="emailHelp" value="{{ $category->category_name }}">
                                
                                @error('category_name')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection