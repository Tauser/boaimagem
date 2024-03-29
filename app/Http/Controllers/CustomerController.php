<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use App\Models\CustomerCategory;
use App\Models\Service;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::query()->paginate(9);
        $categories = ProjectCategory::all();
        return view('cliente.index', compact('customers','categories'));
    }

    public function byCategory(ProjectCategory $category)
    {
        $customers = Customer::whereHas('projects', function ($query) use ($category) {
            $query->where('project_category_id', $category->id);
        })->get();

        $categories = ProjectCategory::all();
        return view('cliente.index', compact('customers', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $projects = Project::where('customer_id', $customer->id)->get();
        return view('cliente.view', compact('customer', 'projects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
