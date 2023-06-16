
<?php

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




/**
|
|------------------------------------------------------------------------------------
|   Public routes start here
|------------------------------------------------------------------------------------
|
*/





/**
|
|------------------------------------------------------------------------------------
|   Static general purpose public routes
|------------------------------------------------------------------------------------
|
*/


/**
 * 
 * General purpose public pages
 * 
 */
Route::get('/',                 ['as'=>'home',  'uses'=> 'StaticPageController@home']);
Route::get('contact-us',        'StaticPageController@contact');
Route::post('contact-us',       'StaticPageController@postContact');
Route::get('page/{name}',       'StaticPageController@page');
Route::get('blog/{name}',       'StaticPageController@singleBlog');
Route::post('subscribers/subscribe',    'Subscribers@subscribe');
Route::get('subscribers/unsubscribe',   'Subscribers@unsubscribe');
Route::post('subscribers/unsubscribe',  'Subscribers@unsubscribe');
Route::get('privacy', 'StaticPageController@privacy');
Route::get('terms', 'StaticPageController@terms');

Route::get('concerns',          'StaticPageController@concerns');
Route::get('circulars/{id}',    'StaticPageController@showCircular');
Route::get('circulars',         'StaticPageController@circulars');

Route::get('product-search', 'StaticPageController@productSearch');


/*
|
|-----------------------------------------------------------------------------------
|User Login, Logout, Forgot Password
|-----------------------------------------------------------------------------------    
|
|   3 sets of Routes:
|           - GET   - login landing page
|           - POST  - login form post route
|           - GET   - logout through get
|
|           - GET   - forgot password landing page
|           - POST  - forgot password form post route
|
|           - GET   - Signup landing page
|           - POST  - Signup form post route
|
*/

Route::get('login',             ['as'=>'login', 'uses'=> 'AccessController@login']);
Route::get('signup',            ['as'=>'signup','uses'=> 'AccessController@signup']);
Route::get('logout',            ['as'=>'logout','uses'=> 'AccessController@logout']);

Route::get('forgot-password',   'AccessController@forgotPassword');
Route::post('forgot-password',  'AccessController@postForgotPassword');
Route::get('social/{name}',     'AccessController@social');
Route::post('login',            'AccessController@postLogin');
Route::post('signup',           'AccessController@postSignup');


/**
 * ----------------------------------
 * E-commerce public routes
 * ----------------------------------
*/

Route::get('products', 'ProductPublic@index');

// Categories
Route::get('necklace', 'CategoryPublic@necklace');
Route::get('necklace/{productID}', 'CategoryPublic@necklaceItem');
Route::get('earring', 'CategoryPublic@earring');
Route::get('earring/{productID}', 'CategoryPublic@earringItem');
Route::get('metal-purse', 'CategoryPublic@purse');
Route::get('metal-purse/{productID}', 'CategoryPublic@purseItem');
Route::get('finger-ring', 'CategoryPublic@fingerring');
Route::get('finger-ring/{productID}', 'CategoryPublic@fingerringItem');
Route::get('nose-pin', 'CategoryPublic@nosepin');
Route::get('nose-pin/{productID}', 'CategoryPublic@nosepinItem');
Route::get('mirror', 'CategoryPublic@mirror');
Route::get('mirror/{productID}', 'CategoryPublic@mirrorItem');
Route::get('jewelry-box', 'CategoryPublic@jewelrybox');
Route::get('jewelry-box/{productID}', 'CategoryPublic@jewelryboxItem');
Route::get('sharee', 'CategoryPublic@sharee');
Route::get('sharee/{productID}', 'CategoryPublic@shareeItem');
Route::get('others', 'CategoryPublic@others');
Route::get('others/{productID}', 'CategoryPublic@othersItem');



/**
|
|------------------------------------------------------------------------------------
|   Admin area
|------------------------------------------------------------------------------------
|
*/



