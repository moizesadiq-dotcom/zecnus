<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\ServiceController;

use App\Models\Service;
use App\Models\Project;
use App\Models\Portfolio;


/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    if (!Auth::check()) {
        return redirect()->route('login');
    }

    if (Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    $services = Service::latest()->get();
    $projects = Project::latest()->get();
    $portfolios = Portfolio::latest()->get();

    return view('home', compact(
        'services',
        'projects',
        'portfolios'
    ));

})->name('home');


/*
|--------------------------------------------------------------------------
| GUEST ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/login', [ClientController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [ClientController::class, 'login'])
        ->name('login.post');

    Route::get('/register', [ClientController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [ClientController::class, 'register'])
        ->name('register.post');

});


/*
|--------------------------------------------------------------------------
| ADMIN LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/admin-login', function () {

    return redirect()->route('admin.login');

})->name('admin.login.shortcut');


Route::get('/admin-secret-login', [AdminController::class, 'showAdminLogin'])
    ->name('admin.login');


Route::post('/admin-secret-login', [AdminController::class, 'adminLogin'])
    ->name('admin.login.post');


/*
|--------------------------------------------------------------------------
| CLIENT ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:client'])
    ->prefix('client')
    ->name('client.')
    ->group(function () {

        /*
        | Client Home
        */
        Route::get('/home', [ClientController::class, 'index'])
            ->name('home');


        /*
        | Client Dashboard
        */
        Route::get('/dashboard', [ClientController::class, 'dashboard'])
            ->name('dashboard');


        /*
        | Client Projects
        */
        Route::get('/projects', [ClientController::class, 'projects'])
            ->name('projects');


        /*
        | Client Project Detail
        */
        Route::get('/project/{id}', [ClientController::class, 'projectDetail'])
            ->name('project.detail');


        /*
        | Client Services
        |
        | Services admin panel se add hongi
        | aur client yahan active services dekhega.
        */
        Route::get('/services', [ContactController::class, 'services'])
            ->name('services');


        /*
        | Client Invoices
        */
        Route::get('/invoices', [ClientController::class, 'invoices'])
            ->name('invoices');


        /*
        | Client Support
        */
        Route::get('/support', [ClientController::class, 'support'])
            ->name('support');


        Route::post('/support', [ClientController::class, 'storeTicket'])
            ->name('support.store');


        /*
        | Client Profile
        */
        Route::get('/profile', [ClientController::class, 'profile'])
            ->name('profile');


        Route::patch('/profile', [ClientController::class, 'updateProfile'])
            ->name('profile.update');

    });


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        | Admin Dashboard
        */
        Route::get('/dashboard', [AdminController::class, 'dashboard'])
            ->name('dashboard');


        /*
        | Manage Clients
        */
        Route::get('/clients', [AdminController::class, 'manageClients'])
            ->name('clients');


        /*
        | Manage Projects
        */
        Route::get('/projects', [AdminController::class, 'manageProjects'])
            ->name('projects');


        Route::post('/projects', [AdminController::class, 'storeProject'])
            ->name('projects.store');


        /*
        | Services CRUD
        |
        | Admin:
        | Add
        | Edit
        | Delete
        | View
        */
        Route::resource('/services', ServiceController::class);


        /*
        | Support Tickets
        */
        Route::get('/tickets', [AdminController::class, 'manageTickets'])
            ->name('tickets');


        Route::post('/ticket/{id}/status', [AdminController::class, 'updateTicketStatus'])
            ->name('ticket.status');


        /*
        | Invoices
        */
        Route::get('/invoices', [AdminController::class, 'manageInvoices'])
            ->name('invoices');


        Route::post('/invoices', [AdminController::class, 'storeInvoice'])
            ->name('invoices.store');


        /*
        | Portfolio
        */
        Route::get('/portfolio', [PortfolioController::class, 'index'])
            ->name('portfolio');


        Route::get('/portfolio/create', [PortfolioController::class, 'create'])
            ->name('portfolio.create');


        Route::post('/portfolio', [PortfolioController::class, 'store'])
            ->name('portfolio.store');


        Route::get('/portfolio/{portfolio}/edit', [PortfolioController::class, 'edit'])
            ->name('portfolio.edit');


        Route::put('/portfolio/{portfolio}', [PortfolioController::class, 'update'])
            ->name('portfolio.update');


        Route::delete('/portfolio/{portfolio}', [PortfolioController::class, 'destroy'])
            ->name('portfolio.destroy');


        /*
        | Admin Logout
        */
        Route::post('/logout', [AdminController::class, 'adminLogout'])
            ->name('logout');

    });


/*
|--------------------------------------------------------------------------
| STAFF ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')
    ->prefix('staff')
    ->name('staff.')
    ->group(function () {

        Route::get('/dashboard', function () {

            return view('staff.dashboard');

        })->name('dashboard');

    });


/*
|--------------------------------------------------------------------------
| CONTACT FORM
|--------------------------------------------------------------------------
*/

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');


/*
|--------------------------------------------------------------------------
| PUBLIC PORTFOLIOS
|--------------------------------------------------------------------------
*/

Route::get('/portfolios', [PortfolioController::class, 'publicIndex'])
    ->name('portfolios');


/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', function () {

    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('login');

})->middleware('auth')->name('logout');