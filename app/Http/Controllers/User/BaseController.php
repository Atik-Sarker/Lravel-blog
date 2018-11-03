<?php

namespace App\Http\Controllers\User;

use App\Appearance;
use App\category;
use App\SocialLink;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\CategoryPost;

class BaseController extends Controller
{
    public function index()
    {
        //========== show all post for EndUser ==========
        $posts = Post::where('status', true)->orderBy('created_at', 'DESC')->paginate(4);
        $categories = category::all();
        $categoryCosts = category::findORFail(1)->posts();
        $categoryPosts = category::findORFail(5)->posts();
        $categoryPosts2 = category::findORFail(3)->posts();
        $link = SocialLink::where('id', 1)->first();
        $appearance = Appearance::where('id', 1)->first();
//        return $links;

        return view('fontEnd.musterhome', compact('posts', 'categories', 'categoryCosts', 'categoryPosts', 'categoryPosts2', 'link', 'appearance'));
    }
    //============= show all category post for EndUser and add pagination on category model =================
    public  function category($categoryId, $slug)
    {
        $posts = category::findOrFail($categoryId);

        return $posts->posts();

//        return view('fontEnd.musterhome', compact('posts'));

        return view('fontEnd.musterhome');
    }
    //============= show all tag post for EndUser and add pagination on tag model =================
    public  function tag($tagId){
//        $posts = Tag::findOrFail($tagId)->posts();
//        return view('fontEnd.musterhome', compact('posts'));

        return view('fontEnd.musterhome');
    }


}
