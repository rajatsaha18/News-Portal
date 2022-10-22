<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    private static $news;
    private static $directory;
    private static $imageUrl;
    private static $imageName;

    public static function getImageUrl($image)
    {
        self::$imageName = $image->getClientOriginalName();
        self::$directory = 'news-images/';
        $image->move(self::$directory,self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function createNews($request)
    {
        self::$news = new News();
        self::$news->category_id     = $request->category_id;
        self::$news->subcategory_id  = $request->subcategory_id;
        self::$news->title           = $request->title;
        self::$news->description     = $request->description;
        self::$news->image           = self::getImageUrl($request->file('image'));
        self::$news->save();
    }

    public static function updateNews($request, $id)
    {
        self::$news = News::find($id);
        if($request->file('image'))
        {
            if(file_exists(self::$news->image))
            {
                unlink(self::$news->image);
            }
            self::$imageUrl = self::getImageUrl($request->file('image'));
        }
        else
        {
            self::$imageUrl = self::$news->image;
        }
        self::$news->title           = $request->title;
        self::$news->description     = $request->description;
        self::$news->image           = self::$imageUrl;
        self::$news->save();
    }

    public static function deleteNews($id)
    {
        self::$news= News::find($id);
        if(file_exists(self::$news->image))
        {
            unlink(self::$news->image);
        }
        self::$news->delete();
    }

// Relationship between news to category(one to one) and news to subcategory(one to one)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
