<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class FrontViewController extends Controller
{

    public function home()
    {
        $latestPublications = Publication::latest()->take(4)->get();

        return view('home', compact('latestPublications'));
    }
    // public function home()
    // {
    //     $latest = Publication::latest()->take(4)->get();
    //     $upcomingInstitute = Institute::where('startDate', '>', now())
    //         ->orderBy('startDate', 'asc')
    //         ->first();
    //     return view('home', compact('latest', 'upcomingInstitute'));
    // }

    public function about()
    {
        return view('about');
    }
    public function ourProcess()
    {
        return view('our-process');
    }

    public function news()
    {
        $latest = Publication::latest()->take(2)->get();
        $news = Publication::whereNotIn('id', $latest->pluck('id'))->latest()->paginate(4);
        $firstLatest = $latest->first();
        $secondLatest = $latest->skip(1)->first();
        return view('news', compact('news', 'latest', 'firstLatest', 'secondLatest'));
    }

    public function donate()
    {
        // app('flasher')->addSuccess('Your account has been re-activated.');
        return view('donate');
    }

    public function privacy()
    {
        return view('privacy');
    }

    public function dmca()
    {
        return view('dmca');
    }
    public function terms()
    {
        return view('terms');
    }
    public function help()
    {
        return view('help');
    }


    public function documentation()
    {
        return view('documentation');
    }

    public function contact()
    {
        return view('contact');
    }
    public function institutes()
    {
        return view('institutes.index');
    }



}
