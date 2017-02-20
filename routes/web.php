<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//get = get data to display
//post = from form
//put path = data to update to database
//delete = data to delete to database

Route::get('/', function (){ 
    //return myfunc();
    /*$authors = loadJSON('authors');
    dd($authors);
    //$author = $authors[0]; // first object in "data" array - Jack
    //return $author['id']; // Jack's name
    //echo $authors[0]['name'] . '<br>';
    //echo $authors[3]['place'] . '<br>';
    foreach($authors as $author){
      echo $author['id'] . $author['name'] . $author['role'] . $author['place'] . $author['avatar_url'] . '<br>';
    }*/
    return view('welcome');
});

//Use sometime
//controll@function
/*
Route::get('/', 'BlogController@index');
Route::get('/extend', 'BlogController@extend');
*/
//Use a lot resource(View,Controller)
Route::resource('/admin/blog','Admin\BlogController');

Route::get('/forums/{page?}', function ($page=1) {
    
    $objs = loadJSON('authors');
    
    $authors['authors'] = $objs;
        
    $objs = loadJSON('posts');
    
    $posts['posts'] = $objs;
    
    //Algorithm for calculate amount of page
    $total = sizeof($objs);
    $display_page = 8;
    //calculate remain post of last page
    $pluspage = $total%$display_page;
    if ($pluspage > 0) $pluspage = 1;
    else $pluspage = 0;
    $allpage = floor($total/$display_page) + $pluspage;
    /////////////////////////////////////
    
                                 
    //$data['page'] = $page;
    //dd($total);
    //set data to view
    return view('site.forums.forum',$authors,$posts)->with('page',$page)->with('allpage',$allpage)->with('display_page',$display_page);
        
    /*$objs = loadJSON('authors');
    $data['authors'] = $objs;
    return view('site.forums.forum',$data);*/
});

/*Route::get('/', function () {
    return view('welcome');
});*/

//extend layout
/*
Route::get('/', function () {
    return view('site.index');
});

Route::get('/extend', function () {
    return view('extend');
});
//////////
Route::get('/about', function () {
    //Transfer data type 1
    $data['name'] = 'Siam';
    $data['last_name'] = 'Nganphairojsakun';
    $data['people'] = ['si','am','kub'];
    return view('about',$data);
});
*/

//path : '.' equal '/'
/*
 * Route::get('/layout', function () {
    return view('site.layout');
});
 */
//Route::get('/about', function () {
    //Transfer data type 1
    /*
    $data['name'] = 'Siam';
    $data['last_name'] = 'Nganphairojsakun';
    return view('about',$data);
    */
    //Transfer data type 2
    /*
    $name = 'Siam';
    //compact process below
    //compact('name')) -> ['name' => 'Siam'];
    return view('about',compact('name'));
    */
    //Transfer data type 3
    //return view('about')->with('name','Siam')->with('last_name','Nganphairojsakun');
    //
    //Transfer data type 4
    //return view('about')->withName('Siam')->withLastName('Nganphairojsakun');
//});

//Route parameter type 1 (require parameter)
/*Route::get('/plus/{num1?}/{num2?}', function ($num1=0,$num2=0) {
    //echo $num1 . '+' . $num2 . '=' . ($num1+$num2);
    echo $num1 . '&' . $num2;
});*/
//})->where('num1','[0-9ก-ฮ]+')->where('num2','[a-zA-Z]+');
//regular Expression