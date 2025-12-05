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
