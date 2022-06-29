<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'is_post' => 'required'
        ];
        $validation = Validator::make(
            $request->all(),
            $rules
        );
        if ($validation->fails()) {
            $error = $validation->errors()->all();
            return sendResponse(
                ['error' => $error],
                'VALIDATION_FAILED',
                500
            );
        }

        DB::beginTransaction();
        try {
            $title = $request->title;
            $content = $request->content;
            $author = Auth::id();
            $status = $request->status ?? FALSE;
            $categoryId = $request->category_id;
            $detailCategory = $request->detail_category_id;
            $isPost = $request->is_pot;

            $data = [
                'title' => $title,
                'content' => $content,
                'author' => $author,
                'status' => $status,
                'categoryId' => $categoryId,
                'detail_category_id' => $detailCategory,
                'is_post' => $isPost,
                'created_at' => Carbon::now()
            ];

            Blog::insertGetId($data);

            $categoryName = BlogCategory::select('name')->where('id', $categoryId)->first()->name;

            // handle image
            $file = $request->photo; // request from FormData ajax request
            $fileName = $file->getClientOriginalName();
            // TODO: using filepond plugins javascript
            if ($fileName != 'blob') {
                $ext = $file->getClientOriginalExtension();
                $fileName = 'TPU' . Auth::user()->tpu_id . '-' . date('ymdHis') . '-' . $fileName;

                $path = $file->storeAs("blog/$categoryName", $fileName, 'public');
                if ($path) {
                    // compress image size
                    $compress = imagejpeg(imagecreatefromjpeg($file), 'blog/' . $categoryName . '/' . $fileName, 50);
                    if ($compress) {
                        $livePath = 'blog/' . $categoryName . '/' . $fileName;
                    }
                }
            }

            DB::commit();
            return sendResponse([]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return sendResponse(
                ['error' => $th->getMessage()],
                'FAILED',
                500
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
