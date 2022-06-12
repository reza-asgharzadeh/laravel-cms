<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\CoursesController;
use App\Http\Controllers\Client\SearchController;
use App\Http\Controllers\Client\ShowOfferPageController;
use App\Http\Controllers\Client\SitemapController;
use App\Http\Controllers\Panel\AlertController;
use App\Http\Controllers\Panel\ChapterController;
use App\Http\Controllers\Panel\edit_profile\AccountInformationEditController;
use App\Http\Controllers\Panel\edit_profile\UserInformationEditController;
use App\Http\Controllers\Panel\FaqCourseController;
use App\Http\Controllers\Panel\NewsLetterController;
use App\Http\Controllers\Panel\OrderController;
use App\Http\Controllers\Panel\ActivityLogController;
use App\Http\Controllers\Panel\AnswerController;
use App\Http\Controllers\Panel\CouponController;
use App\Http\Controllers\Panel\OfferController;
use App\Http\Controllers\Panel\PageController;
use App\Http\Controllers\Panel\PaymentController;
use App\Http\Controllers\Panel\QuestionController;
use App\Http\Controllers\Panel\TicketController;
use App\Http\Controllers\Panel\TransactionController;
use App\Http\Controllers\Panel\WalletController;
use App\Http\Controllers\Client\ShowCategoryCourseController;
use App\Http\Controllers\Client\ShowCourseController;
use App\Http\Controllers\Client\ShowCourseTagController;
use App\Http\Controllers\Client\ShowEpisodeController;
use App\Http\Controllers\Client\ShowPostController;
use App\Http\Controllers\Client\LandingController;
use App\Http\Controllers\Panel\CategoryController;
use App\Http\Controllers\Panel\CommentController;
use App\Http\Controllers\Client\CommentController as StoreCommentController;
use App\Http\Controllers\Panel\CourseController;
use App\Http\Controllers\Panel\EditorUploadController;
use App\Http\Controllers\Panel\EpisodeController;
use App\Http\Controllers\Panel\PermissionController;
use App\Http\Controllers\Panel\RoleController;
use App\Http\Controllers\Panel\TagController;
use App\Http\Controllers\Panel\UserController;
use App\Http\Controllers\Panel\PanelController;
use App\Http\Controllers\Panel\PostController;
use App\Http\Controllers\Client\ShowCategoryPostController;
use App\Http\Controllers\Client\ShowPostTagController;
use Illuminate\Support\Facades\Route;

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

//Site Map XML
Route::get('/sitemap.xml', [SitemapController::class, 'index']);

Route::get('/',[LandingController::class,'index'])->name('landing');
Route::get('/post/{post:slug}',[ShowPostController::class,'show'])->name('posts.show');
Route::get('/course/{course:slug}',[ShowCourseController::class,'show'])->name('courses.show');
Route::get('/course/{course:slug}/episode/{episode:slug}',[ShowEpisodeController::class,'show'])->name('episodes.show');
Route::get('/category/post/{category:slug}',[ShowCategoryPostController::class,'show'])->name('category.post.show');
Route::get('/category/course/{category:slug}',[ShowCategoryCourseController::class,'show'])->name('category.course.show');
Route::get('/post/tag/{tag:slug}',[ShowPostTagController::class,'show'])->name('post.tag.show');
Route::get('/course/tag/{tag:slug}',[ShowCourseTagController::class,'show'])->name('course.tag.show');
Route::get('/courses/offer',[ShowOfferPageController::class,'show'])->name('courses.offer');
Route::get('/blog',[BlogController::class,'index'])->name('blog');
Route::get('/courses',[CoursesController::class,'index'])->name('courses');
Route::post('/newsletters',[NewsLetterController::class,'store'])->name('newsletters.store');
Route::get('/about-us', function(){return View('client.about');})->name('about');
//contact us
Route::get('/contact-us',[ContactController::class,'showPage'])->name('contact');
Route::post('/contact-us',[ContactController::class,'store'])->name('contact.store');
//Search
Route::get('/search',[SearchController::class,'index'])->name('search');

