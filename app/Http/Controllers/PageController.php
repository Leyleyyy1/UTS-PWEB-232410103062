<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    private $users = [
        [
            'email' => 'lely@gmail.com',
            'organizer' => 'PT. Jember Event Organizer',
            'phone' => '081234567890',
            'bio' => 'Event planner enthusiast | Music lover | Dreaming big in small towns.',
            'profile_photo' => 'images/user.png',
            'instagram' => '@jemberfest2025',
            'twitter' => '@jemberfest2025',
            'youtube' => 'JemberFestOfficial',
            'followers' => 187,
            'comments' => 12,
            'profile_views' => 1368,
        ]
    ];
    

    public function profile()
{
    $name = session('username');
    if (!$name) {
        return redirect()->route('login');
    }

    $user = $this->users[0]; 

    return view('profile', [
        'name' => $name,
        'user' => $user
    ]);
}

    public function login()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        $inputUsername = $request->input('username');
        $inputPassword = $request->input('password');
    
        if ($inputUsername && $inputPassword) {
            Session::put('username', $inputUsername);
            return redirect()->route('dashboard');
        }
    
        return redirect()->route('login')->with('error', 'Username atau password salah!');
    }
    

    private function getDashboardData()
    {
        return [
            'total_tickets_sold_today' => 63,
            'total_tickets_sold' => 1321,
            'total_sales_today' => 7560000,
            'total_sales' => 158520000,
            'tickets' => [
                [
                    'type' => 'vip',
                    'sold' => 307,
                    'available' => 234,
                ],
                [
                    'type' => 'vvip',
                    'sold' => 73,
                    'available' => 248,
                ],
                [
                    'type' => 'regular',
                    'sold' => 941,
                    'available' => 121,
                ],
            ],
        ];
    }

    public function concertDetails()
    {
        $concertData = [
            'concert_name' => 'Jember Fest 2025',
            'foto' => 'images/jemberfest.png',
            'artists' => [
                [
                    'name' => 'Dewi Persik',
                    'photo' => 'images/dewi_persik.jpeg',
                    'performance_time' => '18:00',
                ],
                [
                    'name' => 'The Weeknd',
                    'photo' => 'images/the_weeknd.jpeg',
                    'performance_time' => '19:30',
                ],
                [
                    'name' => 'Ariana Grande',
                    'photo' => 'images/ariana_grande.jpeg',
                    'performance_time' => '21:00',
                ],
                [
                    'name' => 'Nadin Amizah',
                    'photo' => 'images/nadin_amizah.jpeg',
                    'performance_time' => '22:30',
                ],
            ],
            'venue' => 'Stadion Jember, Jawa Timur',
            'concert_date' => '2025-12-10',
        ];

        return $concertData;
    }

    public function dashboard(Request $request)
    {
        $username = session('username');
        if (!$username) {
            return redirect()->route('login');
        }
    
        $dashboardData = $this->getDashboardData();
        $concertData = $this->concertDetails();
    
        return view('dashboard', [
            'username' => $username, 
            'concertData' => $concertData,
            'dashboardData' => $dashboardData
        ]);
    }
    public function pengelolaan()
    {
        $name = session('username');
        if (!$name) {
            return redirect()->route('login');
        }

        $dashboardData = $this->getDashboardData();
        $concertData = $this->concertDetails();

        return view('pengelolaan', [
            'name' => $name,
            'concertData' => $concertData,
            'dashboardData' => $dashboardData
        ]);
    }

    public function logout()
    {
        Session::forget('username');
        return redirect()->route('login');
    }
}
