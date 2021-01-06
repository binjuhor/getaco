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
/**
 * Main site


 */


Route::get('/updatecolor', 'ColorTagController@updatecolortag');

Route::get('/', 'PageController@index');
Route::get('/blog', 'PageController@blog');
Route::get('/feature', 'PageController@feature');
Route::get('/pricing', 'PageController@pricing');
Route::get('/diff', 'PageController@diff');
Route::get('/about', 'PageController@about');
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::any('/register/check_mail','Auth\RegisterController@checkMail');

Route::get('/register_success', function(){
    return view('auth.register_success');
});
Route::group(['prefix'=>'app/search'], function()
{
    Route::any('/', 'SearchController@fillter');
    Route::any('/save', 'SearchController@save_fillter');
    Route::get('/index-data', 'SearchController@index');
    Route::post('/attr/fillter','CustomerAttributeController@add_attr_fillter');
    Route::get('/segment','SearchController@FillterShortcut')->name('shortcut_fillter');
});

Route::post('search_basic','SearchController@search_basic');

Route::group(['prefix' => '/package'], function ()
{
    Route::get('/order','PackageController@order');
    Route::post('/order/check','PackageController@check');
    Route::post('/check/coupon','CouponController@checkCoupon'); 
    Route::post('/order','PackageController@do_order');
    Route::post('/check_variable','PackageController@check_variable');
});
Route::group(['prefix' => 'form-embed'], function () {
    Route::get('/','FormEmbedController@index');
    Route::get('/js','FormEmbedController@js');
});
Route::group(['prefix' => 'request_demo'], function () {
    Route::get('/','RequestDemoController@index');
    Route::get('/add','RequestDemoController@add');
    Route::post('/add','RequestDemoController@create');
    Route::get('/delete','RequestDemoController@delete');
});
Auth::routes();
Route::group(['prefix' => 'login'], function(){
    Route::get('/{social}', 'Auth\LoginController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');
    Route::get('/{social}/callback','Auth\LoginController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google|github|bitbucket');
});

