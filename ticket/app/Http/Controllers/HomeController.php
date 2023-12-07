<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->dropdown == 'Client') {
                $admin = User::where('dropdown', 'Admin')->first();
                return view('tickets.client', compact('admin'));
            } else {
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
                return view('tickets.admin', ['token' => $user->token, 'countOfUnread' => $unreadNotificationsCount]);
            }
        } else {
            return view('home.land');
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    //     public function create()
    //     {
    //         //
    //     }

    //     /**
    //      * Store a newly created resource in storage.
    //      */
    //     public function store(Request $request)
    //     {
    //         //
    //     }

    //     /**
    //      * Display the specified resource.
    //      */
    //     public function show(Home $home)
    //     {
    //         //
    //     }

    //     /**
    //      * Show the form for editing the specified resource.
    //      */
    //     public function edit(Home $home)
    //     {
    //         //
    //     }

    //     /**
    //      * Update the specified resource in storage.
    //      */
    //     public function update(Request $request, Home $home)
    //     {
    //         //
    //     }

    //     /**
    //      * Remove the specified resource from storage.
    //      */
    //     public function destroy(Home $home)
    //     {
    //         //
    //     }
}