Route::group(['middleware' => ['auth','permission'], 'prefix' => 'admin'], function() use ($router)
{
    
    /*
    |
    |-----------------------------------------------------------------------------------
    |Admin Dashboard
    |-----------------------------------------------------------------------------------    
    |
    |   COMMON DASHBOARD for all types of admin
    |   
    |
    */
    
    Route::get('dashboard', ['as'=>'dashboard','uses'=>'Dashboard@index']);


    
    /*
    |
    |-----------------------------------------------------------------------------------
    |User Roles
    |-----------------------------------------------------------------------------------    |
    |
    |   CRUD is done through resource route
    |
    |   Individual ROLE permission is managed through GET and POST request
    |   
    |
    */
    Route::get('roles/{id}/navs', 'Roles@navs');
    Route::post('roles/navs', 'Roles@postNavs');
    Route::get('roles/{id}/permissions', 'Roles@permissions');
    Route::post('roles/permissions', 'Roles@postPermissions');
    Route::resource('roles', 'Roles');







    /*
    |
    |-----------------------------------------------------------------------------------
    |Application Navs
    |-----------------------------------------------------------------------------------
    |
    |   CRUD is done through resource route
    |   
    |   Create, Read, Update only
    |
    */
    Route::resource('navs','Navs', ['except' => ['show', 'destroy', 'edit'] ] );



    /*
    |
    |-----------------------------------------------------------------------------------
    |Application Permission at each Action
    |-----------------------------------------------------------------------------------
    |
    |   CRUD is done through resource route
    |   
    |   Create, Read, Update only
    |
    */
    Route::post('permissions/search',       'Permissions@searchIndex');
    Route::get('permissions/search',        'Permissions@index' );
    Route::get('permissions/auto-update',   'Permissions@index' );
    Route::post('permissions/auto-update',  'Permissions@autoUpdate');
    Route::resource('permissions', 'Permissions');



    /*
    |
    |-----------------------------------------------------------------------------------
    | File manager
    |-----------------------------------------------------------------------------------
    |
    |   El-Finder File manager + Ace Editor
    |
    */
    Route::get('filemanager',        'FileManager@index' );




    /*
    |
    |-----------------------------------------------------------------------------------
    | Social media >> Default->Internal
    |-----------------------------------------------------------------------------------
    |
    |   CRUD is done through resource route
    |   
    */
    Route::post('socials/search', 'Socials@searchIndex');
    Route::get('socials/search', 'Socials@index' );
    Route::resource('socials', 'Socials');


    /*
    |
    |-----------------------------------------------------------------------------------
    |Application Users
    |-----------------------------------------------------------------------------------
    |
    |   CRUD is done through resource route
    |   
    */
    Route::get('users/sync-from-orders', 'Users@syncFromOrders');
    Route::get('user-search/{param}', 'Users@ajaxSearch');
    Route::get('users/search', 'Users@index' );
    Route::post('users/search', 'Users@postSearch');
    Route::resource('users','Users');
    
    

    /*
    |
    |-----------------------------------------------------------------------------------
    |Change Password
    |-----------------------------------------------------------------------------------
    |
    |   
    */
    Route::get('change-password', 'AccessController@changePassword');
    Route::post('change-password', 'AccessController@postChangePassword');
    
    
    /*
    |
    |-----------------------------------------------------------------------------------
    | Application settings
    |-----------------------------------------------------------------------------------
    |
    |   
    */
    Route::resource('settings', 'Settings', ['only'=> ['show', 'edit', 'update']]);
    
    
    /*
    |
    |-----------------------------------------------------------------------------------
    | Static pages
    |-----------------------------------------------------------------------------------
    |
    |   
    */
    Route::post('pages/search', 'Pages@searchIndex');
    Route::get('pages/search', 'Pages@index' );
    Route::resource('pages', 'Pages');
    
    
    /**
    *-------------------------------------------------------------------------------------------
    *   Application > Currencies
    *-------------------------------------------------------------------------------------------
    */
    Route::post('currencies/search', 'Currencies@searchIndex');
    Route::get('currencies/search', 'Currencies@index' );
    Route::resource('currencies', 'Currencies');
    
    /**
    *-------------------------------------------------------------------------------------------
    *   Application > Gateways
    *-------------------------------------------------------------------------------------------
    */
    Route::post('gateways/search', 'Gateways@searchIndex');
    Route::get('gateways/search', 'Gateways@index' );
    Route::resource('gateways', 'Gateways');
    
    /**
    *-------------------------------------------------------------------------------------------
    *   Application > Shippings
    *-------------------------------------------------------------------------------------------
    */
    Route::post('shippings/search', 'Shippings@searchIndex');
    Route::get('shippings/search', 'Shippings@index' );
    Route::resource('shippings', 'Shippings');
    
    
    /*
    |-----------------------------------------------------------------------------------
    |My Profile
    |-----------------------------------------------------------------------------------
    */
    Route::get('my-profile', 'MyProfile@show');
    Route::post('my-profile', 'MyProfile@update');
    Route::get('my-profile/edit', 'MyProfile@edit');
    

    /*
    |-----------------------------------------------------------------------------------
    |Change password
    |-----------------------------------------------------------------------------------
    */
    Route::get('my-profile/change-password', 'MyProfile@changePassword');
    Route::post('my-profile/change-password', 'MyProfile@updatePassword');
    

    /*
    |-----------------------------------------------------------------------------------
    |My Referrals
    |-----------------------------------------------------------------------------------
    */
    Route::get('my-referrals', 'MyProfile@myReferrals');
    
    
    /*
    |-----------------------------------------------------------------------------------
    |Courier
    |-----------------------------------------------------------------------------------
    */
    Route::get('couriers/report', 'Couriers@report');
    Route::post('couriers/report', 'Couriers@postReport');
    Route::resource('couriers', 'Couriers');
    
    
    /*
    |-----------------------------------------------------------------------------------
    |Category
    |-----------------------------------------------------------------------------------
    */
    Route::post('categories/search', 'Categories@searchIndex');
    Route::resource('categories', 'Categories');
    
    /*
    |-----------------------------------------------------------------------------------
    |Product
    |-----------------------------------------------------------------------------------
    */
    Route::get('price-tag', 'Products@priceTag');
    Route::get('order-list', 'Products@orderList');
    Route::get('product-list', 'Products@productList');
    Route::resource('products', 'Products');
    
    
    /*
    |-----------------------------------------------------------------------------------
    |Order
    |-----------------------------------------------------------------------------------
    */
    Route::get('products-for-order/{category_slug}', 'AdminOrders@productsForOrder');
    Route::get('admin-orders/ordered-products', 'AdminOrders@getOrderedProducts');
    Route::post('admin-orders/ordered-products', 'AdminOrders@postOrderedProducts');
    Route::get('admin-orders/{id}/edit', 'AdminOrders@edit');
    Route::patch('admin-orders/{id}/edit', 'AdminOrders@update');
    Route::get('admin-orders/create', 'AdminOrders@create');
    Route::post('admin-orders/create', 'AdminOrders@store');
    
    Route::get('admin-orders', 'AdminOrders@index');
    Route::get('admin-orders/dispatched', 'AdminOrders@dispatched');
    Route::get('admin-orders/delivered', 'AdminOrders@delivered');
    Route::get('admin-orders/all', 'AdminOrders@all');
    Route::get('admin-orders/get-user-by-phone', 'AdminOrders@getUserByPhone');
    
    Route::post('admin-orders', 'AdminOrders@storeNote');
    Route::post('admin-orders/dispatch', 'AdminOrders@postDispatch');
    Route::post('admin-orders/cancel-and-return', 'AdminOrders@postCancelAndReturn');
    Route::post('admin-orders/mark-delivered', 'AdminOrders@postMarkDelivered');
    Route::post('admin-orders/receive-payment', 'AdminOrders@postReceivePayments');
    Route::get('list-products-orders', 'AdminOrders@listProductOrders');
    Route::get('print-orders-for-customer', 'AdminOrders@printOrdersForCustomers');
    Route::get('print-orders-for-customer-compact', 'AdminOrders@printOrdersForCustomersCompact');
    
    Route::post('orders/admin-search', 'AdminOrders@search');
    Route::resource('orders', 'Orders');
    Route::resource('order-products', 'Order_products');
    
    
    Route::resource('cost_types', 'Cost_types');
    Route::post('costs/search', 'Costs@searchIndex');
    Route::resource('costs', 'Costs');
    
    Route::get('payments/search', 'Payments@search');
    Route::post('payments/search', 'Payments@searchIndex');
    Route::resource('payments', 'Payments');
    
    Route::get('sale-by-month', 'Reports@SaleByMonth');
    Route::get('income-statement', 'Reports@getIncomeStatement');
    Route::post('income-statement', 'Reports@postIncomeStatement');
    
    Route::get('balance-sheet', 'Reports@getBalanceSheet');
    Route::post('balance-sheet', 'Reports@postBalanceSheet');
    
    Route::get('sync', 'Products@sync_purchase_price_to_orders');
    
    Route::get('courier/pathao', 'Pathao@dispatch');
    
    Route::get('stock-revenue-summary', 'Reports@stockRevenueSummary');
    Route::post('stock-revenue-summary', 'Reports@postStockRevenueSummary');
    
    Route::get('ext-dispatch-update',  'Ext@dispatchList');
    Route::post('ext-dispatch-update', 'Ext@dispatchUpdate');
    
});












