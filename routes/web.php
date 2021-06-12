<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GameRegController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainmenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PubgController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\SubmenuController;
use App\Http\Controllers\TournamentController;

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


Route::post('/signin', [LoginController::class, 'authenticate'])->name('signin');
Route::post('/resetpassword', [LoginController::class, 'resetpassword'])->name('resetpassword');
Route::post('/confirmpass', [LoginController::class, 'confirmpass'])->name('confirmpass');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/forget', [LoginController::class, 'forget'])->name('forget');



//profile User Start

Route::get('/loadprofile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/updatepic', [ProfileController::class, 'profilepic'])->name('profiles.updatepic');
Route::post('/store', [ProfileController::class, 'store'])->name('profiles.store');
Route::put('/password', [ProfileController::class, 'password'])->name('profiles.password');

//profile User End

// Normal User Start

Route::get('/', [HomeController::class, 'index'])->name('normal.home');
Route::get('/signup', [HomeController::class, 'signup'])->name('normal.signup');
Route::get('/login', [HomeController::class, 'login'])->name('normal.login');
Route::post('/register', [HomeController::class, 'register'])->name('normal.register');
Route::get('/gameload', [HomeController::class, 'gameload'])->name('normal.gameload');
Route::get('/aboutload', [HomeController::class, 'aboutload'])->name('normal.aboutload');
Route::get('/tournamentload', [HomeController::class, 'tournament'])->name('normal.tournamentload');
Route::get('/documentload', [HomeController::class, 'document'])->name('normal.documentload');

Route::get('/list/tournament/{gameid}', [HomeController::class, 'tournamentlist'])->name('normal.gametournamentlist');

// Normal User End


//game Registration Start
Route::get('/loadgamereg/{tournament}', [GameRegController::class, 'loadform'])->name('gamereg.loadform');
Route::get('/tournament/{tournament}', [GameRegController::class, 'tournamentdetail'])->name('gamereg.tournamentdetail');





//game Registration ENd

// Register User Start

Route::get('/reguser/home', [RegUserController::class, 'index'])->name('register.home');
Route::get('/reguser/dashboard', [RegUserController::class, 'dashboard'])->name('register.dashboard');

Route::get('/reguser/documentload', [RegUserController::class, 'document'])->name('register.documentload');

Route::get('/reguser/aboutload', [RegUserController::class, 'aboutload'])->name('register.aboutload');

Route::get('/reguser/tournamentload', [RegUserController::class, 'tournament'])->name('register.tournamentload');

Route::get('/reguser/list/tournament/{gameid}', [RegUserController::class, 'tournamentlist'])->name('register.gametournamentlist');

Route::get('/reguser/gameload', [RegUserController::class, 'gameload'])->name('register.gameload');

Route::get('/reguser/tournament/list', [RegUserController::class, 'regtournament'])->name('register.regtournament');

Route::get('/reguser/person/tournament/{team}', [RegUserController::class, 'editall'])->name('register.editall');


Route::post('/pubg/person/update/{user}', [RegUserController::class, 'updatepesonal'])->name('pubgperson.update');
Route::post('/pubg/team/update/{team}', [RegUserController::class, 'teamupdate'])->name('teamupdate.update');

Route::get('/reguser/loadgamereg/{tournament}', [RegUserController::class, 'loadform'])->name('register.loadform');



// Register User End


// Admin User Start

Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
Route::get('/admin/usercreate', [AdminController::class, 'usercreate'])->middleware('admin')->name('admin.usercreate');
Route::post('/admin/usercreate/usercreate', [AdminController::class, 'addusertype'])->middleware('admin')->name('admin.addusertype');

//Admin User list Action
Route::get('/admin/getnormaluserlist', [AdminController::class, 'getnormaluserlist'])->name('admin.getnormaluserlist');
Route::get('/admin/getnormaluserblacklist', [AdminController::class, 'getnormaluserblacklist'])->name('admin.getnormaluserblacklist');

