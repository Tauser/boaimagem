<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use App\Models\CustomerCategory;
use App\Models\Service;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::query()->paginate(9);
        $categories = ProjectCategory::all();
        return view('projects.index', compact('categories', 'projects'));
    }

    public function byCategory(Service $service)
    {
        $customers = Customer::where('service_id', $service->id)->get()->paginate(9);
        $services = Service::all();
        return view('cliente.index', compact('customers', 'services'));
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
    public function show($slug, Project $project)
    {
        $categories = ProjectCategory::all();
        return view('projects.view', compact('project'));
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