/**
 * App & admin site
*/
Route::group(['prefix' => '/app'], function () {
    Route::get('/', 'HomeController@home')->name('home');
    Route::post('/customer/export','ExportController@CustomerExport')->middleware('can:owner');
    Route::post('/avatar', 'HomeController@avatar');
    Route::get('/customer/import/{type}', 'ExportController@index')->name('index')->middleware('can:owner');
    Route::post('/customer/import/{type_customer}', 'ExportController@import')->middleware('can:owner');
    Route::any('/customer/check_file', 'ExportController@CheckFile')->middleware('can:owner');
    Route::get('/customer/export/example', 'ExportController@CreateExample')->middleware('can:owner');
    Route::post('/customer/import/note/{id}', 'ExportController@note')->middleware('can:owner');

    Route::group(['prefix' => '/setting'], function () {
        Route::get('/info','HomeController@info');
        Route::get('/change','HomeController@change');
        Route::get('/mail','SendMailController@index')->name('configmail');
        Route::post('/mail','SendMailController@ConfigMail');
        Route::get('/mail/del/{id}','SendMailController@DellMail')->name('dellmail');
        Route::group(['prefix' => '/company'], function () {
            Route::get('/','CompanyController@view')->middleware('can:cpn_info');
            Route::post('/','CompanyController@add');
            Route::get('/list','CompanyController@index');
            Route::get('/edit','CompanyController@edit')->middleware('can:cpn_info');
            Route::post('/edit', 'CompanyController@update');
            Route::get('/delete', 'CompanyController@destroy');
            Route::get('/trash', 'CompanyController@trash');
            Route::get('/trashList', 'CompanyController@trashList');
            Route::get('/untrash', 'CompanyController@unTrash');
        });

        Route::group(['middleware' => 'can:Cart' , 'prefix' => '/cart'], function () {
            Route::get('/item','CartController@item');
            Route::post('/checkout','CartController@checkout');
            Route::post('/payment','CartController@payment');
            Route::get('/success','CartController@success');
            Route::get('/cancel/{id}','CartController@cancel');
        });
    });

    Route::group(['prefix' => '/user'], function () {
        Route::get('/password','HomeController@changePassword');
        Route::post('/edit','HomeController@update');
        Route::post('/changePassword','HomeController@password');
        Route::get('/delete','HomeController@delete');
        Route::get('/edit','HomeController@edit');
        Route::post('/changePassword','HomeController@changePassword')->name('changePassword');
        Route::get('/permission', 'PermissionController@index')->middleware('can:Role');
        Route::get('/add','PermissionController@add')->middleware('can:action_user');
        Route::post('/add','PermissionController@do_add')->middleware('can:payment_check');
        Route::post('/permission','PermissionController@uprole')->middleware('can:Role');
        Route::get('/del/{id}','PermissionController@delete')->middleware('can:action_user');
        Route::get('/edit/{id}','PermissionController@edit')->middleware('can:action_user');
        Route::post('/edit/{id}','PermissionController@do_edit');
        Route::get('/list','PermissionController@list')->middleware('can:user_list');
        Route::get('/history','PermissionController@history')->middleware('can:user_htr');        
    });

    Route::group(['prefix' => '/customer'], function () {
        Route::get('/','CustomerController@index')->middleware('can:all_lead');
        Route::get('/customer','CustomerController@customer')->middleware('can:ctm_list');
        Route::get('/lead','CustomerController@lead');
        Route::post('/check','CustomerController@checkIsset');
        Route::get('/add','CustomerController@add')->middleware('can:ctm_act');
        Route::post('/add','CustomerController@add')->middleware('can:payment_check');
        Route::get('/detail','CustomerController@detail');
        Route::get('/edit','CustomerController@edit')->middleware('can:ctm_act');
        Route::post('/tag_comment','CustomerController@tag_comment');
        Route::post('/edit', 'CustomerController@update')->middleware('can:ctm_act')->middleware('can:payment_check');
        Route::post('/edit_comment', 'CustomerController@edit_comment');
        Route::get('/delete', 'CustomerController@delete')->middleware('can:ctm_del');
        Route::get('/delete_comment', 'CustomerController@delete_comment');
        Route::get('/trash', 'CustomerController@trash');
        Route::get('/trashList', 'CustomerController@trashList');
        Route::get('/untrash', 'CustomerController@unTrash');
        Route::get('/addfield', 'ElementController@add');
        Route::post('/comment', 'CustomerController@comment');
        Route::get('/comment_sticky', 'CustomerController@stickyComment');
        Route::get('/test', 'CustomerController@view');
        Route::post('/test', 'CustomerController@test');
        Route::post('/dataCustomer', 'CustomerController@dataCustomer');
        Route::any('/submitForm','CustomerController@saveEmbedData');
        
        Route::group(['prefix' => '/segment'], function () {
            Route::get('/add','SegmentController@view_add')->middleware('can:seg_act');
            Route::post('/add','SegmentController@add');
            Route::get('/list','SegmentController@index')->middleware('can:seg_list');
            Route::get('/edit','SegmentController@edit')->middleware('can:seg_act');
            Route::get('/delete','SegmentController@destroy')->middleware('can:seg_del');
        });
        Route::group(['prefix' => '/attribute'], function(){
            Route::get('/', 'CustomerAttributeController@index')->middleware('can:atb_list');
            Route::get('/add', 'CustomerAttributeController@add')->middleware('can:atb_act');
            Route::post('/add', 'CustomerAttributeController@add');
            Route::get('/edit', 'CustomerAttributeController@edit')->middleware('can:atb_act');
            Route::post('/edit', 'CustomerAttributeController@update');
            Route::get('/status', 'CustomerAttributeController@active');
            Route::get('/delete', 'CustomerAttributeController@delete')->middleware('can:atb_del');
            Route::post('/update/status', 'CustomerAttributeController@update_status');
            Route::any('/select','CustomerAttributeController@selected');
            Route::any('/sort','CustomerAttributeController@sort');
        });
        Route::group(['prefix' => '/tag'], function () {
            Route::get('/add','TagController@view')->middleware('can:stt_act');
            Route::post('/add','TagController@add');
            Route::get('/','TagController@index')->middleware('can:stt_list');
            Route::get('/edit','TagController@edit')->middleware('can:stt_act');
            Route::post('/update', 'TagController@update');
            Route::get('/delete','TagController@destroy')->middleware('can:stt_del');
        });
    });

    //report
    Route::group(['prefix' => 'report'], function () {
        Route::get('/convert','ReportController@convert');
        Route::post('/convert/custom','ReportController@customReport');
        Route::get('/analytic','ReportController@analytics')->middleware('can:analytics');
        Route::any('/form-url','ReportController@analyticsWithFormID');
        Route::any('/form-chart','ReportController@analyticsWithChart');
    });
    //Export excel
    Route::get('customer/export/{id}','ExportController@Export')->middleware('can:export');
   
    Route::group(['prefix' => '/form'], function () {
    	Route::get('/', 'FormController@index')->middleware('can:form_list');
        Route::post('/add', 'FormController@create');
        Route::get('/delete', 'FormController@delete')->middleware('can:form_del');
        Route::get('/trash', 'FormController@trash');
        Route::get('/listTrash', 'FormController@listTrash');
        Route::get('/unTrash', 'FormController@unTrash');
        Route::get('/detail', 'FormController@detail');
        Route::get('/edit', 'FormController@edit')->middleware('can:form_act');
        Route::get('/copy', 'FormController@copy');
        Route::get('/step', 'FormController@step');
        Route::post('/stepAdd', 'FormController@stepAdd');
        Route::get('/build_form', 'FormController@buildForm')->middleware('can:form_new');
        Route::get('/show', 'FormController@show');
        Route::get('/view','FormEmbedController@formEmbed');
        Route::get('/clearTrash','FormController@clearTrash');
        Route::get('/logs','InteractionTrackingController@formLog');
        
        Route::group(['prefix' => '/template' , 'middleware' => 'can:form_temp'], function () {
            Route::get('/','TemplateFormController@index');
            Route::get('/add','TemplateFormController@add');
            Route::post('/add','TemplateFormController@create');
            Route::get('/edit','TemplateFormController@edit');
            Route::post('/element','TemplateFormController@element');
            Route::get('/detail','TemplateFormController@detail');
            Route::get('/delete','TemplateFormController@delete');
            Route::get('/public','TemplateFormController@publicTemplate');
        });
    });

    Route::group(['prefix' => '/report'], function () {
        Route::get('/convert','ReportController@convert');
        Route::get('/analytic','ReportController@analytics')->middleware('can:analytics');
    });
     Route::group(['prefix' => '/trashAttribute'], function () {
        Route::get('/delete','TrashAttributeController@delete')->middleware('can:atb_del');
    });
});

