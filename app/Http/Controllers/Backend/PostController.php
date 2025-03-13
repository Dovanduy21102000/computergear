<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BaseCRUDController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PostController extends BaseCRUDController
{
    public $model       = Post::class;
    public $pathView    = 'backend.post.';
    public $urlBase     = 'posts.';
    public $fieldImage  = 'image';
    public $folderImage = 'posts/images';

    public $titleIndex = 'Danh sách tin tức';
    public $titleCreate = 'Thêm mới tin tức';
    public $titleEdit = 'Chỉnh sửa tin tức';

    public $columns = [
        'name'          => 'Tiêu đề',
        'slug'          => 'Slug',
        'intro'         => 'Intro',
        'image'         => 'Ảnh',
        'category_id'   => 'Nhóm tin tức',
        'user_id'       => 'Người tạo',
        'status'        => 'Trạng thái',
        'featured'      => 'Nổi bật?',
        'created_at'    => 'Tạo lúc',
        'updated_at'    => 'Lần cuối cập nhật'
    ];


    public function create()
    {
        $categories = Category::all();

        return view($this->pathView . 'add', compact('categories'))
            ->with('urlBase', $this->urlBase)
            ->with('title', $this->titleCreate)
        ;
    }

    protected function validateStore(Request $request)
{
    $request->validate([
        'name'          => ['required', 'max:255', Rule::unique('posts', 'name')],
        'slug'          => ['required', 'max:255', Rule::unique('posts', 'slug')],
        'intro'         => ['nullable', 'max:500'],
        'content'       => ['required'],
        'category_id'   => ['required', 'exists:categories,id'],
        'status'        => ['required', Rule::in([0, 1])],
        'featured'      => ['nullable', Rule::in([0, 1])],
        'image'         => ['nullable', 'image', 'max:2048'],
    ]);
}

protected function validateUpdate(Request $request, $id)
{
    $request->validate([
        'name'          => ['required', 'max:255', Rule::unique('posts', 'name')->ignore($id)],
        'slug'          => ['required', 'max:255', Rule::unique('posts', 'slug')->ignore($id)],
        'intro'         => ['nullable', 'max:500'],
        'content'       => ['required'],
        'category_id'   => ['required', 'exists:categories,id'],
        'status'        => ['required', Rule::in([0, 1])],
        'featured'      => ['nullable', Rule::in([0, 1])],
        'image'         => ['nullable', 'image', 'max:2048'],
    ]);
}
}
