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
use Spatie\Analytics\AnalyticsFacade as Analytics;
use Spatie\Analytics\Period;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/data',function(){
    # visitors and page views
    // $analyticsData = AnalyticsFacade::fetchVisitorsAndPageViews(Period::days(7));

    # perform query
//    $analyticsData = Analytics::performQuery(
//        Period::years(1),
//        'ga:sessions',
//        [
//            'metrics' => 'ga:sessions, ga:pageviews',
//            'dimensions' => 'ga:yearMonth'
//        ]
//    )->getRows();

    $analyticsData = Analytics::getAnalyticsService()->data_realtime->get('ga:'.env('ANALYTICS_VIEW_ID'), 'rt:activeVisitors')->totalsForAllResults['rt:activeVisitors'];
    return response()->json($analyticsData);
});

Route::get('/online-users',function(){
    return view('index');
});
