<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Metodo constructor
     * Implementacion de middleware de autenticacion
     */
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        foreach ($employees as $priority) {
            $company = Employee::find($priority->email)->company;
            $priority->company = $company->name; 
        }
        return view('employee.index', [
            'data' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('employee.register',[
            'data' => $companies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email'        => 'required|min:8|max:50',
            'fk_companies' => 'required',
            'firstName'    => 'required|min:10|max:255',
            'lastName'     => 'required|min:10|max:255',
            'phone'        => 'required|min:5|max:30',
        ]);
        $report = new Employee;
        $report->email = $request->get('email');
        $report->fk_companies = $request->get('fk_companies');
        $report->firstName = $request->get('firstName');
        $report->lastName = $request->get('lastName');
        $report->phone = $request->get('phone');
        $report->save();
        return redirect('employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'FUNCION NO HABILITADA';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $companies = Company::all();
        return view('employee.edit', [
            'data' => $employee,
            'companies' => $companies
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'fk_companies' => 'required',
            'firstName'    => 'required|min:10|max:255',
            'lastName'     => 'required|min:10|max:255',
            'phone'        => 'required|min:5|max:30',
        ]);
        $report = Employee::find($id);
        $report->fk_companies = $request->get('fk_companies');
        $report->firstName = $request->get('firstName');
        $report->lastName = $request->get('lastName');
        $report->phone = $request->get('phone');
        $report->save();
        return redirect('employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro = Employee::find($id);
        $registro->delete();
        return redirect('employees');
    }
}
