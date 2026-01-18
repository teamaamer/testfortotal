<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CareerRequest;
use App\Models\Account;
use App\Models\Career;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class CareersController extends Controller
{
    public function index(Request $request)
    {
        $query = Career::query();

        // Filter by role
        if (auth()->user()->isAcademy()) {
            abort(403);
        } else if (auth()->user()->isCenter()) {
            // Center / normal user sees only their own jobs
            $accountId = auth()->user()->account->id;
            $query->where('account_id', $accountId);
        }


        if ($request->has('q') && !empty($request->q)) {
            $keyword = $request->q;
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                    ->orWhere('summary', 'like', "%{$keyword}%");
            });
        }

        $careers = $query->get();
        return view('dashboard.careers.index')->with(compact('careers'));
    }

    public function edit(Career $career)
    {

        if (auth()->user()->hasRole('admin')) {
            // Admin: get all centers
            $centers = Account::whereHas('user', function ($query) {
                $query->where('role', 'center');
            })->pluck('name', 'id');
        } else {
            // Center: only return their own account
            $centers = Account::where('id', auth()->id())->pluck('name', 'id');
        }

        return view('dashboard.careers.create_edit')->with(compact('career', 'centers'));
    }


    public function create()
    {

        if (auth()->user()->hasRole('admin')) {
            // Admin: get all centers
            $centers = Account::whereHas('user', function ($query) {
                $query->where('role', 'center');
            })->pluck('name', 'id');
        } else {
            // Center: only return their own account
            $centers = Account::where('id', auth()->id())->pluck('name', 'id');
        }
        return view('dashboard.careers.create_edit')->with(compact('centers'));
    }

    public function apply(Career $career)
    {
        $account = auth()->user()->account;

        // Check if already applied
        $application = JobApplication::where('account_id', $account->id)
            ->where('career_id', $career->id)
            ->first();

        if ($application) {
            // Undo apply
            $application->delete();
            return response()->json(['status' => 'removed']);
        }

        // Apply
        JobApplication::create([
            'account_id' => $account->id,
            'career_id' => $career->id,
        ]);

        return response()->json(['status' => 'applied']);
    }


    public function show(Career $career)
    {
        return view('dashboard.careers.show')->with(compact('career'));
    }

    public function update(CareerRequest $request, Career $career)
    {
        $career->title = $request->input('title');
        $career->summary = $request->input('summary');
        $career->salary = $request->input('salary_range');
        $career->account_id = $request->input('account_id');
        $career->status = $request->input('status');

        // --- Address Info (Card 2) ---
        $career->city     = $request->input('city');
        $career->country  = $request->input('country');

        $career->save();

        return redirect('dashboard/careers/' . $career->id)->with('success', $career->title . ' has been updated Successfully');
    }

    public function store(CareerRequest $request)
    {

        $career = Career::create([

            'title' => $request->title,
            'summary' => $request->summary,
            'salary' =>  $request->salary_range,
            'account_id' => $request->account_id,
            'status'     => $request->status,
            'city'       => $request->city,
            'country'    => $request->country
        ]);

        $career->save();

        return redirect('dashboard/careers/' . $career->id)->with('success', $career->title . ' has been Created Successfully');
    }

    public function destroy(Request $request, Career $career)
    {
        $career->delete();
        return redirect('dashboard/careers/')->with('success', $career->title . ' has been Created Successfully');
    }
}
