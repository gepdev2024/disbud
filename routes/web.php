<?php

use App\Http\Controllers\ObjekWisataController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TemuanController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

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

$controller_path = 'App\Http\Controllers';

Route::get('locale/{locale}', function ($locale) {
  Session::put('locale', $locale);
  return redirect()->back();
});

Route::get('objekWisata/{kota}', function ($kota) {
  Session::put('kota', $kota);
  return redirect('/cagarBudaya');
});

Route::group(['namespace' => 'App\Http\Controllers'], function () {
  // Main Page Route
  Route::get('/', 'VisitorController@index')->name('landingPage');
  Route::get('/cagarBudaya', 'VisitorController@benda')->name('peta');
  Route::get('/data', 'VisitorController@data')->name('data');
  Route::get('/laporTemuan', 'VisitorController@laporTemuan')->name('laporTemuan');
  Route::post('/laporTemuan', 'VisitorController@kirimLaporTemuan');
  Route::get('/berhasilKirimLapor/{token}', 'VisitorController@berhasilKirimLapor')->name('berhasilKirimLapor');
  Route::get('/cekToken', 'VisitorController@cekToken')->name('cekToken');
  Route::post('/cekHasilToken', 'VisitorController@cekHasilToken')->name('cekHasilToken');
  // Route::get('/nonCagarBudaya', 'VisitorController@takBenda')->name('VisitorPage');
  // Route::get('/WBTB', 'VisitorController@takBenda')->name('VisitorPage');



  // auth
  Route::get('login', 'LoginController@show')->name('login');
  Route::post('login', 'LoginController@login');

  Route::group(['middleware' => ['auth']], function () {
    // temuan
    Route::get('/temuan', [TemuanController::class, 'temuanProv'])->name('prov.temuan');

    // Provinsi Routes
    Route::get('objek-wisata', 'ObjekWisataController@index')->name('provinsi.objek-wisata');
    Route::post('objek-wisata', 'ObjekWisataController@store');
    Route::get('objek-wisata/{id}/delete', 'ObjekWisataController@destroy');
    Route::post('objek-wisata/update', 'ObjekWisataController@update');

    // Kelola user
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('foto', 'FotoController@index')->name('data-foto');
    Route::post('foto', 'FotoController@store');
    Route::get('foto/{id}/delete', 'FotoController@destroy');
    Route::group(['middleware' => ['auth']], function () {
      // Admin Routes (provinsi)
      Route::get('objek-wisata', 'ObjekWisataController@index')->name('provinsi.objek-wisata');
      Route::post('objek-wisata', 'ObjekWisataController@store');
      Route::get('objek-wisata/{id}/delete', 'ObjekWisataController@destroy');
      Route::post('objek-wisata/update', 'ObjekWisataController@update');

      Route::get('foto', 'FotoController@index')->name('data-foto');
      Route::post('foto', 'FotoController@store');
      Route::get('foto/{id}/delete', 'FotoController@destroy');

      Route::get('logout', 'LogoutController@perform');
    });

    Route::group(['middleware' => ['auth'], 'prefix' => 'kota'], function () {

      Route::get('/temuan', [TemuanController::class, 'index'])->name('kota.temuan');
      Route::get('/temuan/{id}', [TemuanController::class, 'show'])->name('temuan.show');
      Route::patch('/temuan/{temuan}/revisi', [TemuanController::class, 'revisi'])->name('temuan.revisi');
      Route::patch('/temuan/{temuan}/valid', [TemuanController::class, 'valid'])->name('temuan.valid');

      Route::get('objek-wisata', 'ObjekWisataController@kotaIndex')->name('kota.objek-wisata');
    });
  });
});

// // layout
// Route::get('/layouts/without-menu', $controller_path . '\layouts\WithoutMenu@index')->name('layouts-without-menu');
// Route::get('/layouts/without-navbar', $controller_path . '\layouts\WithoutNavbar@index')->name('layouts-without-navbar');
// Route::get('/layouts/fluid', $controller_path . '\layouts\Fluid@index')->name('layouts-fluid');
// Route::get('/layouts/container', $controller_path . '\layouts\Container@index')->name('layouts-container');
// Route::get('/layouts/blank', $controller_path . '\layouts\Blank@index')->name('layouts-blank');