Route::middleware(['auth', 'verified'])->prefix('/panel')->group(function (){
    Route::get('/',[PanelController::class,'index'])->name('panel');
    Route::resource('/users',UserController::class)->except('show');
    Route::resource('/roles',RoleController::class)->except('create');
    Route::post('/roles/{role}/set',[RoleController::class,'setPermissions'])->name('set.permissions.store');
    Route::resource('/permissions',PermissionController::class)->except(['create','show']);
    Route::resource('/categories',CategoryController::class)->except(['create','show']);
    Route::resource('/tags',TagController::class)->except(['create','show']);
    Route::resource('/posts',PostController::class)->except('show');
    Route::put('/posts/{post}/status',[PostController::class,'isApproved'])->name('posts.status');
    Route::resource('/comments',CommentController::class)->except(['create','show']);
    Route::get('/comments/{comment}/reply',[CommentController::class,'reply'])->name('comments.reply');
    Route::post('/comments/{comment}/save',[CommentController::class,'save'])->name('comments.save');
    Route::put('/comments/{comment}/display',[CommentController::class,'display'])->name('comments.display');
    Route::post('/editor/upload',[EditorUploadController::class,'upload'])->name('editor.upload');
    //Edit Profile
    Route::get('/profile/user/account-information',[AccountInformationEditController::class,'accountInformation'])->name('account.information');
    Route::put('/profile/user/{user}/account-information',[AccountInformationEditController::class,'accountInformationUpdate'])->name('account.information.update');
    Route::get('/profile/user/user-information',[UserInformationEditController::class,'userInformation'])->name('user.information');
    Route::put('/profile/user/{user}/user-information',[UserInformationEditController::class,'userInformationUpdate'])->name('user.information.update');
    Route::get('/profile/user/user-communication',[UserInformationEditController::class,'userCommunication'])->name('user.communication');
    Route::put('/profile/user/{user}/user-communication',[UserInformationEditController::class,'userCommunicationUpdate'])->name('user.communication.update');
    Route::get('/profile/user/account-password',[AccountInformationEditController::class,'accountPassword'])->name('account.password');
    Route::put('/profile/user/{user}/account-password',[AccountInformationEditController::class,'accountPasswordUpdate'])->name('account.password.update');
    //course
    Route::resource('/courses',CourseController::class)->except('show');
    Route::get('/course/{course:slug}/chapters',[CourseController::class,'showCourseChapters'])->name('show.course.chapters');
    Route::get('/course/{course:slug}/faq-courses',[CourseController::class,'showCourseFaqs'])->name('show.course.faq');
    Route::put('/courses/{course}/status',[CourseController::class,'isApproved'])->name('courses.status');
    Route::get('/my/courses',[CourseController::class,'myCourses'])->name('my.courses.index');
    //episode
    Route::resource('/episodes',EpisodeController::class)->except('show');
    Route::get('/episode/{episode:slug}/chapter',[EpisodeController::class,'showEpisodeChapter'])->name('show.episode.chapter');
    //chapter
    Route::resource('/chapters',ChapterController::class)->except('show');
    Route::get('/chapter/{chapter}/episodes',[ChapterController::class,'showChapterEpisodes'])->name('show.chapter.episodes');
    Route::get('/chapter/{chapter}/course',[ChapterController::class,'showChapterCourse'])->name('show.chapter.course');
    //Faq Course
    Route::resource('/faq-courses',FaqCourseController::class)->except('show');
    Route::get('/faq/{faq_course}/course',[FaqCourseController::class,'showFaqCourse'])->name('show.faq.course');

    Route::resource('/tickets',TicketController::class)->except(['edit','update','destroy']);
    Route::post('/tickets/{ticket}/reply',[TicketController::class,'reply'])->name('tickets.reply');
    Route::resource('/activities',ActivityLogController::class)->only(['index','destroy']);
    Route::resource('/questions',QuestionController::class)->except(['edit','update','destroy']);
    Route::post('/answers/{question}',[AnswerController::class,'store'])->name('answers.store');
    //Order
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    //Payment
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    //Coupon
    Route::resource('/coupons',CouponController::class);
    Route::put('/coupons/{coupon}/status',[CouponController::class,'isApproved'])->name('coupons.status');
    //Offer
    Route::resource('/offers',OfferController::class);
    Route::put('/offers/{offer}/status',[OfferController::class,'isApproved'])->name('offers.status');
    //Wallet
    Route::resource('/wallets',WalletController::class)->only(['index','update']);
    //Alert Bar
    Route::resource('/alerts',AlertController::class)->except('show');
    Route::put('/alerts/{alert}/status',[AlertController::class,'isApproved'])->name('alerts.status');
    //Single Page
    Route::resource('/pages',PageController::class);
    Route::put('/pages/{page}/status',[PageController::class,'isApproved'])->name('pages.status');
    //Newsletter
    Route::resource('/newsletters',NewsLetterController::class)->except(['create','show']);
    Route::put('/newsletters/{newsletter}/status',[NewsLetterController::class,'status'])->name('newsletters.status');
    //contact us
    Route::resource('/contact-us',ContactController::class)->except(['create','store','show']);
    Route::post('/contact-us/{contact}/reply',[ContactController::class,'reply'])->name('contacts.reply');
    Route::post('/contact-us/{contact}/save',[ContactController::class,'save'])->name('contacts.save');
});

Route::middleware(['auth', 'verified'])->prefix('/comment')->group(function (){
    Route::post('/course/{course}/store',[StoreCommentController::class,'CourseStore'])->name('comment.course.store');
    Route::post('/post/{post}/store',[StoreCommentController::class,'PostStore'])->name('comment.post.store');
    Route::post('/episode/{episode}/store',[StoreCommentController::class,'EpisodeStore'])->name('comment.episode.store');
    Route::post('/course/{course}/comment/{comment}/store',[StoreCommentController::class,'ReplyCourseStore'])->name('reply.comment.course.store');
    Route::post('/post/{post}/comment/{comment}/store',[StoreCommentController::class,'ReplyPostStore'])->name('reply.comment.post.store');
    Route::post('/episode/{episode}/comment/{comment}/store',[StoreCommentController::class,'ReplyEpisodeStore'])->name('reply.comment.episode.store');
});

//cart
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
    Route::patch('/update-cart', [CartController::class, 'update'])->name('update.cart');
    Route::patch('/update-wallet', [CartController::class, 'updateWallet'])->name('update.wallet');
    Route::delete('/remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');
});

//Transaction
Route::middleware(['auth', 'verified'])->prefix('/transaction')->group(function (){
    Route::post('/order/{order}',[TransactionController::class,'unpaidOrders'])->name('unpaid.order.request');
    Route::post('/order',[TransactionController::class,'newOrders'])->name('new.order.request');
    Route::post('/request',[TransactionController::class,'request'])->name('request');
    Route::get('/callback',[TransactionController::class,'callback'])->name('callback');
});

//Login Google
Route::prefix('/auth')->group(function (){
    Route::get('/google/redirect', [AuthenticatedSessionController::class,'redirectToGoogle'])->name('auth.google');
    Route::get('/google/callback',[AuthenticatedSessionController::class,'callbackFromGoogle']);
});

require __DIR__.'/auth.php';

//Get Single Page
Route::get('/{page:slug}',[PageController::class,'show'])->name('single.page.show');
