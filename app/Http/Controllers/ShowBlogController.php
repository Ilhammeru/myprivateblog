<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class ShowBlogController extends Controller
{
    public function index() {
        $blog = Blog::with(['image', 'category', 'detailCategory'])
            ->where([
                'is_post' => 1,
                'status' => 1
            ])
            ->get();
        $pageTitle = "Blog";
        return view('users.blog', compact('blog', 'pageTitle'));
    }
}
