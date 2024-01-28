<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Institute;
use App\Models\Transaction;
use Illuminate\Support\Carbon;

class AdminDashboard extends Component
{
    public function pastInstitutes()
    {
        $institutes = Institute::all();
        $totalInstitutes = count($institutes);
        $now = Carbon::now();
        $endOfYear = Carbon::now()->endOfYear();
        $startOfYear = Carbon::now()->startOfYear();

        $pastInstitutes  = $institutes->filter(function ($institute) use ($now, $endOfYear, $startOfYear) {
            $endDate = Carbon::create($institute->endDate);
            return $endDate->greaterThanOrEqualTo($startOfYear) && $endDate->lessThanOrEqualTo(now());
        });

        return $pastInstitutes->count();
    }
    // public function nextInstitute()
    // {
    //     $upcomingInstitute = Institute::where('startDate', '>', now())
    //         ->orderBy('startDate', 'asc')
    //         ->first();
    //     return $upcomingInstitute;
    // }

    public function InstitutePercentage()
    {
        $institutes = Institute::all();
        $totalInstitutes = count($institutes);
        $now = Carbon::now();
        $endOfYear = Carbon::now()->endOfYear();

        $remainingInstitutes = $institutes->filter(function ($institute) use ($now, $endOfYear) {
            $startDate = Carbon::create($institute->startDate);
            return $startDate->greaterThanOrEqualTo($now) && $startDate->lessThanOrEqualTo($endOfYear);
        });

        return $remainingPercentage = round(($remainingInstitutes->count() / $totalInstitutes) * 100, 2);
    }

    public function totalsForMonth()
    {
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $totalTransactions = Transaction::whereMonth('created_at', $month)->whereYear('created_at', $year)->count();
        return $totalTransactions;
    }

    public function totalAmountForMonth()
    {
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $totalAmount = Transaction::whereMonth('created_at', $month)->whereYear('created_at', $year)->sum('amount');
        return $totalAmount;
    }
    public function render()
    {
        // $nextInstitute = $this->nextInstitute();
        // $upcomingInstitute = Institute::where('startDate', '>', now())
        // ->orWhere('acronym','fdi')
        //     ->first();

        // $instituteParticipants = $upcomingInstitute->participants()->take(4)->get();
            //    dd($instituteParticipants);
        $totalUsers = User::count();
        $institutes = Institute::all();
        // $nextInstituteTable = Transaction::whereInstituteId($nextInstitute->id)->get();
        return view('livewire.admin-dashboard', compact('totalUsers', 'institutes'));
    }
}
