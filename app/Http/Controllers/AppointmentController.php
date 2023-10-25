<?php

namespace App\Http\Controllers;

use App\Http\Resources\DoctorTimetableResource;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Timetable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function succes(Request $request)
    {

        $doctor = Doctor::with('speciality','cabinet')
            ->where('id', $request->doctor_id)
            ->get();
        return view('site.succes', ['doctor' => $doctor,'date'=>$request->date,'time'=>$request->time]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'doctor_id' => 'required|exists:doctors,id|exists:timetable,doctor_id',
            'date' => 'required|exists:timetable,date',
            'time' => [
                'required','string',
                `in:08:00,08:30,09:00,09:30,10:00,10:30,11:00,11:30,12:00,12:30,14:00,
                14:30,15:00,15:30,16:00,16:30,17:00,17:30,18:00,18:30','exists:timetable,time`,
            ]
        ]);

        if ($validator->fails())
            return response()->json(['error' => [
                'code' => 422,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ]], 422);

  $timetable = Timetable::where('doctor_id', $request->doctor_id)
            ->where('date', $request->date)
            ->where('time', $request->time)
            ->whereNull('user_id')
            ->first();

        if ($timetable) {
            $appointment = Appointment::create(
                $request->all() +
                [
                    'user_id' => Auth::user()->id,
                    'cabinet_id' => Doctor::with('cabinet')
                        ->find($request->doctor_id)
                        ->cabinet
                        ->id
                ]
            );

            $timetable->update( ["user_id" => Auth::user()->id] );

            return redirect()->route('profile');
//            return response()->json([
//                'data' => [
//                    'number' => Str::of($appointment->id)->padLeft(5,'0')
//                ]
//            ],200);
        }

        return response()->json(['error' => [
            'code' => 422,
            'message' => 'Validation error',
            'errors' => "Vremy nedostupno dly zapisi"
        ]], 422);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $mon = date("Y-m-d", strtotime('mon this week'));
        $tue = date("Y-m-d", strtotime('tue this week'));
        $wed = date("Y-m-d", strtotime('wed this week'));
        $thu = date("Y-m-d", strtotime('thu this week'));
        $fri = date("Y-m-d", strtotime('fri this week'));
        $sat = date("Y-m-d", strtotime('sat this week'));
        $sun = date("Y-m-d", strtotime('sun this week'));
        $days = array($mon, $tue, $wed, $thu, $fri, $sat, $sun);


        $doctor = Doctor::with('speciality')
            ->where('id', $request->doctor_id)
            ->get();

        $raspsMon = Timetable::where('doctor_id', $request->doctor_id)->where('date', $mon)->get();
        $raspsTue = Timetable::where('doctor_id', $request->doctor_id)->where('date', $tue)->get();
        $raspsWed = Timetable::where('doctor_id', $request->doctor_id)->where('date', $wed)->get();
        $raspsThu = Timetable::where('doctor_id', $request->doctor_id)->where('date', $thu)->get();
        $raspsFri = Timetable::where('doctor_id', $request->doctor_id)->where('date', $fri)->get();
        $raspsSat = Timetable::where('doctor_id', $request->doctor_id)->where('date', $sat)->get();
        $raspsSun = Timetable::where('doctor_id', $request->doctor_id)->where('date', $sun)->get();
       $rasps = Timetable::where('doctor_id', $request->doctor_id)->get();
        //return count($rasps);
        // $rasp = DoctorTimetableResource::collection($doctor);
        return view('site.record_form', ['doctor' => $doctor,
            'mon' => $mon, 'raspsMon' => $raspsMon,
            'tue' => $tue, 'raspsTue' => $raspsTue,
            'wed' => $wed, 'raspsWed' => $raspsWed,
            'thu' => $thu, 'raspsThu' => $raspsThu,
            'fri' => $fri, 'raspsFri' => $raspsFri,
            'sat' => $sat, 'raspsSat' => $raspsSat,
            'sun' => $sun, 'raspsSun' => $raspsSun,
            'days' => $days,
            'rasps' => $rasps
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $appointment = Appointment::where('id',$id)->where('user_id',Auth::user()->id)->first();

        if ($appointment) {
            $timetable = Timetable::where('user_id', $appointment->user_id)
                ->where('date', $appointment->date)
                ->where('time', $appointment->time)
                ->update(['user_id' => NULL]);
            $appointment->delete();
            return redirect()->back()->with('success','Запись успешна удалена');
        }

        return response()->json(['error' => [
            'code' => 422,
            'message' => 'Validation error',
            'errors' => "Такого талона не существует"
        ]], 422);
    }
}
