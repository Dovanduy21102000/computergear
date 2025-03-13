@php
    //  dd($columns);
@endphp

@extends('backend.dashboard.layout')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Bài viết</h2>
            <ol class="breadcrumb" style="margin-bottom:10px;">
                <li>
                    <a href="{{ route('dashboard.index') }}">Dashboard</a>
                </li>
                <li class="active"><strong>Bài viết</strong></li>
            </ol>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ $title }}</h5>
            </div>
            <div class="ibox-content col-lg-8">

                <div class="filter-wrapper">
                    <div class="uk-flex uk-flex-middle uk-flex-space-between">
                        <a href="{{ route($urlBase . 'create') }}" class="btn btn-danger"><i class="fa fa-plus mr5"></i>Thêm
                            mới bài viết</a>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    @foreach ($columns as $col => $name)
                        <td>{{ $name }}</td>
                    @endforeach
                    <td>
                        Thao tác
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>
                            <div class="name"><span class="maintitle">{{ $item->name }}</span></div>
                        </td>
                        <td>
                            <div class="slug">{{ $item->slug }}</div>
                        </td>
                        <td style="width: 250px">
                            <div class="intro">{{ $item->intro }}</div>
                        </td>
                        <td>
                            <div class="image mr5">
                                <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('backend/img/mvc_logo.png') }}"
                                    alt="Image" width="100">
                            </div>
                        </td>
                        <td>
                            <div class="post_category">{{ $item->category_id }}</div>
                        </td>
                        <td>
                            <div class="user_id">{{ $item->user_id }}</div>
                        </td>
                        <td>
                            <div class="status">{{ $item->status }}</div>
                        </td>
                        <td>
                            <div class="featured">{{ $item->featured }}</div>
                        </td>
                        <td>
                            <div class="created_at">{{ $item->created_at }}</div>
                        </td>
                        <td>
                            <div class="updated_at">{{ $item->updated_at }}</div>
                        </td>

                        <td class="text-center text-nowrap" style="width: 1px;">
                            <a href="{{ route($urlBase . 'edit', $item) }}" class="btn btn-success">Sửa<i
                                    class="fa fa-edit"></i></a>
                            <a href="{{ route($urlBase . 'show', $item) }}" class="btn btn-success">Xem<i
                                    class="fa fa-edit"></i></a>

                            <form action="{{ route($urlBase . 'destroy', $item) }}" method="post"
                                id="item-{{ $item->id }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Xoá<i class="fa fa-trash"></i></button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    </div>
    </div>
@endsection
