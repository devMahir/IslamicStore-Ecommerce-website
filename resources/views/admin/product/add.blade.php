@extends('admin.admin-master')

@section('products') active @endsection

@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      <span class="breadcrumb-item active">Add Products</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-12">
                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Add new Products</h6><br>
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_name" placeholder="Product Name">
                            </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_code" placeholder="Product Code">
                            </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="number" name="price" value="{{ old('price') }}" placeholder="Product Price">
                            </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="number" name="product_quantity" value="{{ old('product_quantity') }}" placeholder="Product Quantity">
                                </div>
                            </div><!-- col-4 -->
                            
                            <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Cateogry: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="category_id" data-placeholder="Choose country">
                                <option label="Choose Category"></option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category -> id }}">{{ $category -> category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                  <label class="form-control-label">Band: <span class="tx-danger">*</span></label>
                                  <select class="form-control select2" name="brand_id" data-placeholder="Choose country">
                                    <option label="Choose Brand"></option>
                                    @foreach ($brands as $brand)
                                            <option value="{{ $brand -> id }}">{{ $brand -> brand_name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Short Description: <span class="tx-danger">*</span></label>
                                    <textarea name="short_description" id="summernote"></textarea>
                                </div>
                            </div><!-- col-12 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Long Description: <span class="tx-danger">*</span></label>
                                    <textarea name="long_description" id="summernote2"></textarea>
                                </div>
                            </div><!-- col-12 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                <label class="form-control-label">Main Thumbnail: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="file" name="image_one">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                <label class="form-control-label">2nd Image: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="file" name="image_two">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                <label class="form-control-label">3rd Image: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="file" name="image_three">
                                </div>
                            </div><!-- col-4 -->

                        </div><!-- row -->
                        <div class="form-layout-footer">
                            <button class="btn btn-info mg-r-5">Submit Form</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </div><!-- card -->
            </div>
        </div>
    </div>
</div>
@endsection