<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\EmployeeTransformer;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function employees(Employee $employee){
        $employee = $employee->all();
        // return response()->json($employees);
        return fractal()
            ->collection($employee)
            ->transformWith(new EmployeeTransformer)
            ->toArray();

    }

    public function profile(Employee $employee){
        $employee = $employee->find(Auth::employee()->id);
        // return response()->json($employees);
        return fractal()
            ->item($employee)
            ->transformWith(new EmployeeTransformer)
            ->includePosts()
            ->toArray();

    }

    public function profileById(Employee $employee, $id){
        $employee = $employee->find($id);
        // return response()->json($employees);
        return fractal()
            ->item($employee)
            ->transformWith(new EmployeeTransformer)
            ->includePosts()
            ->toArray();

    }
}
