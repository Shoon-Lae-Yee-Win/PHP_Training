<?php

namespace App\Dao\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Dao\Category\CategoryDaoInterface;

/**
 * Data accessing oobject for post
 */
class CategoryDao implements CategoryDaoInterface
{
    /**
     * To get post
     * @return Array
     */
    public function getPost()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(3);
        return $categories;
    }

    /**
     * To store post
     * @param Request
     * @return Object
     */
    public function storePost($request)
    {
        $data = $this->categoryData($request);
        $categoryStore = Category::create($data);
        return $categoryStore;
    }

    /**
     * To edit post
     * @param id
     * @return Object
     */
    public function editPost($id)
    {
        $category = Category::where('id', $id)->first();
        return $category;
    }

    /**
     * To update post
     * @param Request,id
     * @return Object
     */
    public function updatePost($request, $id)
    {
        $data = $this->categoryData($request);
        $category = Category::where('id', $id)->update($data);
        return $category;
    }

    /**
     * To delete post
     * @param id
     * @return Object
     */
    public function deletePost($id)
    {
        $categoryDelete = Category::where('id', $id)->delete();
        return $categoryDelete;
    }

    /**
     * categoryData
     */
    private function categoryData($request)
    {
        return [
            'cat_name' => $request->cat_name,
        ];
    }
}
