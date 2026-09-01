<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Project;
use App\Models\Service;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | CLIENT LOGIN PAGE
    |--------------------------------------------------------------------------
    */

    public function showLogin()
    {
        // Agar already client login hai
        if (Auth::check() && Auth::user()->role === 'client') {
            return redirect()->route('home');
        }

        // Login form
        return view('admin.auth.login');
    }

    /*
    |--------------------------------------------------------------------------
    | CLIENT LOGIN
    |--------------------------------------------------------------------------
    */

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => [
                'required',
                'email',
            ],

            'password' => [
                'required',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | LOGIN ATTEMPT
        |--------------------------------------------------------------------------
        */

        if (! Auth::attempt($credentials)) {

            return back()
                ->withErrors([
                    'email' => 'Invalid email or password.',
                ])
                ->withInput(
                    $request->only('email')
                );
        }

        /*
        |--------------------------------------------------------------------------
        | REGENERATE SESSION
        |--------------------------------------------------------------------------
        */

        $request->session()->regenerate();

        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | ONLY CLIENT CAN USE THIS LOGIN
        |--------------------------------------------------------------------------
        */

        if ($user->role !== 'client') {

            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return back()
                ->withErrors([
                    'email' => 'This login is for clients only.',
                ])
                ->withInput(
                    $request->only('email')
                );
        }

        /*
        |--------------------------------------------------------------------------
        | CLIENT LOGIN SUCCESS
        |--------------------------------------------------------------------------
        |
        | Client login ke baad DIRECT HOME PAGE.
        |
        */

        return redirect()
            ->route('home')
            ->with(
                'success',
                'Welcome back!'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | CLIENT REGISTER PAGE
    |--------------------------------------------------------------------------
    */

    public function showRegister()
    {
        if (Auth::check()) {

            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if (Auth::user()->role === 'client') {
                return redirect()->route('home');
            }
        }

        return view('admin.auth.register');
    }

    /*
    |--------------------------------------------------------------------------
    | CLIENT REGISTER
    |--------------------------------------------------------------------------
    */

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'min:6',
                'confirmed',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | CREATE CLIENT
        |--------------------------------------------------------------------------
        */

        $user = User::create([
            'name' => $validated['name'],

            'email' => $validated['email'],

            'password' => Hash::make(
                $validated['password']
            ),

            'role' => 'client',
        ]);

        /*
        |--------------------------------------------------------------------------
        | LOGIN AFTER REGISTER
        |--------------------------------------------------------------------------
        */

        Auth::login($user);

        $request->session()->regenerate();

        /*
        |--------------------------------------------------------------------------
        | REGISTER SUCCESS -> HOME
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('home')
            ->with(
                'success',
                'Account successfully created!'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | CLIENT HOME
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $user = Auth::user();

        $services = Service::latest()->get();

        $projects = Project::latest()->get();

        return view(
            'home',
            compact(
                'user',
                'services',
                'projects'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CLIENT DASHBOARD
    |--------------------------------------------------------------------------
    */

    public function dashboard()
    {
        $user = Auth::user();

        $projects = Project::where(
            'client_id',
            $user->id
        )
            ->latest()
            ->get();

        $invoices = Invoice::where(
            'client_id',
            $user->id
        )
            ->latest()
            ->get();

        $tickets = Ticket::where(
            'user_id',
            $user->id
        )
            ->latest()
            ->get();

        return view(
            'client.dashboard',
            compact(
                'user',
                'projects',
                'invoices',
                'tickets'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CLIENT PROJECTS
    |--------------------------------------------------------------------------
    */

    public function projects()
    {
        $user = Auth::user();

        $projects = Project::where(
            'client_id',
            $user->id
        )
            ->latest()
            ->get();

        return view(
            'client.projects',
            compact(
                'user',
                'projects'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | PROJECT DETAIL
    |--------------------------------------------------------------------------
    */

    public function projectDetail($id)
    {
        $user = Auth::user();

        $project = Project::where(
            'client_id',
            $user->id
        )
            ->where(
                'id',
                $id
            )
            ->firstOrFail();

        return view(
            'client.project-detail',
            compact(
                'user',
                'project'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CLIENT INVOICES
    |--------------------------------------------------------------------------
    */

    public function invoices()
    {
        $user = Auth::user();

        $invoices = Invoice::where(
            'client_id',
            $user->id
        )
            ->latest()
            ->get();

        return view(
            'client.invoices',
            compact(
                'user',
                'invoices'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CLIENT SUPPORT
    |--------------------------------------------------------------------------
    */

    public function support()
    {
        $user = Auth::user();

        $tickets = Ticket::where(
            'user_id',
            $user->id
        )
            ->latest()
            ->get();

        return view(
            'client.support',
            compact(
                'user',
                'tickets'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STORE SUPPORT TICKET
    |--------------------------------------------------------------------------
    */

    public function storeTicket(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'subject' => [
                'required',
                'string',
                'max:255',
            ],

            'message' => [
                'required',
                'string',
                'max:5000',
            ],
        ]);

        Ticket::create([
            'user_id' => $user->id,

            'subject' => $validated['subject'],

            'message' => $validated['message'],

            'status' => 'Pending',
        ]);

        return redirect()
            ->route('client.support')
            ->with(
                'success',
                'Support ticket submitted successfully!'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | CLIENT PROFILE
    |--------------------------------------------------------------------------
    */

    public function profile()
    {
        $user = Auth::user();

        return view(
            'client.profile',
            compact('user')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE CLIENT PROFILE
    |--------------------------------------------------------------------------
    */

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,'.$user->id,
            ],

            'phone' => [
                'nullable',
                'string',
                'max:20',
            ],

            'company_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'website' => [
                'nullable',
                'string',
                'max:255',
            ],

            'address' => [
                'nullable',
                'string',
                'max:500',
            ],

            'profile_photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,gif',
                'max:800',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | PROFILE PHOTO
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('profile_photo')) {

            if ($user->profile_photo) {

                $oldPath = str_replace(
                    'storage/',
                    '',
                    $user->profile_photo
                );

                Storage::disk('public')->delete(
                    $oldPath
                );
            }

            $path = $request
                ->file('profile_photo')
                ->store(
                    'profile-photos',
                    'public'
                );

            $validatedData['profile_photo'] =
                'storage/'.$path;
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE USER
        |--------------------------------------------------------------------------
        */

        $user->update($validatedData);

        return back()->with(
            'success',
            'Profile updated successfully!'
        );
    }
}
