<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advice;

class AdviceController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'caretype' => 'required|string|max:255',
    ]);

    $advice = Advice::create($request->only('name', 'email', 'caretype'));

    return response()->json([
        'message' => 'Advice submitted successfully.',
        'data' => $advice
    ], 201);
}
}
