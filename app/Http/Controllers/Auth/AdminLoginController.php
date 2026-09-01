<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Project;

class AdminController extends Controller
{
    // Admin Dashboard Overview
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Manage Clients List
    public function manageClients()
    {
        $clients = User::where('role', 'client')->get();
        return view('admin.clients', compact('clients'));
    }

    // Manage Projects & Assign to Client
    public function manageProjects()
    {
        $projects = Project::with('client')->latest()->get();
        $clients = User::where('role', 'client')->get();
        
        return view('admin.projects', compact('projects', 'clients'));
    }

    // Store New Project
    public function storeProject(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'client_id' => 'required|exists:users,id',
            'budget' => 'nullable|numeric',
            'deadline' => 'nullable|date',
        ]);

        Project::create([
            'title' => $request->title,
            'client_id' => $request->client_id,
            'budget' => $request->budget,
            'deadline' => $request->deadline,
            'status' => 'Pending',
        ]);

        return redirect()->back()->with('success', 'Project created and linked successfully!');
    }

    // Manage Support Tickets
    public function manageTickets()
    {
        return view('admin.tickets');
    }

    // Update Ticket Status
    public function updateTicketStatus(Request $request, $id)
    {
        // Ticket status update logic here
        return redirect()->back();
    }

    // Manage Invoices
    public function manageInvoices()
    {
        return view('admin.invoices');
    }

    // Store Invoice
    public function storeInvoice(Request $request)
    {
        // Invoice creation logic here
        return redirect()->back();
    }

    // --- AUTHENTICATION METHODS ---

    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            }
            return redirect()->intended('/client/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'client' // By default naya user client banega
        ]);

        Auth::login($user);

        return redirect('/client/dashboard');
    }
}