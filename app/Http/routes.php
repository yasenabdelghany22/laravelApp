<?php

use App\Post;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// ROUTE::get('/contact', function(){
// 	return "Contact Page";
// });

// ROUTE::get('/about', function(){
// 	return "About Page";
// });

// Route::get('/contact/{id}/{name}', function($id,$name){
// 	return "Contact num" .$id . " ".$name;
// });

// Route::get('admin/posts/example',array('as'=>'admin.home', function(){
// 	$url = route("admin.home");
// 	return "route is".$url;
// }));
// Route::get('/post/{id}','PostsController@index');

// Route::resource('posts','PostsController');

Route::get('/contact','PostsController@contact');

Route::get('/posts/{id?}/{name?}/{password?}', 'PostsController@showPost');

Route::get('/insert', function(){

	DB::insert('insert into posts (title,content,name) values (?,?,?)', ["PHP", "php is the best with laravwel", 'sdads']);

});

// Route::get('/read', function(){

// 	$result = DB::select('select * from users where id = ?', [1]);

// 	foreach($result as $user){
// 		return $user->email;
// 	}
// });

// Route::get('/update', function(){

// 	$update = DB::update('update users set name = "Salah" where id = ?', [1]);

// 	return $update;
// });

Route::get('/find', function(){

	// $posts = Post::all();

	$post = Post::find(2);

	return $post->title;

	// foreach($posts as $post) {
	// 	return $post->title;
	// }
});

Route::get('/findwhere', function(){

	$posts = Post::where('name','sdadssdasdasds')->orderBy('id','desc')->take(3)->get();

	return $posts;
});

Route::get('/findmore', function(){

	$posts = Post::where('id', '>', '2')->firstOrFail();

	return $posts;
});

Route::get('/basicinsert', function(){

	$post = new Post;

	$post->title   = 'new post 2 ';
	$post->content = 'post content 2 ';
	$post->name    = 'SaID';

	$post->save();

});

Route::get('/create', function(){

	Post::create(['title'=>'create method', 'content'=>'create content', 'name'=>'Ahmed']);
});

Route::get('/update1', function(){

	$post = Post::find(10);

	$post->title   = 'title update 1';
	$post->content = 'content updaate 1';
	$post->save();

});

Route::get('/update2', function(){

	Post::where('id',9)->where('is_admin',0)->update(['title'=>'title update 2','content'=>'conten update 2']);

});

Route::get('/delete1', function(){

	$post = Post::find(1);
	$post->delete();

});

Route::get('/delete2', function(){
	Post::destroy(2);
});
Route::get('/delete3', function(){
	Post::destroy([3,4,5]);
});

Route::get('/delete4', function(){
	Post::where('id',9)->delete();
});

Route::get('/softdelete', function(){
	Post::where('id',2)->delete();
});

Route::get('/readsoftdelete', function(){
	// $post =  Post::find(1);
	$post = Post::onlyTrashed()->get();
	return $post;
});

Route::get('/restore', function(){
	Post::onlyTrashed()->restore();
});

Route::get('/forcedelete', function(){

	Post::onlyTrashed()->forcedelete();
});