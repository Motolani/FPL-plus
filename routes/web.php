<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FPLController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*

| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\ArticleController::class, 'airtclesPage']);
// Route::get('/', [App\Http\Controllers\TeamReviewsController::class, 'reviewsPage']);
Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'airtclesPage'])->name('airtclesPage');
Route::get('/reviews', [App\Http\Controllers\TeamReviewsController::class, 'reviewsPage'])->name('reviewsPage');

Route::group(['prefix' => 'admin'],function() {
    Route::get('/login', [App\Http\Controllers\AdminController::class, 'loginView'])->name('loginView');
    // Route::post('/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login');
        Route::post('/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login');
    Route::get('logout/',[AdminLoginController::class, 'logout'])->name('admin.logout');
    
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('post/category', PostCategoryController::class);
    Route::resource('post', PostController::class);
    Route::get('posts/published', [PostController::class, 'posts'])->name("posts.published");
    Route::post('uploads', [PostController::class, 'uploadImage'])->name('posts.upload');
    Route::get('posts/preview', [App\Http\Controllers\PostController::class, 'index'])->name('admin.preview');
    Route::get('create/sub/plan', [App\Http\Controllers\SubscriptionController::class, 'createSubPlanView'])->name('subplan.create');
    Route::get('view/sub/plan', [App\Http\Controllers\SubscriptionController::class, 'viewSubPlans'])->name('subplan.view');
    Route::post('store/sub/plan', [App\Http\Controllers\SubscriptionController::class, 'createSubPlan'])->name('subplan.store');
    Route::get('post/show/{id}', [App\Http\Controllers\ArticleController::class, 'show'])->name('post.show');
    Route::get('/teamReviews/preview/{id}', [App\Http\Controllers\ArticleController::class, 'show'])->name('teamReviews.preview');
    Route::get('/teams', [App\Http\Controllers\ApiController::class, 'bootstrapData'])->name('teams');
    
    // Route::post('/login', [App\Http\Controllers\AdminController::class, 'adminLogin'])->name('admin.login');
});
Route::get('regCallback', [FPLController::class, 'regCallbackRes'])->name('regCallback');

Auth::routes();
Route::group(['middleware' => 'auth'],function() {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [App\Http\Controllers\FPLController::class, 'userProfile'])->name('home');
    Route::get('/fixtures', [App\Http\Controllers\ToolsController::class, 'fixtures'])->name('fixtures');
    Route::get('/details/settings', [App\Http\Controllers\SettingsController::class, 'editDetailsView'])->name('details.settings.view');
    Route::get('/settings/update/password/', [App\Http\Controllers\SettingsController::class, 'updatePwdView'])->name('pwd.update.view');
    Route::post('/details/settings/update', [App\Http\Controllers\SettingsController::class, 'editDetails'])->name('details.settings');
    Route::post('/pwd/settings/update', [App\Http\Controllers\SettingsController::class, 'updatePwd'])->name('pwd.update.post');
    Route::post('deactivate/sub/{id}', [App\Http\Controllers\SubscriptionController::class, 'deactivatePlan'])->name('deactivate.sub');
    Route::get('activate/sub', [App\Http\Controllers\SubscriptionController::class, 'activatePlanView'])->name('activate.sub.view');
    Route::post('activate/sub', [App\Http\Controllers\SubscriptionController::class, 'activatePlan'])->name('activate.sub');
    
    Route::get('/subscriptionPlans', [App\Http\Controllers\SubscriptionController::class, 'subscriptionPlans'])->name('subscriptionPlans');
    
    Route::get('/article/display/{id}', [App\Http\Controllers\ArticleController::class, 'articleDisplay'])->name('article.display');
    Route::get('/teamReviews/display/{id}', [App\Http\Controllers\TeamReviewsController::class, 'teamReviewsDisplay'])->name('teamReviews.display');
    
    Route::get('fplRegUserDetail', [App\Http\Controllers\FPLController::class, 'registerDetailsView'])->name('register.user.detail.view');
    Route::post('register/fpl/manager', [App\Http\Controllers\FPLController::class, 'updateOnReg'])->name('register.user.detail');
    
    
    
    Route::post('store/comment', [CommentController::class, 'store'])->name('store.comment');
    Route::get('post/show/comment/reply/{post_id}/{comment_id}', [CommentController::class, 'commentReplyForm'])->name('post.show.comment.reply');
});


