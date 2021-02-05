<?php

namespace App\Http\Controllers;

use App\LogisticsCompany;
use App\State;
use App\Http\Requests\{CreateLogisiticsCompanyRequest, UpdateLogisiticsCompanyRequest};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Log;

class LogisticsCompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
    public function store(CreateLogisiticsCompanyRequest $request)
    {

        try {
            LogisticsCompany::create(array(
                'name' => $request->name, 'address' => $request->address,
                'contact_person_name' => $request->contact_person_name,
                'contact_person_phone_number' => $request->contact_person_phone_number,
                'state_id' => $request->state,
                'created_by' => Auth::id(),
                'updated_by' => Auth::id()
            ));
            return redirect(route('logisticsCompany.index'));
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return redirect()->back()->withInput()->withErrors('An error Occured.Try Again');
        }
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
    public function update(UpdateLogisiticsCompanyRequest $request, $id)
    {

        try {
            $logisticsCompany = $this->getLogisticsById($id);
            LogisticsCompany::updateOrCreate(
                array('id' => $logisticsCompany->id),
                array(
                    'name' => $request->name, 'address' => $request->address,
                    'contact_person_name' => $request->contact_person_name,
                    'contact_person_phone_number' => $request->contact_person_phone_number,
                    'state_id' => $request->state, 'updated_by' => Auth::id(), 'created_by' => $logisticsCompany->created_by,
                )
            );
            return redirect(route('logisticsCompany.index'));
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return redirect()->back()->withInput()->withErrors('An error Occured.Try Again');
        }
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
        return $logisticsCompany;
    }
}
