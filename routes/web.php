<?php

use App\Http\Controllers\backend\BackController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/',[FrontendController::class,"index"]);
Route::middleware('auth')->group(function(){
    Route::get('/user/cv',[BackController::class,"usercv"])->name('usercv');

    Route::controller(BackController::class,"usercv")->group(function(){
        Route::get('/user/cv',"usercv")->name('usercv');
        Route::get('/user',"logout")->name('user.logout');
        Route::post('/save/info',"saveinfo")->name('save.info');
    
        Route::get('/edit/info',"editinfo")->name('edit.info');
        Route::post('/update/info',"updateinfo")->name('update.info');
    
        Route::get('/user/profile',"profile")->name('profile');
        Route::post('/user/profile',"saveprofile")->name('save.profile');
        Route::get('/edit/profile',"editprofile")->name('edit.profile');
        Route::post('/update/profile',"updateprofile")->name('update.profile');
    
        Route::get('/user/skill',"userskill")->name('user.skill');
        Route::post('/user/skill',"saveskill")->name('save.skill');
        Route::get('/edit/skill',"editskill")->name('edit.skill'); 
        Route::post('/update/skill',"updateskill")->name('update.skill');   
    
        Route::get('/user/edu',"useredu")->name('user.edu');
        Route::post('/save/edu',"saveedu")->name('save.edu');
        Route::get('/edit/edu',"editedu")->name('edit.edu');
        Route::get('/edit/education/{id}',"editeducation")->name('edit.education');
        Route::post('/update/edu',"updateedu")->name('update.edu'); 
        Route::get('/delete/education/{id}',"deleteeducation")->name('delete.education');
    
        Route::get('/user/language',"userlanguage")->name('user.language');
        Route::post('/save/language',"savelanguage")->name('save.language');
        Route::get('/edit/language',"editlanguage")->name('edit.language');
        Route::post('/update/language',"updatelanguage")->name('update.language');  
    
        Route::get('/user/image',"userimage")->name('user.image');
        Route::post('/save/image',"saveimage")->name('save.image');
        Route::get('/edit/image',"editimage")->name('edit.image');
        Route::post('/update/image',"updateimage")->name('update.image');
        
    
        Route::get('/user/exp',"userexp")->name('user.exp');
        Route::post('/save/exp',"saveexp")->name('save.exp');
        Route::get('/edit/exp',"editexp")->name('edit.exp'); 
        Route::get('/edit/experiance/{id}',"editexperiance")->name('edit.experiance');
        Route::post('/update/exp',"updateexp")->name('update.exp');
        Route::get('/delete/experiance/{id}',"deleteexp")->name('delete.experiance');
    
        Route::get('/cv',"cv")->name('cv');
        Route::get('/downloadcv',"downloadcv")->name('download_cv');
    
    
        Route::get('/sendmail','sendmail')->name('sendmail');
    
    });
    
});

require __DIR__.'/auth.php';
