<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Invoice;
use App\Models\SupportTicket;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;

class ClientDashboardController extends Controller
{
    // Overview Dashboard
    public function index()
    {
        $user = Auth::user();
        $userId = $user->id ?? 1;

        $projects = Schema::hasTable('projects') ? Project::where('client_id', $userId)->get() : collect();
        $invoices = Schema::hasTable('invoices') ? Invoice::where('client_id', $userId)->get() : collect();
        
        $tickets = collect();
        if (Schema::hasTable('support_tickets')) {
            $ticketQuery = SupportTicket::query();
            if (Schema::hasColumn('support_tickets', 'user_id')) {
                $tickets = $ticketQuery->where('user_id', $userId)->get();
            } elseif (Schema::hasColumn('support_tickets', 'client_id')) {
                $tickets = $ticketQuery->where('client_id', $userId)->get();
            } else {
                $tickets = $ticketQuery->get();
            }
        }

        return view('client.dashboard', compact('projects', 'invoices', 'tickets'));
    }

    // All Projects List
    public function projects()
    {
        $user = Auth::user();
        $projects = Schema::hasTable('projects') ? Project::where('client_id', $user->id ?? 1)->get() : collect();

        return view('client.projects', compact('projects'));
    }

    // Single Project Detail with Milestones & Updates
    public function projectDetail($id)
    {
        $project = Project::findOrFail($id);

        return view('client.project-detail', compact('project'));
    }

    // Invoices / Billing History
    public function invoices()
    {
        $user = Auth::user();
        $invoices = Schema::hasTable('invoices') ? Invoice::where('client_id', $user->id ?? 1)->get() : collect();

        return view('client.invoices', compact('invoices'));
    }

    // Support Tickets Page
    public function support()
    {
        $user = Auth::user();
        $tickets = collect();
        if (Schema::hasTable('support_tickets')) {
            $ticketQuery = SupportTicket::query();
            if (Schema::hasColumn('support_tickets', 'user_id')) {
                $tickets = $ticketQuery->where('user_id', $user->id ?? 1)->get();
            } elseif (Schema::hasColumn('support_tickets', 'client_id')) {
                $tickets = $ticketQuery->where('client_id', $user->id ?? 1)->get();
            } else {
                $tickets = $ticketQuery->get();
            }
        }

        return view('client.support', compact('tickets'));
    }

    // Store New Support Ticket
    public function storeTicket(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $columnName = Schema::hasColumn('support_tickets', 'user_id') ? 'user_id' : 'client_id';

        SupportTicket::create([
            $columnName => Auth::id() ?? 1,
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 'Open',
        ]);

        return redirect()->route('client.support')->with('success', 'Support ticket opened successfully.');
    }

    // Profile Settings Page
    public function profile()
    {
        $user = Auth::user();
        return view('client.profile', compact('user'));
    }

    // Update Profile Details
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('client.profile')->with('success', 'Profile updated successfully.');
    }
}