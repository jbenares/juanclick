
<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{pathMatch}', function(){
    return view('welcome');
})->where('pathMatch',".*");

Route::get('/clear-cache', function () {
    \Artisan::call('optimize:clear');
    return '✅ Cache cleared successfully!';
});

Route::get('/data-deletion-status', function () {
    return response()->json(['message' => 'Your Facebook data has been deleted from JuanClick.']);
});
