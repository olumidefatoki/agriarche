<?php

namespace App\Http\Controllers;

use App\LogisticsCompany;
use App\State;

use Illuminate\Http\Request;

class LogisticsCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logisticsCompanies = LogisticsCompany::orderBy('created_at', 'desc')->paginate(20);
        return view('logistics_company.index', ['logisticsCompanies' => $logisticsCompanies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return view('logistics_company.create', ['states' => $states]);
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
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'contact_person_name' => 'required|max:255',
            'contact_person_phone_number' => 'required|digits:11|unique:buyer',
            'state_id' => 'required',
        ]);

        LogisticsCompany::create($request->all());
        return redirect(route('logisticsCompany.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $logisticsCompany = $this->getLogisticsById($id);
        $states = State::all();
        return view('logistics_company.edit', [
            'states' => $states,
            'logisticsCompany' => $logisticsCompany
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
        $logisticsCompany = $this->getLogisticsById($id);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'contact_person_name' => 'required|max:255',
            'contact_person_phone_number' => 'required|digits:11',
            'state_id' => 'required',
        ]);
        $logisticsCompany->name = $request->name;
        $logisticsCompany->address = $request->address;
        $logisticsCompany->contact_person_name = $request->contact_person_name;
        $logisticsCompany->contact_person_phone_number = $request->contact_person_phone_number;
        $logisticsCompany->state_id = $request->state_id;
        $logisticsCompany->save();
        return redirect(route('logisticsCompany.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getLogisticsById($id)
    {
        $logisticsCompany = LogisticsCompany::find($id);
        if (!$logisticsCompany)
            abort(404);
            return $logisticsCompany ;
    }
}
