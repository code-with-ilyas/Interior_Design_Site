<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only('name', 'description');

        // Handle multiple logo uploads
        $logoUrls = [];
        if ($request->hasFile('logo_images')) {
            foreach ($request->file('logo_images') as $logo) {
                $logoUrls[] = $logo->store('customers', 'public');
            }
        }

        // Store as JSON array (empty array if no logos)
        $data['logo'] = json_encode($logoUrls);

        Customer::create($data);

        return redirect()->route('admin.customers.index')->with('success', 'Customer added successfully.');
    }

    // Show customer details
    public function show(Customer $customer)
    {
        return view('admin.customers.show', compact('customer'));
    }

    // Show form to edit customer
    public function edit(Customer $customer)
    {
        // Decode logos for the edit form
        $customerLogos = json_decode($customer->logo, true) ?: [];
        return view('admin.customers.edit', compact('customer', 'customerLogos'));
    }

    // Update customer
    public function update(Request $request, Customer $customer)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only('name', 'description');

        // Get existing logos
        $existingLogos = json_decode($customer->logo, true) ?: [];

        // Handle logo uploads
        if ($request->hasFile('logo_images')) {
            foreach ($request->file('logo_images') as $logo) {
                $existingLogos[] = $logo->store('customers', 'public');
            }
        }

        // Remove logos that were marked for deletion
        if ($request->has('remove_logos')) {
            $logosToRemove = $request->input('remove_logos', []);
            $existingLogos = array_values(array_filter($existingLogos, function($logo, $index) use ($logosToRemove) {
                return !in_array($index, $logosToRemove);
            }, ARRAY_FILTER_USE_BOTH));
        }

        // Store as JSON array (always store an array, even if empty)
        $data['logo'] = json_encode($existingLogos);

        $customer->update($data);

        return redirect()->route('admin.customers.index')->with('success', 'Customer updated successfully.');
    }

    // Delete customer
    public function destroy(Customer $customer)
    {
        // Delete logo files if they exist
        $logos = json_decode($customer->logo, true);
        if ($logos && is_array($logos)) {
            foreach ($logos as $logoPath) {
                if ($logoPath && Storage::disk('public')->exists($logoPath)) {
                    Storage::disk('public')->delete($logoPath);
                }
            }
        }

        $customer->delete();

        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully.');
    }
}
