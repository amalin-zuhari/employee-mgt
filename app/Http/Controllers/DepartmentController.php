<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

use Illuminate\Support\Facades\Log;

class DepartmentController extends Controller
{
    // Display list of departments
    public function index()
    {
        // Get all department records from database
        $departments = Department::all();

        // Pass data to view
        return view('departments.index', compact('departments'));
    }

    // Show create form
    public function create()
    {
        // Just return the form view
        return view('departments.create');
    }

    // Store new department into DB
    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'department_id' => 'required|string|max:5|unique:department,department_id',
            'name' => 'required|string|max:100'
        ], [
            'department_id.max' => 'Department ID cannot be more than 5 characters long.',
            'department_id.required' => 'Department ID is required.',
            'department_id.unique' => 'This Department ID already exists.',
            'name.required' => 'Department name is required.',
            'name.max' => 'Department name cannot be more than 100 characters long.'
        ]);

        Log::info('Department created: ' . $request->department_id);

        // Insert data into database
        Department::create([
            'department_id' => $request->department_id,
            'name' => $request->name
        ]);

        // Redirect to list page with success message
        return redirect()->route('departments.index')->with('success', 'Department added successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        // Find department by id
        $department = Department::findOrFail($id);

        return view('departments.edit', compact('department'));
    }

    // Update department
    public function update(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'department_id' => 'required|string|max:5|unique:department,department_id,' . $id . ',department_id',
            'name' => 'required|string|max:100'
        ], [
            'department_id.max' => 'Department ID cannot be more than 5 characters long.',
            'department_id.required' => 'Department ID is required.',
            'department_id.unique' => 'This Department ID already exists.',
            'name.required' => 'Department name is required.',
            'name.max' => 'Department name cannot be more than 100 characters long.'
        ]);

        // Find and update record
        $department = Department::findOrFail($id);
        $department->update([
            'department_id' => $request->department_id,
            'name' => $request->name
        ]);

        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }

    // Delete department
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }
}
