<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('portfolio.index', [
            'goodCount' => session('good_count', 0),
            'badCount' => session('bad_count', 0),
        ]);
    }

    public function react(Request $request)
    {
        $reactionType = $request->input('type'); // 'good' or 'bad'
        $count = session()->get("{$reactionType}_count", 0);
        session(["{$reactionType}_count" => $count + 1]);

        return redirect()->route('portfolio.index');
    }
}