Route::group(['prefix' => '/admin'], function () {
    Route::get('/', 'HomeController@admin')->name('home')->middleware('can:admin');
    
    Route::group(['prefix' => '/coupon' , 'middleware' => 'can:admin'], function () {
        Route::get('/add','CouponController@add');
        Route::post('/add','CouponController@create');
        Route::get('/','CouponController@index');
        Route::get('/edit','CouponController@add');
        Route::post('/edit','CouponController@edit');
        Route::get('/delete','CouponController@delete');
        Route::get('/trash','CouponController@trash');
        Route::get('/trashList','CouponController@trashList');
        Route::get('/untrash','CouponController@untrash');
    });
    Route::group(['prefix' => '/business' , 'middleware' => 'can:admin'], function () {
        Route::get('/','OrbitController@index');
        Route::post('/add','OrbitController@create');
        Route::post('/update','OrbitController@update');
        Route::get('/delete','OrbitController@delete');
        
    });

    Route::group(['prefix' => '/package'], function ()
    {
        Route::get('/','PackageController@index');
        Route::get('order_list','OrderController@list_order');
        Route::get('order/del/{id}', 'OrderController@delete');
        Route::post('/freeTrial', 'PackageController@freeTrial');
        Route::get('ordered','OrderController@bought');
    });

    Route::group(['prefix' => '/partner' , 'middleware' => 'can:admin'], function ()
    {
        Route::get('/','PartnerController@index');
        Route::post('/order','PartnerController@orderDetail');
        Route::get('/del/{id}','PartnerController@del');
    });
    
    Route::group(['middleware' => ['auth'], 'prefix' => '/package'], function() 
    {
        Route::get('/add','PackageController@add');
        Route::post('/add','PackageController@add');
        Route::get('/edit','PackageController@edit');
        Route::post('/edit','PackageController@update');
        Route::get('/delete','PackageController@delete');
    });

});

Route::group(['prefix' => 'logs'], function () {
    Route::post('/add','LogController@add');
});

/**
 * Deprecated.
 */
Route::group(['prefix' => 'element'], function () {
	Route::get('/add', 'ElementController@add');
	Route::post('/add', 'ElementController@create');
    Route::get('/', 'ElementController@index');
    Route::get('/trash', 'ElementController@trash');
    Route::get('/unTrash', 'ElementController@unTrash');
    Route::get('/listTrash', 'ElementController@listTrash');
    Route::get('/delete', 'ElementController@delete');
    Route::get('/edit', 'ElementController@add');
    Route::post('/edit', 'ElementController@edit');
});

Route::group(['prefix' => 'item'], function () {
    Route::post('/add', 'ElementItemController@create');
    Route::get('/', 'ElementItemController@index');
    Route::get('/delete', 'ElementItemController@delete');
    Route::get('/add', 'ElementItemController@add');
    Route::get('/edit', 'ElementItemController@add');
    Route::post('/edit', 'ElementItemController@edit');
});

Route::group(['prefix' => 'dynamic_field'], function () {
    Route::get('/','DynamicFieldController@view');
    Route::post('/','DynamicFieldController@add');
    Route::get('/list','DynamicFieldController@index');
    Route::get('/edit','DynamicFieldController@edit');
    Route::post('/update', 'DynamicFieldController@update');
    Route::get('/delete', 'DynamicFieldController@destroy');
    Route::get('/trash', 'DynamicFieldController@trash');
    Route::get('/trashList', 'DynamicFieldController@trashList');
    Route::get('/untrash', 'DynamicFieldController@unTrash');
});

Route::group(['prefix' => 'form_code'], function () {
    Route::get('/','FormCodeController@view');
    Route::post('/','FormCodeController@add');
    Route::get('/list','FormCodeController@index');
    Route::get('/edit','FormCodeController@edit');
    Route::post('/update', 'FormCodeController@update');
    Route::get('/delete', 'FormCodeController@destroy');
    Route::get('/test', 'FormCodeController@tesst');
});

Route::get('demo-session', 'PlanController@testSession' );