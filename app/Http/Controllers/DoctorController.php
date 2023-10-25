<?php

namespace App\Http\Controllers;

use App\Http\Resources\DoctorScheduleResource;
use App\Models\Doctor;
use App\Models\Cabinet;
use App\Models\Schedule;
use App\Models\Timetable;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{

    public function search_form()
    {
        $doctors = Doctor::with('speciality')->get();
        $specialities=Speciality::all();

        return view('site.search',['doctors'=>$doctors,'specialities'=>$specialities]);
    }

    public function search(Request $request)
    {
        $query = $request->get('last_name');
        $doctors=Doctor::with('speciality')
            ->where('last_name','LIKE',"%$query%")
            ->get();

        $doctors = DoctorScheduleResource::collection($doctors);
        $specialities=Speciality::all();

        return view('site.search',['doctors'=>$doctors,'specialities'=>$specialities]);
    }

    public function schedule(Request $request)
    {
        $doctors=Doctor::where('speciality_id',$request->speciality_id)->get();
        $specialities=Speciality::all();

        return view('site.search',['doctors'=>$doctors,'specialities'=>$specialities]);
    }
    public function timetable(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => "required|exists:timetable,doctor_id",
            'date1' => 'required|date',
            'date2' => 'required|date'
        ]);

        if ($validator->fails())
            return response()->json(['error' => [
                'code' => 422,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ]], 422);

        return $doctor=Doctor::where('id',$request->id)->get();
        return DoctorTimetableResource::collection($doctor);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $doctors=Doctor::with('speciality','cabinet')->get();

        return view('site.doctors',['doctors'=>$doctors]);
    }

    public function indexview($id)
    {

        $doctors = Doctor::find($id);

        $specialities=Speciality::all();

        return view('site.doctorview',['doctors'=>$doctors, 'specialities'=>$specialities] );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function adddocstore(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'patronymic' => 'required',
            'speciality_id' => 'required',
            'cabinet_id' => 'required',
            'photo' => 'required',
            'licenz' => 'required'
        ]);

        Doctor::create($request->all());
        return redirect()->route('admin')->with('success', 'Доктор успешно добавлен');
    }

    public function addcabstore(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'floor' => 'required'
        ]);

        Cabinet::create($request->all());
        return redirect()->route('admin')->with('success', 'Кабинет успешно добавлен');
    }

    public function addspecstore(Request $request)
    {
        $request->validate(['name' => 'required']);
        Speciality::create($request->all());
        return redirect()->route('admin')->with('success', 'Специальность успешно добавлена');
    }

    public function addschstore(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required',
            'mon' => 'required',
            'tue' => 'required',
            'wed' => 'required',
            'thu' => 'required',
            'fri' => 'required',
            'sat' => 'required',
            'sun' => 'required'
        ]);

        Schedule::create($request->all());

        return redirect()->route('admin')->with('success', 'Расписание врача успешно добавлена');
    }

    public function addttstore(Request $request)
    {
        
        $request->validate([
            'doctor_id' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        Timetable::create($request->all());

        return redirect()->route('admin')->with('success', 'Время записи успешно добавлена');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }


}
