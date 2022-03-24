<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', 'PostController@home');
Route::get('/contacts', function () {
    return view('pages.contacts');
})->name('contacts');
Route::get('/yandex_news_rss.xml', 'RSSController@yandex');
//Route::get('/rambler_news_rss.xml', 'RSSController@rambler');
Route::get('/search', 'SearchController@search')->name('search');
//Route::get('/test', function () {
//});

Route::resource('/posts', 'PostController');
Route::resource('/tags', 'TagController');
Route::get('/microsoft-news', 'SearchController@microsoft')->name('microsoftSearch');
Route::get('/tesla-news', 'SearchController@tesla')->name('teslaSearch');
Route::get('/gold-news', 'SearchController@gold')->name('goldSearch');
Route::get('/bitcoin-news', 'SearchController@bitcoin')->name('bitcoinSearch');
Route::get('/virginGalactic-news', 'SearchController@virginGalactic')->name('virginGalacticSearch');
Route::get('/sberbank-news', 'SearchController@sberBank')->name('sberBankSearch');
Route::get('/china-news', 'SearchController@china')->name('chinaSearch');

Route::get('/sitemap.xml', 'SiteMapController@index');

//Route::get('/test', 'testController@index');


//require __DIR__ . '/auth.php';
