<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Company::all();
        return view('company.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.register');
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
            'email'   => 'required|min:8|max:50',
            'name'    => 'required|min:10|max:255',
            'website' => 'required|min:5|max:30',
            /*'file'     => 'requiere',*/
        ]);
        $report = new Company;
        $report->email = $request->get('email');
        $report->name = $request->get('name');
        $report->website = $request->get('website');
        $report->logo = 'default,jpg';
        $report->save();
        return redirect('companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'Funcion NO habilitada';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('company.edit', [
            'data' => $company
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
            'name'    => 'required|min:10|max:255',
            'website' => 'required|min:5|max:30',
            /*'file'     => 'requiere',*/
        ]);
        $report = Company::find($id);
        $report->name = $request->get('name');
        $report->website = $request->get('website');
        $report->logo = 'EditDefault,jpg';
        $report->save();
        return redirect('companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro = Company::find($id);
        $registro->delete();
        return redirect('companies');
    }
}