/**
|
|------------------------------------------------------------------------------------
|   Users area
|------------------------------------------------------------------------------------
|
*/



Route::group(['middleware'=>'auth','prefix'=>'user'], function()
{
    
    Route::get('dashboard', 'Dashboard@client');
    
    
    /*
    |-----------------------------------------------------------------------------------
    |My Profile
    |-----------------------------------------------------------------------------------
    */
    Route::get('my-profile', 'Clients@showProfile');
    Route::post('my-profile', 'Clients@updateProfile');
    Route::get('my-profile/edit', 'Clients@editProfile');
    

    /*
    |-----------------------------------------------------------------------------------
    |Change password
    |-----------------------------------------------------------------------------------
    */
    Route::get('my-profile/change-password', 'Clients@changePassword');
    Route::post('my-profile/change-password', 'Clients@updatePassword');
    

    /*
    |-----------------------------------------------------------------------------------
    |My Referrals
    |-----------------------------------------------------------------------------------
    */
    Route::get('my-referrals', 'Clients@myReferrals');

    /*
    |-----------------------------------------------------------------------------------
    |My Orders
    |-----------------------------------------------------------------------------------
    */
    Route::get('my-orders', 'Clients@myOrders');
    Route::get('my-orders/show/{id}', 'Clients@showMyOrder');
    Route::get('my-orders/edit/{id}', 'Clients@editMyOrder');
    

    /*
    |-----------------------------------------------------------------------------------
    |Track Delivery of My Orders
    |-----------------------------------------------------------------------------------
    */
    Route::get('delivery-status-of-my-orders', 'Clients@trackDeliveryOfMyOrders');
    

    /*
    |-----------------------------------------------------------------------------------
    |My Payment History
    |-----------------------------------------------------------------------------------
    */
    Route::get('my-payment-history', 'Clients@myPaymentHistory');
    

    /*
    |-----------------------------------------------------------------------------------
    |My Reward points
    |-----------------------------------------------------------------------------------
    */
    Route::get('my-reward-points', 'Clients@myPoints');
    
    
});