Route::get('/admin/getsubadminlist', [AdminController::class, 'getsubadminlist'])->name('admin.getsubadminlist');
Route::get('/admin/getsubadminblacklist', [AdminController::class, 'getsubadminblacklist'])->name('admin.getsubadminblacklist');

Route::get('/admin/getadminlist', [AdminController::class, 'getadminlist'])->middleware('admin')->name('admin.getadminlist');
Route::get('/admin/getadminblacklist', [AdminController::class, 'getadminblacklist'])->middleware('admin')->name('admin.getadminblacklist');

Route::delete('/admin/delete/team/{team}', [AdminController::class, 'teamdestroy'])->middleware('admin')->name('admin.teamdestroy');

Route::put('/admin/blacklistuser/user/{user}', [AdminController::class, 'blacklistuser'])->name('admin.blacklistuser');
Route::patch('/admin/activeuser/user/{user}', [AdminController::class, 'activeuser'])->name('admin.activeuser');


Route::get('/admin/resetpass/user/{user}', [AdminController::class, 'loadrestpass'])->middleware('admin')->name('admin.loadrestpass');
Route::post('/admin/passresetconfirm/user/{user}', [AdminController::class, 'passresetconfirm'])->middleware('admin')->name('admin.passresetconfirm');


Route::get('/admin/teamlist/{tournamentid}', [AdminController::class, 'teamlist'])->name('admin.teamlist');

Route::get('/admin/person/tournament/{team}', [AdminController::class, 'editall'])->name('admin.editall');

Route::get('/admin/settings/tournament/{tournament}', [AdminController::class, 'tournamentsetting'])->middleware('admin')->name('admin.tournamentsetting');


// Admin User End

//Main Menu Start

Route::get('/admin/mainmenu/create', [MainmenuController::class, 'create'])->name('mainmenu.create');
Route::get('/admin/mainmenu/list', [MainmenuController::class, 'index'])->name('mainmenu.index');
Route::get('/admin/mainmenu/{mainmenu}/edit', [MainmenuController::class, 'edit'])->name('mainmenu.edit');
Route::put('/admin/mainmenu/{mainmenu}', [MainmenuController::class, 'update'])->name('mainmenu.update');
Route::post('/admin/mainmenu/store', [MainmenuController::class, 'store'])->name('mainmenu.store');
Route::delete('/admin/mainmenu/{mainmenu}', [MainmenuController::class, 'destroy'])->name('mainmenu.destroy');

// Active Disable
Route::put('/admin/disable/mainmenu/{mainmenu}/', [MainmenuController::class, 'disable'])->name('mainmenu.disable');
Route::patch('/admin/active/mainmenu/{mainmenu}/', [MainmenuController::class, 'active'])->name('mainmenu.active');
Route::get('/admin/mainmenu/disablelist', [MainmenuController::class, 'disablelist'])->name('mainmenu.disableindex');
//Main Menu End

//Sub Menu Start

Route::get('/admin/submenu/create', [SubmenuController::class, 'create'])->name('submenu.create');
Route::get('/admin/submenu/list', [SubmenuController::class, 'index'])->name('submenu.index');
Route::get('/admin/submenu/{submenu}/edit', [SubmenuController::class, 'edit'])->name('submenu.edit');
Route::put('/admin/submenu/{submenu}', [SubmenuController::class, 'update'])->name('submenu.update');
Route::post('/admin/submenu/store', [SubmenuController::class, 'store'])->name('submenu.store');

//Active Disable

Route::put('/admin/disable/submenu/{submenu}/', [SubmenuController::class, 'disable'])->name('submenu.disable');
Route::patch('/admin/active/submenu/{submenu}/', [SubmenuController::class, 'active'])->name('submenu.active');
Route::get('/admin/submenu/disablelist', [SubmenuController::class, 'disablelist'])->name('submenu.disableindex');

