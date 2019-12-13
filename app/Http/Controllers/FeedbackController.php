<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('feedback.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'critism' => 'required',
            'suggestion' => 'required',
        ]);

        $userId = ['user_id' => auth()->user()->id];

        Feedback::create(array_merge(
            $validatedData,
            $userId
        ));

        session()->flash('success', 'Terima Kasih Telah Memberi Saran & Kritik nya! 
                                    Kami Akan Terus Meningkatkan App Ini!');

        return back();
    }
}
