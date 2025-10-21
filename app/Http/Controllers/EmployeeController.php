<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display all employees
     */
    public function index()
    {
        // Load all employees with their related department info
        $employees = Employee::with('department')->get();

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form to create a new employee
     */
    public function create()
    {
        // Get all departments for dropdown selection
        $departments = Department::all();

        return view('employees.create', compact('departments'));
    }

    /**
     * Store a new employee
     */
    public function store(Request $request)
    {
        // Validate user input
        $request->validate([
            'name' => 'required|string|max:100',
            'ic_no' => 'required|string|max:20',
            'email' => 'required|email',
            'phone_no' => 'required|string|max:15',
            'dept_id' => 'required|exists:department,department_id',
        ]);

        // Insert new record
        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee added successfully.');
    }

    /**
     * Display a specific employee (optional)
     */
    public function show($id)
    {
        $employee = Employee::with('department')->findOrFail($id);

        return view('employees.show', compact('employee'));
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();

        return view('employees.edit', compact('employee', 'departments'));
    }

    /**
     * Update existing employee
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'ic_no' => 'required|string|max:20',
            'email' => 'required|email',
            'phone_no' => 'required|string|max:15',
            'dept_id' => 'required|exists:department,department_id',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    /**
     * Delete employee
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
