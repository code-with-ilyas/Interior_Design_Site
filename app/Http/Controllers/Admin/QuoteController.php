<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    // List all quotes
    public function index()
    {
        $quotes = Quote::latest()->paginate(10);
        return view('admin.quotes.index', compact('quotes'));
    }

    // Show single quote
    public function show(Quote $quote)
    {
        return view('admin.quotes.show', compact('quote'));
    }

    // Store a new quote (needed for your form)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:255',
            'cities' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'mesage' => 'nullable|string',
        ]);

        Quote::create($request->all());

        return redirect()->back()->with('success', 'Your request has been submitted successfully!');
    }

    // Pending quotes
    public function pending()
    {
        $quotes = Quote::pending()->latest()->paginate(10);
        return view('admin.quotes.index', compact('quotes'))->with('status', 'pending');
    }

    // Approved quotes
    public function approved()
    {
        $quotes = Quote::approved()->latest()->paginate(10);
        return view('admin.quotes.index', compact('quotes'))->with('status', 'approved');
    }

    // Rejected quotes
    public function rejected()
    {
        $quotes = Quote::rejected()->latest()->paginate(10);
        return view('admin.quotes.index', compact('quotes'))->with('status', 'rejected');
    }

    // Approve a quote
    public function approve(Quote $quote)
    {
        $quote->approve();
        return redirect()->back()->with('success', 'Quote approved successfully.');
    }

    // Reject a quote
    public function reject(Quote $quote)
    {
        $quote->reject();
        return redirect()->back()->with('success', 'Quote rejected successfully.');
    }
}