/**
*
* Blog admin routes
* 
*/
Route::group(['middleware'=>['auth','permission'],'prefix'=>'admin'], function()
{

    
    /**
    *-------------------------------------------------------------------------------------------
    *   Application > BLOG (Has Many - Slides, Comments)
    *-------------------------------------------------------------------------------------------
    */
    Route::get('blog-search/{param}', 'Blogs@ajaxSearch');
    Route::post('blogs/search',  'Blogs@searchIndex');
    Route::get('blogs/search', 'Blogs@index');
    Route::get('blogs/{id}/comments-create', 'Blogs@commentsCreate');   
    Route::get('blogs/{id}/comments', 'Blogs@comments');   
    Route::post('blogs/{id}/comment', 'Blogs@commentStore');   
    Route::post('blogs/{id}/comment/{comment}', 'Blogs@commentReplyStore');
    Route::get('blog/{id}/remove-related-blog/{related}', 'Blogs@removeRelatedBlog');
    Route::resource('blogs', 'Blogs');
    
    /**
    *-------------------------------------------------------------------------------------------
    *   Application > BLOG > Slides
    *-------------------------------------------------------------------------------------------
    */
    Route::post('blogslides/search', 'Blogslides@searchIndex');
    Route::get('blogslides/search', 'Blogslides@index');
    Route::resource('blogslides', 'Blogslides');
    
    
    /**
    *-------------------------------------------------------------------------------------------
    *   Application > BLOG > Comments
    *-------------------------------------------------------------------------------------------
    */
    Route::post('comments/search', 'Comments@searchIndex');
    Route::get('comments/search', 'Comments@index');
    Route::get('comments/{id}/publish', 'Comments@publish');
    Route::get('comments/{id}/unpublish', 'Comments@unpublish');
    Route::resource('comments', 'Comments');
    
    
    /**
    *-------------------------------------------------------------------------------------------
    *   Application > BLOG CATEGORIES
    *-------------------------------------------------------------------------------------------
    */
    Route::get('blogcategories/{id}/blogs', 'Blogcategories@blogs');
    Route::post('blogcategories/search', 'Blogcategories@searchIndex');
    Route::get('blogcategories/search', 'Blogcategories@index' );
    Route::resource('blogcategories', 'Blogcategories');
    
    
    /**
    *-------------------------------------------------------------------------------------------
    *   Application > BLOG Tags
    *-------------------------------------------------------------------------------------------
    */
    Route::get('blogtags/{id}/blogs', 'Blogtags@blogs');
    Route::post('blogtags/search', 'Blogtags@searchIndex');
    Route::get('blogtags/search', 'Blogtags@index');
    Route::resource('blogtags', 'Blogtags');


});


// sync update from/to pathao courier
Route::group(['middleware' => ['auth','permission'], 'prefix' => 'pathao'], function() use ($router){
    
    
    
});