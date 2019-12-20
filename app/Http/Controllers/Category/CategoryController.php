<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Controllers\ApiConroller;
use App\Transformers\CategoryTransformer;
use Illuminate\Http\Request;

class CategoryController extends ApiConroller
{


    public function __construct()
    {
        // parent::__construct();
        $this->middleware('client.credentials')->only(['index' , 'show']);
        $this->middleware('auth:api')->except(['index' , 'show']);

        $this->middleware('transform.input:'. CategoryTransformer::class)->only(['store' , 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catgories = Category::all();
        return $this->showAll($catgories);
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
            'name' => 'required',
            'description' => 'required',
        ];
        $this->validate($request, $rules);
        $data = $request->all();
        $user = Category::create($data);
        return $this->showOne($user, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $this->showOne($category);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $category->fill($request->only([
            'name',
            'description',
        ]));
        if ($category->isClean()) {
            return $this->errorResponse('You need to specify any different value to update', 422);
        }
        $category->save();
        return $this->showOne($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return $this->showOne($category);
    }
}
