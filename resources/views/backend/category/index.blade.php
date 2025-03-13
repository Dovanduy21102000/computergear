@php
    //  dd($columns);
@endphp

@extends('backend.dashboard.layout')
@section('content')
    @php
        $columns = session()->get('columns');
        $urlBase = session()->get('urlBase');
    @endphp
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
                <h5>Danh sách bài viết </h5>

            </div>
            <div class="ibox-content col-lg-8">
                <form action="http://localhost:81/vphome/public/post/index">
                    <div class="filter-wrapper">
                        <div class="uk-flex uk-flex-middle uk-flex-space-between">
                            <a href="http://localhost:81/vphome/public/post/create" class="btn btn-danger"><i
                                    class="fa fa-plus mr5"></i>Thêm mới bài viết</a>
                        </div>
                    </div>
            </div>
        </div>
        </form>

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
                <tr>
                    @foreach ($data as $item)
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
                                <img src="backend/img/not-found.jpg" alt="">
                            </div>
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
                    @endforeach
                </tr>
            </tbody>
        </table>

    </div>
    </div>
    </div>
@endsection
