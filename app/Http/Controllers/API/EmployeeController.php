<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $employees = Employee::select('id', 'name')->get();
            $response = [
                'meta' => [
                    'status' => 200,
                    'message' => 'Success',
                ],
                'data' => $employees,
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = [
                'meta' => [
                    'status' => 500,
                    'message' => 'Internal Server Error',
                ],
                'data' => null,
            ];
            return response()->json($response, 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'name' => 'required|string',
                'age' => 'required|integer',
                'salary' => 'required|numeric',
                'office' => 'required|string',
            ]);

            // Create a new employee instance
            $employee = new Employee();
            $employee->name = $validatedData['name'];
            $employee->age = $validatedData['age'];
            $employee->salary = $validatedData['salary'];
            $employee->office = $validatedData['office'];

            // Save the employee
            $employee->save();

            $response = [
                'meta' => [
                    'status' => 201,
                    'message' => 'Employee created successfully',
                ],
                'data' => $employee,
            ];

            return response()->json($response, 201);
        } catch (\Exception $e) {
            $response = [
                'meta' => [
                    'status' => 500,
                    'message' => 'Internal Server Error',
                ],
                'data' => null,
            ];

            return response()->json($response, 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        try {
            $employee = Employee::findOrFail($id);

            $response = [
                'meta' => [
                    'status' => 200,
                    'message' => 'Success',
                ],
                'data' => $employee,
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = [
                'meta' => [
                    'status' => 500,
                    'message' => 'Internal Server Error',
                ],
                'data' => null,
            ];

            return response()->json($response, 500);
        }
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
