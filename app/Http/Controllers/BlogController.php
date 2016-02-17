<?php

namespace App\Http\Controllers;

#use App\Http\Controllers\Controller;

use App\Post;
use Carbon\Carbon;
use App\Jobs\BlogIndexData;
use App\Http\Requests;
use App\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
	public function index(Request $request) {
/*		$posts = Post::where("published_at", "<=", Carbon::now())
			->orderBy("published_at", "desc")
			->paginate(config("blog.posts_per_page"));

		return view("blog.index", compact("posts"));
 */
		$tag = $request->get("tag");
		$data = $this->dispatch(new BlogIndexData($tag));
		$layout = $tag ? Tag::layout($tag) : "blog.layouts.index";

		return view($layout, $data);
	}

	public function showPost($slug, Request $request) {
		$post = Post::with("tags")->whereSlug($slug)->firstOrFail();
		$tag = $request->get("tag");
		if ($tag) {
			$tag = Tag::whereTag($tag)->firstOrFail();
		}
		return view($post->layout, compact("post", "tag"));
	}
}
