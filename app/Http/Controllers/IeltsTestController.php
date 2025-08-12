<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;

class IeltsTestController extends Controller
{
    public function showTest()
    {
        $sections = Section::with('questionGroups.questions.options')
            ->orderBy('order_no')
            ->get();

        return view('welcome', compact('sections'));
    }

    // Handle test form submission
    // public function submitTest(Request $request)
    // {
    //     $answers = $request->input('answers', []);

    //     // For demo, just return submitted answers
    //     // In production, save answers and evaluate
    //     return response()->json([
    //         'message' => 'Test submitted successfully!',
    //         'answers' => $answers,
    //     ]);
    // }
}
