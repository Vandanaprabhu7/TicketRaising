<?php

namespace App\Http\Controllers;

use App\Models\Ticket;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user && $user->dropdown == 'Client') {
                $admin = User::where('dropdown', 'Admin')->first();
                return view('tickets.client', compact('admin'));
            } else {
                $user = User::where('dropdown', 'Admin')->first();
                $tickets = json_decode($user->mytickets, true);
                $token = $user->token;
                $notifications = json_decode($user->notifications, true);
                if ($notifications !== null) {

                    $unreadNotifications = array_filter($notifications, function ($notification) {
                        return $notification['status'] === 'unread';
                    });

                    // Get the count of unread notifications
                    $unreadNotificationsCount = count($unreadNotifications);
                } else {
                    $unreadNotificationsCount = 0;
                }
                return view('tickets.admin', ['token' => $token, 'countOfUnread' => $unreadNotificationsCount]);
            }
        } else {
            return view('login.lpage');
        }
    }
    public function check(Request $request)
    {
        $credentials = $request->validate([
            'semail' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = User::where('semail', $credentials['semail'])->first();
            $token = $user->token;
            $drop = $user->dropdown;

            if ($drop === 'Admin') {
                $user = User::where('dropdown', 'Admin')->first();
                $tickets = json_decode($user->mytickets, true);


                $notifications = json_decode($user->notifications, true);
                if ($notifications !== null) {

                    $unreadNotifications = array_filter($notifications, function ($notification) {
                        return $notification['status'] === 'unread';
                    });

                    // Get the count of unread notifications
                    $unreadNotificationsCount = count($unreadNotifications);
                } else {
                    $unreadNotificationsCount = 0;
                }
                return view('tickets.admin', ['token' => $token, 'countOfUnread' => $unreadNotificationsCount]);
            } elseif ($drop === 'Client') {
                $admin = User::where('dropdown', 'Admin')->first();
                return view('tickets.client', compact('admin'));
            }
        } else {
            return redirect()->back()->with('error', 'Invalid login')->withInput();
        }
    }
    public function notcheck()
    {
        http_response_code(403);
        exit;
    }

    public function password1()
    {
        if (Auth::check()) {
            return view('login.password1');
        } else {
            return view('login.lpage');
        }
    }
    public function password2()
    {
        return view('login.password2');
    }
}
