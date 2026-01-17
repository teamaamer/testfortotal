<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Account;
use App\Models\Comment;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Log;

class CoursesController extends Controller
{

    public function toggleLike(Course $course)
    {
        $course->likedByUsers()->toggle(auth()->id());

        $isLiked = $course->likedByUsers()->where('user_id', auth()->id())->exists();
        $likesCount = $course->likedByUsers()->count();

        return response()->json([
            'liked' => $isLiked,
            'count' => $likesCount,
        ]);
    }

    public function index(Request $request)
    {

        $query = Course::query();

        if ($request->has('q') && !empty($request->q)) {
            $keyword = $request->q;
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                    ->orWhere('summary', 'like', "%{$keyword}%");
            });
        }

        $courses = $query->paginate(10)->withQueryString();

        $academies = Account::whereHas('user', function ($query) {
            $query->where('role', 'academy');
        })
            ->orderBy('created_at', 'asc')
            ->take(10)
            ->get();

        return view('dashboard.courses.index')->with(compact('academies', 'courses'));
    }

    public function publicindex(Request $request)
    {

        $query = Course::query();
        $courses = $query->paginate(10)->withQueryString();
        return view('courses')->with(compact('courses'));
    }

    public function edit(Course $course)
    {

        $academies = Account::whereHas('user', function ($query) {
            $query->where('role', 'academy');
        })->pluck('name', 'id');

        return view('dashboard.courses.create_edit')->with(compact('course', 'academies'));
    }

    public function create()
    {

        $academies = Account::whereHas('user', function ($query) {
            $query->where('role', 'academy');
        })->pluck('name', 'id');

        return view('dashboard.courses.create_edit')->with(compact('academies'));
    }


    public function allAcademies()
    {

        $academiesList = Account::whereHas('user', function ($query) {
            $query->where('role', 'academy');
        })
            ->orderBy('created_at', 'asc')
            ->get();

        return view('dashboard.courses.academies.index', [
            'academies' => $academiesList
        ]);
    }

    public function academy($accountID)
    {
        $academy = Account::find($accountID);
        return view('dashboard.courses.academies.show')->with(compact('academy'));
    }

    public function show(Course $course)
    {
        $comments = $course->comments()
            ->latest()
            ->paginate(5);

        Log::info($comments);

        return view('dashboard.courses.show')->with(compact('course', 'comments'));
    }


    public function destroy(Request $request, Course $course)
    {
        $course->delete();
        return redirect('dashboard/courses/')->with('success', $course->title . ' has been Created Successfully');
    }

    public function update(CourseRequest $request, Course $course)
    {
        $course->title = $request->input('title');
        $course->summary = $request->input('summary');
        $course->full_summary = $request->input('summernote');
        $course->requirements = $request->input('requirements');
        $course->price = $request->input('price');
        $course->account_id = $request->input('account_id');
        $course->status = $request->input('status');
        $course->start_on = $request->input('start_on');


        if ($request->hasFile('coverPreview')) {

            $destinationPath = base_path('../uploads/courses');

            // delete old file if not default
            if ($course->image != "../uploads/courses/photo1.png") {
                @unlink(base_path($course->image));
            }

            $avatar = hash('sha256', mt_rand()) . '.' . $request->file('coverPreview')->getClientOriginalExtension();
            $request->file('coverPreview')->move($destinationPath, $avatar);

            // Correct Intervention Image V3 usage
            $manager = new ImageManager(new Driver());

            $imagePath = base_path('../uploads/courses/' . $avatar);
            $image = $manager->read($imagePath);

            // example of resize (coverDown = crop+fit)
            $image->coverDown(300, 300); // adjust as needed

            $image->save($imagePath);

            $course->image =  $avatar;
        }


        $course->save();

        return redirect('dashboard/courses/' . $course->id)->with('success', $course->title . ' has been updated Successfully');
    }

    public function store(CourseRequest $request)
    {

        $avatar = 'photo1.png';

        if ($request->hasFile('coverPreview')) {

            $destinationPath = base_path('../uploads/courses');

            // Generate new name
            $avatar = hash('sha256', mt_rand()) . '.' . $request->file('coverPreview')->getClientOriginalExtension();

            // Move original file
            $request->file('coverPreview')->move($destinationPath, $avatar);

            // Resize using Intervention Image V3
            $manager = new ImageManager(new Driver());

            $imagePath = $destinationPath . '/' . $avatar;
            $image = $manager->read($imagePath);

            // Resize (fit) to 300x300 — use whatever size you want
            $image->coverDown(300, 300);

            // Save final avatar
            $image->save($imagePath);
        }

        $course = Course::create([

            'image' => $avatar,
            'title' => $request->title,
            'summary' => $request->summary,
            'requirements' => $request->requirements,
            'price' =>  $request->price,
            'account_id' => $request->account_id,
            'status'     => $request->status,
            'start_on'   => $request->start_on
        ]);

        $course->save();

        return redirect('dashboard/courses/' . $course->id)->with('success', $course->title . ' has been Created Successfully');
    }
}
