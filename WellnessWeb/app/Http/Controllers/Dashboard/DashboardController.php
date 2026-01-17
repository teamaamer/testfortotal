<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Career;
use App\Models\Course;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $accountsNo = Account::count();
        $academiesNo = Account::whereHas('user', function ($query) {
            $query->where('role', 'academy');
        })->count();

        $coursesNo = Course::count();
        $careersNo = Career::count();

        return view('dashboard.index')->with(compact('accountsNo', 'academiesNo', 'coursesNo', 'careersNo'));
    }
}