// // pages
// Route::get('/pages/account-settings-account', $controller_path . '\pages\AccountSettingsAccount@index')->name('pages-account-settings-account');
// Route::get('/pages/account-settings-notifications', $controller_path . '\pages\AccountSettingsNotifications@index')->name('pages-account-settings-notifications');
// Route::get('/pages/account-settings-connections', $controller_path . '\pages\AccountSettingsConnections@index')->name('pages-account-settings-connections');
// Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');
// Route::get('/pages/misc-under-maintenance', $controller_path . '\pages\MiscUnderMaintenance@index')->name('pages-misc-under-maintenance');

// // authentication
// Route::get('/auth/login-basic', $controller_path . '\authentications\LoginBasic@index')->name('auth-login-basic');
// Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name('auth-register-basic');
// Route::get('/auth/forgot-password-basic', $controller_path . '\authentications\ForgotPasswordBasic@index')->name('auth-reset-password-basic');

// // cards
// Route::get('/cards/basic', $controller_path . '\cards\CardBasic@index')->name('cards-basic');

// // User Interface
// Route::get('/ui/accordion', $controller_path . '\user_interface\Accordion@index')->name('ui-accordion');
// Route::get('/ui/alerts', $controller_path . '\user_interface\Alerts@index')->name('ui-alerts');
// Route::get('/ui/badges', $controller_path . '\user_interface\Badges@index')->name('ui-badges');
// Route::get('/ui/buttons', $controller_path . '\user_interface\Buttons@index')->name('ui-buttons');
// Route::get('/ui/carousel', $controller_path . '\user_interface\Carousel@index')->name('ui-carousel');
// Route::get('/ui/collapse', $controller_path . '\user_interface\Collapse@index')->name('ui-collapse');
// Route::get('/ui/dropdowns', $controller_path . '\user_interface\Dropdowns@index')->name('ui-dropdowns');
// Route::get('/ui/footer', $controller_path . '\user_interface\Footer@index')->name('ui-footer');
// Route::get('/ui/list-groups', $controller_path . '\user_interface\ListGroups@index')->name('ui-list-groups');
// Route::get('/ui/modals', $controller_path . '\user_interface\Modals@index')->name('ui-modals');
// Route::get('/ui/navbar', $controller_path . '\user_interface\Navbar@index')->name('ui-navbar');
// Route::get('/ui/offcanvas', $controller_path . '\user_interface\Offcanvas@index')->name('ui-offcanvas');
// Route::get('/ui/pagination-breadcrumbs', $controller_path . '\user_interface\PaginationBreadcrumbs@index')->name('ui-pagination-breadcrumbs');
// Route::get('/ui/progress', $controller_path . '\user_interface\Progress@index')->name('ui-progress');
// Route::get('/ui/spinners', $controller_path . '\user_interface\Spinners@index')->name('ui-spinners');
// Route::get('/ui/tabs-pills', $controller_path . '\user_interface\TabsPills@index')->name('ui-tabs-pills');
// Route::get('/ui/toasts', $controller_path . '\user_interface\Toasts@index')->name('ui-toasts');
// Route::get('/ui/tooltips-popovers', $controller_path . '\user_interface\TooltipsPopovers@index')->name('ui-tooltips-popovers');
// Route::get('/ui/typography', $controller_path . '\user_interface\Typography@index')->name('ui-typography');

// // extended ui
// Route::get('/extended/ui-perfect-scrollbar', $controller_path . '\extended_ui\PerfectScrollbar@index')->name('extended-ui-perfect-scrollbar');
// Route::get('/extended/ui-text-divider', $controller_path . '\extended_ui\TextDivider@index')->name('extended-ui-text-divider');

// // icons
// Route::get('/icons/boxicons', $controller_path . '\icons\Boxicons@index')->name('icons-boxicons');

// // form elements
// Route::get('/forms/basic-inputs', $controller_path . '\form_elements\BasicInput@index')->name('forms-basic-inputs');
// Route::get('/forms/input-groups', $controller_path . '\form_elements\InputGroups@index')->name('forms-input-groups');

// // form layouts
// Route::get('/form/layouts-vertical', $controller_path . '\form_layouts\VerticalForm@index')->name('form-layouts-vertical');
// Route::get('/form/layouts-horizontal', $controller_path . '\form_layouts\HorizontalForm@index')->name('form-layouts-horizontal');

// // tables
// Route::get('/tables/basic', $controller_path . '\tables\Basic@index')->name('tables-basic');