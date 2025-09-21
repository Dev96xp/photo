<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\InvitationController;
use App\Http\Controllers\Pos\PosController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Event\ConfigurationEventController;
use App\Http\Controllers\Admin\Event\EventController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Subcategory\SubcategoryController;
use App\Http\Controllers\Admin\Training\TrainingController;
use App\Http\Controllers\Admin\Book\BookController;
use App\Http\Controllers\Admin\Business\BusinessController;
use App\Http\Controllers\Admin\Event\EventCalendarController;
use App\Http\Controllers\Admin\Impost\ImpostController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\Page\PageController;
use App\Http\Controllers\Admin\Permission\PermissionController;
use App\Http\Controllers\Admin\Proof\ProofController;
use App\Models\Business;
use App\Models\Impost;

Route::get('', [HomeController::class, 'index'])->name('home');

Route::resource('dashboard',DashboardController::class)->names('dashboard');
Route::resource('training',TrainingController::class)->names('training');

// Cofiguraciones - Permissions
Route::resource('permissions', PermissionController::class)->names('permissions');

Route::resource('pages', PageController::class)->names('pages');
Route::get('pages/{sectionx}/select_images', [PageController::class,'select_images'])->name('pages.select_images');
Route::post('pages/{sectionx}/save_images/', [PageController::class,'save_images'])->name('pages.save_images'); //Dropzone

Route::resource('proof', ProofController::class)->names('proof');
Route::post('proof/{gallery}/save_images/', [ProofController::class,'save_images'])->name('proof.save_images');
Route::get('proof/{gallery}/upload_images', [ProofController::class,'upload_images'])->name('proof.upload_images'); //Dropzone

Route::resource('business', BusinessController::class)->names('business')->except(['update']);
Route::post('business/{business}/update/', [BusinessController::class,'update'])->name('business.update');


Route::resource('users',UserController::class)->names('users');
Route::resource('invitations',InvitationController::class)->names('invitations');
// IMPORTANTE: La ruta de tipo resource, genera las 7 rutas necesarias para hacer un CRUD COMPLETO
// la SEGURIDAD DE PERMISOS se maneja desde su controlador, usando __constructor()
Route::resource('roles',RoleController::class)->names('roles');

// MASTER CLASS - NUNCA OLVIDES USAR EL COMANDO (php artisan route:list), para checar tus rutas y asi hacer tus ajustes
// Se agrego este nuevo metodo (files) a una ruta resource, se antepone a esta como se muestra aqui abajo
Route::get('sections/{invitation}/edit_sections', [SectionController::class,'edit_sections'])->name('sections.edit_sections');
Route::get('sections/{invitation}/create_sections', [SectionController::class,'create_sections'])->name('sections.create_sections');
Route::post('sections/{invitation}/store_sections', [SectionController::class,'store_sections'])->name('sections.store_sections');
Route::get('sections/{section}/edit_section/{invitation}', [SectionController::class,'edit_section'])->name('sections.edit_section');
Route::put('sections/{section}/update_section/{invitation}', [SectionController::class,'update_section'])->name('sections.update_section');
Route::get('sections/{section}/select_files', [SectionController::class,'select_files'])->name('sections.select_files');
Route::post('sections/{section}/save_files', [SectionController::class,'save_files'])->name('sections.save_files');
Route::resource('sections',SectionController::class)->names('sections');


//ORDERS ONLINE
// MASTER CLASS  - IMPORTANTE
// Recordar que la palabra admin, fue determinada como un prefijo, y esta presente en cada ruta, por tal razon
// si el nombre de la ruta aqui es: (orders.index), esto realmente indica que, la ruta sera: (admin.orders.index), y asi
// tendra que ser llamada desde donde se utilize o se mande llamar.

Route::get('orders', [OrderController::class,'index'])->name('orders.index');   //(admin.orders.index)
Route::get('orders/{order}', [OrderController::class,'show'])->name('orders.show');   //(admin.orders.show)

// PRINT ORDER ONLINE
Route::get('order/print/{order}', [OrderController::class,'print'])->name('order.print');   //(admin.orders.print)


// POS
Route::get('pos/order/{user}/index', [PosController::class,'index'])->name('pos.index');
Route::get('pos/order/prninvoice/{transaction_id}', [PosController::class,'prninvoice'])->name('pos.prninvoice');

Route::resource('brands', BrandController::class)->names('brands');
Route::resource('categories', CategoryController::class)->names('categories');
Route::resource('subcategories', SubcategoryController::class)->names('subcategories');
Route::resource('imposts', ImpostController::class)->names('imposts');

// Events
//Route::resource('schedules', ScheduleController::class)->names('schedules');   NO SE USA, SE CAMBIO POR EVENT
Route::resource('events', EventController::class)->names('events');
Route::get('events/{event_id}/print_report', [EventController::class,'print_report'])->name('events.print_report');
Route::get('configuration/event', [ConfigurationEventController::class,'index'])->name('configuration.event.index');
Route::get('schedule', [EventCalendarController::class,'index'])->name('schedule.index');

// Route::get('products/index/{brand?}/{category?}', [ProductController::class,'index'])->middleware('can:Product Index')->name('products.index'); ORIGINAL
Route::get('products/index/{brand?}/{category?}', [ProductController::class,'index'])->name('products.index'); //TEMPORAL
Route::get('products/{product}/select_images', [ProductController::class,'select_images'])->name('products.select_images');
Route::post('products/{product}/save_images/', [ProductController::class,'save_images'])->name('products.save_images');

// Corte de Caja
Route::get('corte/index', [BookController::class,'index'])->name('corte.index');
Route::get('corte/prnreport/{store_id}/{date1?}/{date2?}/{radio_select?}', [BookController::class,'prnreport'])->name('corte.prnreport');

