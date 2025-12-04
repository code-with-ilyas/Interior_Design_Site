<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quotes = Quote::latest()->paginate(10);
        return view('admin.quotes.index', compact('quotes'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Quote $quote)
    {
        return view('admin.quotes.show', compact('quote'));
    }

    /**
     * Show pending quotes.
     */
    public function pending()
    {
        $quotes = Quote::pending()->latest()->paginate(10);
        return view('admin.quotes.index', compact('quotes'))->with('status', 'pending');
    }

    /**
     * Show approved quotes.
     */
    public function approved()
    {
        $quotes = Quote::approved()->latest()->paginate(10);
        return view('admin.quotes.index', compact('quotes'))->with('status', 'approved');
    }

    /**
     * Show rejected quotes.
     */
    public function rejected()
    {
        $quotes = Quote::rejected()->latest()->paginate(10);
        return view('admin.quotes.index', compact('quotes'))->with('status', 'rejected');
    }

    /**
     * Approve the specified quote.
     */
    public function approve(Quote $quote)
    {
        $quote->approve();
        return redirect()->back()->with('success', 'Quote approved successfully.');
    }

    /**
     * Reject the specified quote.
     */
    public function reject(Quote $quote)
    {
        $quote->reject();
        return redirect()->back()->with('success', 'Quote rejected successfully.');
    }
}
