<?php

namespace App\Http\Controllers;


use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Cabinet;
use App\Models\Schedule;
use App\Models\Speciality;
use App\Models\Timetable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'bithday' => 'required',
            'pol' => 'required',
            'police' => 'required|unique:users',
            'phone' => 'required|unique:users|min:11|max:12',
            'adres' => 'required',
            'password' => 'required'
        ]);

        User::create(['password' => Hash::make($request->password)] + $request->all());

        return redirect()->route('login')->with('success', 'Пользователь успешно добавлен');
    }

    public function loginForm()
    {
        return view('site.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($request->only(['phone', 'password']))) {

            $user = Auth::user();
            if ($user->role == 'admin')
                return redirect('/admin')->with('success', 'Вы вошли в Админ панель');
            if ($user->role == 'user')
                return redirect('/profile')->with('success', 'Вы успешно вошли в аккаунт');
        }
        return back()->withErrors([
            'phone' => 'Телефон или Пароль введены неправильно!'
        ]);
    }

    public function user()
    {
         $appointments=Appointment::with('doctor')->where('user_id',Auth::user()->id)->where('date','>=',date("Y-m-d"))->get();
         $appointmentslast=Appointment::with('doctor')->where('user_id',Auth::user()->id)->where('date','<',date("Y-m-d"))->get();

        return view('site.profile',['appointments'=>$appointments,'appointmentslast'=>$appointmentslast]);
    }

    public function update_profileForm($id)
    {
        $users = User::find($id);

        return view('site.update_profile',['users'=>$users]);
    }

    public function update_profile(Request $request) 
    {
        $users = User::find($request->input('id'));

        $users->name = $request->input('name');
        $users->surname = $request->input('surname');
        $users->bithday = $request->input('bithday');
        $users->pol = $request->input('pol');
        $users->police = $request->input('police');
        $users->phone = $request->input('phone');
        $users->adres = $request->input('adres');
        $users->password = Hash::make($request->input('password'));
        
        $users->save();

        return redirect()->route('profile')->with('success', 'Пользователь успешно изменен');
    }

    public function adminupdatedoctor(Request $request,$id) 
    {
        $adminupdatedoctor = Doctor::find($id);

        $adminupdatedoctor->first_name = $request->input('first_name');
        $adminupdatedoctor->last_name = $request->input('last_name');
        $adminupdatedoctor->patronymic = $request->input('patronymic');
        $adminupdatedoctor->speciality_id = $request->input('speciality_id');
        $adminupdatedoctor->cabinet_id = $request->input('cabinet_id');
        $adminupdatedoctor->photo = $request->input('photo');
        $adminupdatedoctor->licenz = $request->input('licenz');
        
        $adminupdatedoctor->save();

        return redirect()->route('admin')->with('success', 'Таблица doctors изменена');
    }

    public function admindeldoctor($id) 
    {
        $admindeldoctor = Doctor::where('id','LIKE',$id)->delete();

        return redirect()->back()->with('success','Запись успешна удалена');
    }

    public function adminupdatecabinet(Request $request,$id) 
    {
        $adminupdatecabinet = Cabinet::find($id);

        $adminupdatecabinet->id = $request->input('cabinetid');
        $adminupdatecabinet->floor = $request->input('floor');

        $adminupdatecabinet->save();

        return redirect()->route('admin')->with('success', 'Таблица cabinets изменена');
    }

    public function admindelcabinet($id) 
    {
        $admindelcabinet = Cabinet::where('id','LIKE',$id)->delete();
        
        return redirect()->back()->with('success','Запись успешна удалена');
    }

    public function adminupdatespeciality(Request $request,$id) 
    {
        $adminupdatespeciality = Speciality::find($id);

        $adminupdatespeciality->name = $request->input('specname');

        $adminupdatespeciality->save();

        return redirect()->route('admin')->with('success', 'Таблица specialities изменена');
    }

    public function admindelspeciality($id) 
    {
        $admindelspeciality = Speciality::where('id','LIKE',$id)->delete();
        
        return redirect()->back()->with('success','Запись успешна удалена');
    }

    public function adminupdateappointmentactive(Request $request,$id) 
    {
        $adminupdateappointmentactive = Appointment::find($id);

        $adminupdateappointmentactive->doctor_id = $request->input('doctoridactive');
        $adminupdateappointmentactive->user_id = $request->input('useridactive');
        $adminupdateappointmentactive->cabinet_id = $request->input('cabinetidactive');
        $adminupdateappointmentactive->date = $request->input('dateapp');
        $adminupdateappointmentactive->time = $request->input('timeapp');
        
        $adminupdateappointmentactive->save();

        return redirect()->route('admin')->with('success', 'Таблица appointment изменена');
    }

    public function admindelappointmentactive($id) 
    {
        $admindelappointmentactive = Appointment::where('id','LIKE',$id)->delete();

        return redirect()->back()->with('success','Запись успешна удалена');
    }

    public function adminupdateappointment(Request $request,$id) 
    {
        $adminupdateappointment = Appointment::find($id);

        $adminupdateappointment->doctor_id = $request->input('doctoridpas');
        $adminupdateappointment->user_id = $request->input('useridpas');
        $adminupdateappointment->cabinet_id = $request->input('cabinetidpas');
        $adminupdateappointment->date = $request->input('datepas');
        $adminupdateappointment->time = $request->input('timepas');
        
        $adminupdateappointment->save();

        return redirect()->route('admin')->with('success', 'Таблица appointment изменена');
    }

    public function admindelappointment($id)
    {
        $admindelappointment = Appointment::where('id','LIKE',$id)->delete();

        return redirect()->back()->with('success','Запись успешна удалена');
    }

    public function adminupdateschedule(Request $request,$id) 
    {
        $adminupdateschedule = Schedule::find($id);

        $adminupdateschedule->doctor_id = $request->input('doctoridschedule');
        $adminupdateschedule->mon = $request->input('mon');
        $adminupdateschedule->tue = $request->input('tue');
        $adminupdateschedule->wed = $request->input('wed');
        $adminupdateschedule->thu = $request->input('thu');
        $adminupdateschedule->fri = $request->input('fri');
        $adminupdateschedule->sat = $request->input('sat');
        $adminupdateschedule->sun = $request->input('sun');
        
        $adminupdateschedule->save();

        return redirect()->route('admin')->with('success', 'Таблица schedule изменена');
    }

    public function admindelschedule($id) 
    {
        $admindelschedule = Doctor::where('id','LIKE',$id)->delete();

        return redirect()->back()->with('success','Запись успешна удалена');
    }

    public function admin()
    {
        $specialities=Speciality::all();
        $doctors=Doctor::all();
        $schedules=Schedule::all();
        $cabinets=Cabinet::all();
        $timetables=Timetable::all();
        $appointments=Appointment::where('date','>=',date("Y-m-d"))->get();
        $appointmentslast=Appointment::where('date','<',date("Y-m-d"))->get();

        return view('site.admin',['specialities'=>$specialities,'doctors'=>$doctors,'schedules'=>$schedules,'cabinets'=>$cabinets,'timetables'=>$timetables,'appointments'=>$appointments, 'appointmentslast' => $appointmentslast]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

public function show()
    {
     return $user = Auth::user();
    }
}

