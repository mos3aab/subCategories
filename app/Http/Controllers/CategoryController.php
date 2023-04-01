<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listCategories()
    {
        $categories = Category::where('parent_id', NULL)->get();
        return view('categories/list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCategory()
    {
        $categories = Category::where('parent_id', NULL)->get();
        return view('categories/add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editCategory($id)
    {
        $categories = Category::where('parent_id', NULL)->get();
        $category_data = Category::where('id', $id)->first();
        return view('categories/edit', compact('categories'), ['category_data' => $category_data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function saveCategory(Request $request,$id)
    {
        //
        $data = $request->all();

        if (isset($id) && $id != 0) {

            $parent = null;
            if ($request->selected_parent === '') {
                $parent = null;
            } else {
                $parent = $request->selected_parent;
            }

            Category::where("id", $id)->update([
                "name" => $request->category_name,
                "description" => $request->description,
                "parent_id" => $parent
            ]);


        } else {

            $record = new Category();
            $record->name  = $request->category_name;
            $record->description = $request->description;
            if ($request->selected_parent === '') {
                $record->parent_id  =  null;
            } else {
                $record->parent_id  =  $request->selected_parent;
            }

            $record->save();

        }
        return redirect('/category/list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function deleteCategory(Request $request,$id)
    {
        if( isset( $id) ) {
            $sub_count = Category::where("parent_id", $id)->get();
            if( count( $sub_count) > 0 ) {
                return json_encode(['data' => [],'success' => false,'error' => 'Cannot delete selected Category. Please ensure that it does not have sub category.']);
            } else {
                Category::where("id", $id)->delete();
                return json_encode(['data' => [],'success' => true,'error' => 0]);
            }
        }
        return json_encode(['data' => [],'success' => false,'error' => 'No Id Found']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function loadSelect(Request $request)
    {
        $categories = Category::where('parent_id', NULL)->get();
        return view('test', compact('categories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function SelectChild($id)
    {
        $category = Category::find($id);

        return json_encode(['data' => $category->subcategory,'success' => true,'error' => 0]);
    }
}
