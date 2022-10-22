<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $newses;
    private $news;
    private $category;
    private $subCategory;
    private $subCategories;

    public function index()
    {
        $this->newses = News::orderBy('id','desc')->take(8)->get();
        return view('website.home.home',['newses' => $this->newses]);
    }

    public function category($id)
    {
        $this->newses = News::where('category_id', $id)->orderBy('id', 'desc')->get();
        $this->newses = News::where('category_id', $id)->paginate(3);
        $this->subCategories = SubCategory::where('category_id', $id)->get();
        $this->category = Category::find($id);
        return view('website.category.category',[
            'newses' => $this->newses,
            'category' => $this->category,
            'subCategories' => $this->subCategories,
        ]);
    }

    public function subCategory($id)
    {
        $this->newses = News::where('subcategory_id', $id)->orderBy('id', 'desc')->get();
        $this->subCategory = SubCategory::find($id);
        return view('website.subcategory.subcategory',[
            'newses' => $this->newses,
            'subCategory' => $this->subCategory,
        ]);
    }

    public function detail($id)
    {
        $this->news = News::find($id);
        return view('website.detail.detail',[
            'news' => $this->news,
        ]);
    }
}
