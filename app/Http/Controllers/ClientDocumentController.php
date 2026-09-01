<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientDocument;
use Illuminate\Support\Facades\Auth;

class ClientDocumentController extends Controller
{
    public function index()
    {
        $documents = ClientDocument::where('user_id', Auth::id())->latest()->get();
        return view('client.documents', compact('documents'));
    }
}