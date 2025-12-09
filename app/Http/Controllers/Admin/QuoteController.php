<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{

    public function index()
    {
        $quotes = Quote::latest()->paginate(10);
        return view('admin.quotes.index', compact('quotes'));
    }


    public function show(Quote $quote)
    {
        return view('admin.quotes.show', compact('quote'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name'        => 'required|string|max:255',
            'first_name'  => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'phone'       => 'nullable|string|max:255',
            'mesage'      => 'nullable|string',
            'company'     => 'nullable|string|max:255',
            'address'     => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:50',
            'city'        => 'nullable|string|max:255',
            'country'     => 'nullable|string|max:255',
            'cities'      => 'nullable|string|max:255',
        ]);

        Quote::create([
            'status'      => 'pending',
            'name'        => $request->name,
            'first_name'  => $request->first_name,
            'email'       => $request->email,
            'phone'       => $request->phone,
            'mesage'      => $request->mesage,
            'company'     => $request->company,
            'address'     => $request->address,
            'postal_code' => $request->postal_code,
            'city'        => $request->city,
            'country'     => $request->country,
            'cities'      => $request->cities,
        ]);

        return redirect()->back()->with('success', 'Request submitted successfully!');
    }


    public function pending()
    {
        $quotes = Quote::pending()->latest()->paginate(10);
        return view('admin.quotes.index', compact('quotes'))->with('status', 'pending');
    }


    public function approved()
    {
        $quotes = Quote::approved()->latest()->paginate(10);
        return view('admin.quotes.index', compact('quotes'))->with('status', 'approved');
    }


    public function rejected()
    {
        $quotes = Quote::rejected()->latest()->paginate(10);
        return view('admin.quotes.index', compact('quotes'))->with('status', 'rejected');
    }


    public function approve(Quote $quote)
    {
        $quote->approve();
        return redirect()->back()->with('success', 'Quote approved successfully.');
    }


    public function reject(Quote $quote)
    {
        $quote->reject();
        return redirect()->back()->with('success', 'Quote rejected successfully.');
    }
}
