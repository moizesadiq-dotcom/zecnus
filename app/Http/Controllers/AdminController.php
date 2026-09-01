<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Project;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADMIN LOGIN PAGE
    |--------------------------------------------------------------------------
    */

    public function showAdminLogin()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.admin-login');
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN LOGIN
    |--------------------------------------------------------------------------
    */

    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (!Auth::attempt($credentials)) {
            return back()
                ->withErrors([
                    'email' => 'Invalid admin email or password.',
                ])
                ->withInput($request->only('email'));
        }

        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return back()
            ->withErrors([
                'email' => 'This account does not have admin access.',
            ])
            ->withInput($request->only('email'));
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN LOGOUT
    |--------------------------------------------------------------------------
    */

    public function adminLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN DASHBOARD
    |--------------------------------------------------------------------------
    */

    public function dashboard()
    {
        $admin = Auth::user();

        $totalClients = User::where('role', 'client')->count();

        $totalProjects = Project::count();

        $activeProjects = Project::where(
            'status',
            'In Progress'
        )->count();

        $completedProjects = Project::where(
            'status',
            'Completed'
        )->count();

        $totalTickets = Ticket::count();

        $openTickets = Ticket::whereIn(
            'status',
            [
                'Pending',
                'In Progress',
            ]
        )->count();

        $totalInvoices = Invoice::count();

        $paidRevenue = Invoice::where(
            'status',
            'Paid'
        )->sum('amount');

        $pendingInvoices = Invoice::whereIn(
            'status',
            [
                'Pending',
                'Unpaid',
            ]
        )->count();

        $overdueInvoices = Invoice::whereDate(
            'due_date',
            '<',
            now()->toDateString()
        )
        ->where(
            'status',
            '!=',
            'Paid'
        )
        ->count();

        $tickets = Ticket::with('client')
            ->latest()
            ->take(5)
            ->get();

        $invoices = Invoice::with('client')
            ->latest()
            ->take(5)
            ->get();

        $projects = Project::with('client')
            ->latest()
            ->take(5)
            ->get();

        return view(
            'admin.dashboard',
            compact(
                'admin',
                'totalClients',
                'totalProjects',
                'activeProjects',
                'completedProjects',
                'totalTickets',
                'openTickets',
                'totalInvoices',
                'paidRevenue',
                'pendingInvoices',
                'overdueInvoices',
                'tickets',
                'invoices',
                'projects'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | MANAGE CLIENTS
    |--------------------------------------------------------------------------
    */

    public function manageClients()
    {
        $clients = User::where(
            'role',
            'client'
        )
        ->latest()
        ->get();

        return view(
            'admin.clients',
            compact('clients')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | MANAGE PROJECTS
    |--------------------------------------------------------------------------
    */

    public function manageProjects()
    {
        $projects = Project::with('client')
            ->latest()
            ->get();

        $clients = User::where(
            'role',
            'client'
        )
        ->latest()
        ->get();

        return view(
            'admin.projects',
            compact(
                'projects',
                'clients'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STORE PROJECT
    |--------------------------------------------------------------------------
    */

    public function storeProject(Request $request)
    {
        $validated = $request->validate([
            'client_id' => [
                'required',
                'exists:users,id',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'category' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
                'max:5000',
            ],

            'location' => [
                'nullable',
                'string',
                'max:255',
            ],

            'budget' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'deadline' => [
                'nullable',
                'date',
            ],
        ], [
            'client_id.required' =>
                'Client select karna zaroori hai.',

            'client_id.exists' =>
                'Selected client valid nahi hai.',

            'title.required' =>
                'Project title zaroori hai.',

            'category.required' =>
                'Project category zaroori hai.',

            'budget.numeric' =>
                'Budget number hona chahiye.',

            'deadline.date' =>
                'Deadline valid date honi chahiye.',
        ]);

        /*
        |--------------------------------------------------------------------------
        | MAKE SURE SELECTED USER IS A CLIENT
        |--------------------------------------------------------------------------
        */

        $client = User::where('id', $validated['client_id'])
            ->where('role', 'client')
            ->first();

        if (!$client) {
            return back()
                ->withErrors([
                    'client_id' =>
                        'Selected user client nahi hai.',
                ])
                ->withInput();
        }

        /*
        |--------------------------------------------------------------------------
        | CREATE PROJECT
        |--------------------------------------------------------------------------
        */

        Project::create([
            'client_id' => $client->id,
            'title' => $validated['title'],
            'category' => $validated['category'],
            'description' => $validated['description'] ?? null,
            'location' => $validated['location'] ?? null,
            'budget' => $validated['budget'] ?? null,
            'deadline' => $validated['deadline'] ?? null,
            'progress' => 0,
            'status' => 'In Progress',
        ]);

        return redirect()
            ->route('admin.projects')
            ->with(
                'success',
                'Project successfully create ho gaya hai.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | MANAGE TICKETS
    |--------------------------------------------------------------------------
    */

    public function manageTickets()
    {
        $tickets = Ticket::with('client')
            ->latest()
            ->get();

        return view(
            'admin.tickets',
            compact('tickets')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE TICKET STATUS
    |--------------------------------------------------------------------------
    */

    public function updateTicketStatus(
        Request $request,
        $id
    ) {
        $validated = $request->validate([
            'status' => [
                'required',
                'string',
            ],
        ]);

        $ticket = Ticket::findOrFail($id);

        $ticket->update([
            'status' => $validated['status'],
        ]);

        return back()->with(
            'success',
            'Ticket status update ho gaya hai.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | MANAGE INVOICES
    |--------------------------------------------------------------------------
    */

    public function manageInvoices()
    {
        $invoices = Invoice::with('client')
            ->latest()
            ->get();

        $clients = User::where(
            'role',
            'client'
        )
        ->latest()
        ->get();

        return view(
            'admin.invoices',
            compact(
                'invoices',
                'clients'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STORE INVOICE
    |--------------------------------------------------------------------------
    */

    public function storeInvoice(Request $request)
    {
        $validated = $request->validate([
            'client_id' => [
                'required',
                'exists:users,id',
            ],

            'invoice_number' => [
                'required',
                'string',
                'max:255',
            ],

            'amount' => [
                'required',
                'numeric',
                'min:0',
            ],

            'due_date' => [
                'required',
                'date',
            ],

            'status' => [
                'required',
                'string',
                'in:Paid,Unpaid,Pending',
            ],
        ], [
            'client_id.required' =>
                'Client select karna zaroori hai.',

            'client_id.exists' =>
                'Selected client valid nahi hai.',

            'invoice_number.required' =>
                'Invoice number zaroori hai.',

            'amount.required' =>
                'Amount zaroori hai.',

            'amount.numeric' =>
                'Amount number hona chahiye.',

            'due_date.required' =>
                'Due date zaroori hai.',

            'status.required' =>
                'Invoice status select karna zaroori hai.',
        ]);

        /*
        |--------------------------------------------------------------------------
        | MAKE SURE SELECTED USER IS A CLIENT
        |--------------------------------------------------------------------------
        */

        $client = User::where('id', $validated['client_id'])
            ->where('role', 'client')
            ->first();

        if (!$client) {
            return back()
                ->withErrors([
                    'client_id' =>
                        'Selected user client nahi hai.',
                ])
                ->withInput();
        }

        /*
        |--------------------------------------------------------------------------
        | CREATE INVOICE
        |--------------------------------------------------------------------------
        */

        Invoice::create([
            'client_id' => $client->id,
            'invoice_number' => $validated['invoice_number'],
            'amount' => $validated['amount'],
            'due_date' => $validated['due_date'],
            'status' => $validated['status'],
        ]);

        return redirect()
            ->route('admin.invoices')
            ->with(
                'success',
                'Invoice successfully generate ho gayi hai.'
            );
    }
}