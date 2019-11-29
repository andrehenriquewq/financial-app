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

use App\Http\Requests\ValueRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

Auth::routes();

// Rotas Privadas:
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', function () {
        $value = Cache::get('value', 0);
        $valueWithdraw = Cache::get('withdraws', 0);
        $valueDeposit = Cache::get('deposits', 0);
        return view('dashboard.index')
        ->withValue($value)
        ->withValueWithdraw($valueWithdraw)
        ->withValueDeposit($valueDeposit);
    });

    Route::get('/withdraw', function () {
        return view('dashboard.withdraw');
    });
    
    Route::post('/withdraw', function (ValueRequest $request) {
        $money = $request->value;
        $value = Cache::get('value', 0);
        $valueWithdraw = Cache::get('withdraws', 0);
        
        if($money > $value){
            return back()->withMessageError("Saque Impossivel");
        }else{
            Cache::put('value', $value-$money);
            Cache::put('withdraws', $money+$valueWithdraw);
        }

        return redirect()->to('/home');
    })->name('withdraw.store');

    Route::get('/deposit', function () {
        return view('dashboard.deposit');
    });

    Route::post('/deposit', function (ValueRequest $request) {
        $money = $request->value;
        $value = Cache::get('value', 0);
        $valueDeposit = Cache::get('deposits', 0);

        Cache::put('value', $money+$value);
        Cache::put('deposits', $money+$valueDeposit);

        return redirect()->to('/home');
    })->name('deposit.store');

    Route::get('/profile', function () {
        return view('dashboard.profile');
    });
});

Route::get('/', function () {
    return view('welcome');
});
