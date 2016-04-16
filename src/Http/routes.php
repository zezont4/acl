<?php
if (env('APP_ENV') == 'local') {
	Route::group(['prefix' => 'admin', 'middleware' => ['web']], function () {
//        Route::get('/', 'ACLController@showTables');

		/*Users routes*/

		/* Show */
		Route::get('user/{id}/show', ['as' => 'user.show', 'uses' => 'ACLUserController@show', 'middleware' => 'acl:admin-user']);
		/* Search */
		Route::get('search/user', ['as' => 'user.search', 'uses' => 'ACLUserController@search', 'middleware' => 'acl:admin-user']);
		Route::get('users', ['as' => 'user.index', 'uses' =>        'ACLUserController@index', 'middleware' => 'acl:admin-user']);
		/* Edit */
		Route::get('user/{id}/edit', ['as' => 'user.edit', 'uses' => 'ACLUserController@edit','middleware'=>'auth']);
		Route::put('user/{id}/update', ['as' => 'user.update', 'uses' => 'ACLUserController@update','middleware'=>'auth']);
		/* Create */
		Route::get('user/create', ['as' => 'user.create', 'uses' => 'ACLUserController@create', 'middleware' => 'acl:admin-user']);
		Route::post('user', ['as' => 'user.store', 'uses' => 'ACLUserController@store', 'middleware' => 'acl:admin-user']);
		/* Delete */
		Route::delete('user/{id}', ['as' => 'user.destroy', 'uses' => 'ACLUserController@destroy', 'middleware' => 'acl:admin-user']);
		Route::post('user/{id}/restore', ['as' => 'user.restore', 'uses' => 'ACLUserController@restore', 'middleware' => 'acl:admin-user']);
		/************************************************/

	});
}