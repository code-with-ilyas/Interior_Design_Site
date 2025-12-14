<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    // Show all customers
    public function index()
    {
        $customers = Customer::latest()->get();
        return view('admin.customers.index', compact('customers'));
    }

    // Show form to create a new customer
    public function create()
    {
        return view('admin.customers.create');
    }

    // Store a new customer
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only('name', 'description');

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('customers', 'public');
        }

        Customer::create($data);

        return redirect()->route('admin.customers.index')->with('success', 'Customer added successfully.');
    }

    // Show form to edit customer
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    // Update customer
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only('name', 'description');

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($customer->logo && Storage::disk('public')->exists($customer->logo)) {
                Storage::disk('public')->delete($customer->logo);
            }

            $data['logo'] = $request->file('logo')->store('customers', 'public');
        }

        $customer->update($data);

        return redirect()->route('admin.customers.index')->with('success', 'Customer updated successfully.');
    }

    // Delete customer
    public function destroy(Customer $customer)
    {
        // Delete logo file if exists
        if ($customer->logo && Storage::disk('public')->exists($customer->logo)) {
            Storage::disk('public')->delete($customer->logo);
        }

        $customer->delete();

        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully.');
    }
}

