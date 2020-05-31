<?php

Route::get('/', 'HomeController@index' );

Route::auth();
Route::get('/logout', 'Auth\LoginController@logout');



Route::group(['middleware' => 'admin'], function () {

    Route::get('/admin', 'AdminController@index');

    Route::resource('admin/users', 'AdminUsersController', ['names'=> [

        'index'=> 'admin.users.index',
        'create'=> 'admin.users.create',
        'store'=> 'admin.users.store',
        'edit'=> 'admin.users.edit'

    ]]);

    Route::get('/post/{id}', ['as'=>'home.post','uses'=>'AdminPostsController@post'] );

    Route::resource('admin/posts', 'AdminPostsController', ['names' => [

        'index'=> 'admin.posts.index',
        'create'=> 'admin.posts.create',
        'store'=> 'admin.posts.store',
        'edit'=> 'admin.posts.edit'

    ]]);

    Route::resource('admin/categories', 'AdminCategoriesController', ['names'=> [

        'index'=> 'admin.categories.index',
        'create'=> 'admin.categories.create',
        'store'=> 'admin.categories.store',
        'edit'=> 'admin.categories.edit'

    ]]);

    Route::resource('admin/media', 'AdminMediasController', ['names'=> [

        'index'=> 'admin.media.index',
        'create'=> 'admin.media.create',
        'store'=> 'admin.media.store',
        'edit'=> 'admin.media.edit'

    ]]);

    Route::delete('admin/delete/media', 'AdminMediasController@deleteMedia');

    Route::resource('admin/comments', 'PostCommentsController', ['names'=> [

        'index'=> 'admin.comments.index',
        'create'=> 'admin.comments.create',
        'store'=> 'admin.comments.store',
        'edit'=> 'admin.comments.edit',
        'show'=> 'admin.comments.show'

    ]]);

    Route::resource('admin/comment/replies', 'CommentRepliesController', ['names'=> [

        'index'=> 'admin.replies.index',
        'create'=> 'admin.replies.create',
        'store'=> 'admin.replies.store',
        'edit'=> 'admin.replies.edit'
        
    ]]);
        
});