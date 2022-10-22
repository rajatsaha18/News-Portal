<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $categories;
    private $subCategories;
    private $news;
    private $newses;
    public function index()
    {
        $this->categories = Category::all();
        $this->subCategories = SubCategory::all();
        return view('admin.news.index',[
            'categories' => $this->categories,
            'subCategories' => $this->subCategories
        ]);
    }

    public function getSubCategory()
    {
        $categoryId = $_GET['id'];
        $subCategories = SubCategory::where('category_id', $categoryId)->get();
        return response()->json($subCategories);
    }

    public function create(Request $request)
    {
        $this->news = News::createNews($request);
        return redirect()->back()->with('message','News Create Successfully');
    }

    public function manage()
    {
        $this->newses = News::all();
        return view('admin.news.manage',['newses' => $this->newses]);
    }

    public function edit($id)
    {
        $this->news = News::find($id);
        return view('admin.news.edit', ['news' => $this->news]);
    }

    public function update(Request $request, $id)
    {
        News::updateNews($request, $id);
        return redirect('/manage-news')->with('message', 'News update Successfully');
    }

    public function delete($id)
    {
        News::deleteNews($id);
        return redirect()->back()->with('message', 'Delete News Successfully');
    }


}
