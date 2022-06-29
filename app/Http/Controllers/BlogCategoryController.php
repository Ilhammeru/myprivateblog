<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Blog Category';
        return view('cms.blog-category.index', compact('pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|unique:blog_category,name'
        ];
        $messageRules = [
            'name.required' => 'Name cannot be null'
        ];
        $validation = Validator::make(
            $request->all(),
            $rules,
            $messageRules
        );
        if ($validation->fails()) {
            $error = $validation->errors()->all();
            return sendResponse(
                ['error' => $error],
                'VALIDATION_FAILED',
                500
            );
        }

        try {
            $name = $request->name;
            $isHaveDetail = $request->is_have_detail;
            $data = [
                'name' => $name,
                'is_have_detail' => $isHaveDetail
            ];
            
            BlogCategory::updateOrCreate($data);
            return sendResponse([]);
        } catch (\Throwable $th) {
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
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $blogCategory = BlogCategory::find($id);
            return sendResponse($blogCategory);
        } catch (\Throwable $th) {
            return sendResponse(
                ['error' => $th->getMessage()],
                'FAILED',
                500
            );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blogCategory = BlogCategory::find($id);
        $name = $request->name;
        $isHaveDetail = $request->is_have_detail;
        $rules = [
            'name' => 'required'
        ];

        if (strtolower($blogCategory->name) != strtolower($name)) {
            $rules['name'] = 'unique:blog_category,name';
        }
        $messageRules = [
            'name.required' => 'Name cannot be null'
        ];
        $validation = Validator::make(
            $request->all(),
            $rules,
            $messageRules
        );
        if ($validation->fails()) {
            $error = $validation->errors()->all();
            return sendResponse(
                ['error' => $error],
                'VALIDATION_FAILED',
                500
            );
        }

        try {
            $blogCategory->name = $name;
            $blogCategory->is_have_detail = $isHaveDetail;
            $blogCategory->updated_at = Carbon::now();
            $blogCategory->save();
            return sendResponse([]);
        } catch (\Throwable $th) {
            return sendResponse(
                ['error' => $th->getMessage()],
                'FAILED',
                500
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $check = Blog::select('id')->where('category_id', $id)->first();
            if ($check) {
                return sendResponse(
                    ['error' => 'Failed to delete relationship item'],
                    'FAILED',
                    500
                );
            }
            BlogCategory::where('id', $id)->delete();
            return sendResponse([]);
        } catch (\Throwable $th) {
            return sendResponse(
                ['error' => $th->getMessage()],
                'FAILED',
                500
            );
        }
    }
}
