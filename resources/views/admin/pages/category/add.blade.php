@extends('admin.layouts.master')

@section('title')
    Thêm danh mục sản phẩm
@endsection

@section('content')
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Category</h6>
</div>
    <div class="row">
        <div class="col-lg-12">
            <form role="form" action="{{ route('category.store') }}"  method="POST">
                @csrf
                <fieldset class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" placeholder="Nhập tên Category">
                </fieldset>
                <div class="form-group" name="status">
                    <label>Status</label>
                    <select class="form-control">
                        <option value="1">Hiển thị</option>
                        <option value="0">Không Hiển thị</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Submit Button</button>
                <button type="reset" class="btn btn-danger">Reset Button</button>

            </form>
        </div>
    </div>
@endsection