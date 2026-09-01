<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Service;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Store a contact message.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        ContactMessage::create($validated);

        return redirect()
            ->back()
            ->with(
                'success',
                'Message sent successfully! We will get back to you soon.'
            );
    }

    /**
     * Display active services for the client.
     */
    public function services()
    {
        $services = Service::where('status', 'active')
            ->latest()
            ->get();

        return view('client.services', compact('services'));
    }
}