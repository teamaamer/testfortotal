<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function load(Course $course)
    {
        $comments = $course->comments()
            ->with('account')
            ->latest()
            ->paginate(3);

        return response()->json([
            'html' => view('dashboard.courses.render.course_comment_render', compact('comments'))->render(),
            'next' => $comments->nextPageUrl()
        ]);
    }

    public function publicload(Course $course)
    {
        $comments = $course->comments()
            ->with('account')
            ->latest()
            ->paginate(5);

        return response()->json([
            'html' => view('course_comment_render', compact('comments'))->render(),
            'next' => $comments->nextPageUrl()
        ]);
    }

    public function store(Request $request, Course $course)
    {

        $request->validate([
            'comment' => 'required|string|max:1000',
            'render'  => 'required|string'
        ]);

        $comment = $course->comments()->create([
            'comment' => $request->comment,
            'account_id' => auth()->user()->account->id
        ]);

        $comment->load('account');

        $comments = [$comment];

        $view = match ($request->render) {
            'dashboard' => 'dashboard.courses.render.course_comment_render',
            'public'    => 'course_comment_render',
            default     => abort(400, 'Invalid render type'),
        };

        return response()->json([
            'html' => view($view, ['comments' => [$comment]])->render(),
        ]);
    }
}
