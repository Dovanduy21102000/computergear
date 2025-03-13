@extends('backend.dashboard.layout')
@section('content')
    <div class="col-lg-9">
        <div class="ibox">
            <div class="ibox-title">
                <h5>{{ $title }}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route($urlBase . 'store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb15">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <label for="name" class="control-label text-left">Tiêu đề <span
                                        class="text-danger">(*)</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                    placeholder="Nhập tiêu đề" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mb15">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <label for="intro" class="control-label text-left">Mô tả ngắn</label>
                                <input type="text" name="intro" value="{{ old('intro') }}" class="form-control"
                                    placeholder="Nhập mô tả ngắn">
                            </div>
                        </div>
                    </div>

                    <div class="row mb15">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <label for="content" class="control-label text-left">Nội dung</label>
                                <textarea name="content" class="form-control" rows="4" placeholder="Nhập nội dung">{{ old('content') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mb15">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <label for="category_id" class="control-label text-left">Nhóm tin tức</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mb15">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <label for="status" class="control-label text-left">Trạng thái</label>
                                <select name="status" class="form-control">
                                    <option value="1">Hoạt động</option>
                                    <option value="0">Không hoạt động</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mb15">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <label for="featured" class="control-label text-left">Nổi bật?</label>
                                <select name="featured" class="form-control">
                                    <option value="1">Có</option>
                                    <option value="0">Không</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mb15">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <label for="image" class="control-label text-left">Hình ảnh</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row mb15">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <label for="meta_title" class="control-label text-left">Meta Title</label>
                                <input type="text" name="meta_title" value="{{ old('meta_title') }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row mb15">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <label for="meta_keywords" class="control-label text-left">Meta Keywords</label>
                                <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row mb15">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <label for="meta_description" class="control-label text-left">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mt20">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">Lưu bài viết</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
