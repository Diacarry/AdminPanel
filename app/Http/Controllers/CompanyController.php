<?php

namespace App\Http\Controllers;

use App;
use App\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CompanyController extends Controller
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
        $usr = Auth::user();
        App::setLocale($usr->language);
        $data = Company::paginate(10);
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
        $usr = Auth::user();
        App::setLocale($usr->language);
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
            'logo'    => 'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        ]);
        $report = new Company;
        $report->email = $request->get('email');
        $report->name = $request->get('name');
        $report->website = $request->get('website');
        if ($request->has('logo')) {
            $report->logo = Storage::putFile('public', $request->file('logo'));
        } else {
            $report->logo = 'default.png';
        }
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
        $usr = Auth::user();
        App::setLocale($usr->language);
        $company = Company::find($id);
        $employees = Company::find($id)->employees;
        return view('company.employees',[
            'company' => $company,
            'data'    => $employees
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usr = Auth::user();
        App::setLocale($usr->language);
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
            'logo'    => 'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
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