//Sub Menu End


//Game Start

Route::get('/admin/game/create', [GameController::class, 'create'])->middleware('superadmin')->name('game.create');
Route::post('/admin/game/store', [GameController::class, 'store'])->middleware('superadmin')->name('game.store');
Route::get('/admin/game/list', [GameController::class, 'index'])->name('game.index');
Route::get('/admin/game/{game}/edit', [GameController::class, 'edit'])->middleware('superadmin')->name('game.edit');
Route::put('/admin/game/{game}', [GameController::class, 'update'])->middleware('superadmin')->name('game.update');
Route::delete('/admin/game/{game}', [GameController::class, 'destroy'])->middleware('superadmin')->name('game.destroy');

//Active Disable
Route::put('/admin/disable/game/{game}/', [GameController::class, 'disable'])->name('game.disable');
Route::patch('/admin/active/game/{game}/', [GameController::class, 'active'])->name('game.active');
Route::get('/admin/game/disablelist', [GameController::class, 'disablelist'])->name('game.disableindex');
//Game Tournament
Route::get('/admin/tournament/game/{game}/', [GameController::class, 'gametournament'])->name('game.gametournament');


//Game End


// Tournament Start
Route::get('/admin/tournament/create', [TournamentController::class, 'create'])->name('tournament.create');
Route::post('/admin/tournament/store', [TournamentController::class, 'store'])->name('tournament.store');
Route::get('/admin/tournament/list', [TournamentController::class, 'index'])->name('tournament.index');
Route::get('/admin/tournament/{tournament}/edit', [TournamentController::class, 'edit'])->name('tournament.edit');
Route::put('/admin/tournament/{tournament}', [TournamentController::class, 'update'])->name('tournament.update');

Route::get('/admin/game/tournament/list', [TournamentController::class, 'tournamentbygame'])->name('tournament.tournamentbygame');
Route::get('/admin/list/tournament/{gameid}', [TournamentController::class, 'tournamentlist'])->name('tournament.gamelist');

// Active Disable
Route::get('/admin/tournament/action/{tournament}/{field}/{action}', [TournamentController::class, 'action'])->name('tournament.action');
Route::get('/admin/tournament/disablelist', [TournamentController::class, 'disablelist'])->name('tournament.disableindex');
// Tournament End


// Pubg
Route::get('/pubg/form/{id}', [PubgController::class, 'pubgformload'])->name('pubg.form');

Route::get('/pubg/details/{id}', [PubgController::class, 'pubgdetail'])->name('pubg.details');

Route::post('/pubg/register', [PubgController::class, 'register'])->name('pubg.register');

Route::post('/pubg/reguser/register', [PubgController::class, 'regregister'])->name('pubg.reguserregister');

Route::get('/pubg/{team}/edit', [PubgController::class, 'editpubg'])->middleware('auth')->name('pubg.edit');

Route::get('/pubg/player/{pubg}/edit', [PubgController::class, 'editpubgplayer'])->middleware('auth')->name('pubg.playeredit');

Route::post('/pubg/playerupdate/{pubg}', [PubgController::class, 'update'])->middleware('auth')->name('pubgplayer.update');


//Rule Controller Start

Route::get('/admin/settings/rule/tournament/{tournament}', [RuleController::class, 'loadrule'])->middleware('admin')->name('rule.loadrule');
Route::get('/admin/settings/rule/create/{tournament}', [RuleController::class, 'create'])->middleware('admin')->name('rule.create');
Route::post('/admin/settings/store', [RuleController::class, 'store'])->middleware('admin')->name('rule.store');
Route::get('/admin/settings/rule/{rule}/edit', [RuleController::class, 'edit'])->middleware('admin')->name('rule.edit');
Route::put('/admin/settings/rule/{rule}', [RuleController::class, 'update'])->middleware('admin')->name('rule.update');

//Rule Controller End
