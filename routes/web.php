<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Главная
Route::get('/',[SiteController::class, 'index'])->name('index');

// Просмотр врачей
Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors');
Route::get('/doctorview{id}', [DoctorController::class, 'indexview'])->name('doctorview');

// Регистрация
Route::get('/register', function (){
    return view('site.register');})->name('register.create');
Route::post('/register',[UserController::class,'store'])->name('register.store');

// Регистрация
Route::get('/login',[UserController::class,'loginForm'])->name('loginForm');


//Маршрут, который вызывает метод выхода из аккаунта (кнопка «Выход»)
    Route::get('/logout',[UserController::class,'logout'])->name('logout');

//Маршрут, который вызывает метод проверки подлинности (аутентификацию)
Route::post('/login',[UserController::class,'login'])-> name('login');

//Вход в административную панель
Route::middleware(['auth','isadmin'])->group(function () {
    Route::get('/admin',[UserController::class,'admin'])->name('admin');

    // Редактирование и удаление записи таблица doctors
    Route::post('/adminupdatedoctor{id}',[UserController::class,'adminupdatedoctor'])->name('adminupdatedoctor');
    Route::get('/admindeldoctor{id}',[UserController::class,'admindeldoctor'])->name('admindeldoctor');
    
    // Редактирование и удаление записи таблица cabinet
    Route::post('/adminupdatecabinet{id}',[UserController::class,'adminupdatecabinet'])->name('adminupdatecabinet');
    Route::get('/admindelcabinet{id}',[UserController::class,'admindelcabinet'])->name('admindelcabinet');

    // Редактирование и удаление записи таблица specialities
    Route::post('/adminupdatespeciality{id}',[UserController::class,'adminupdatespeciality'])->name('adminupdatespeciality');
    Route::get('/admindelspeciality{id}',[UserController::class,'admindelspeciality'])->name('admindelspeciality');

    // Редактирование и удаление записи таблица appointment Активные талоны
    Route::post('/adminupdateappointmentactive{id}',[UserController::class,'adminupdateappointmentactive'])->name('adminupdateappointmentactive');
    Route::get('/admindelappointmentactive{id}',[UserController::class,'admindelappointmentactive'])->name('admindelappointmentactive');

    // Редактирование и удаление записи таблица appointment Старые талоны
    Route::post('/adminupdateappointment{id}',[UserController::class,'adminupdateappointment'])->name('adminupdateappointment');
    Route::get('/admindelappointment{id}',[UserController::class,'admindelappointment'])->name('admindelappointment');

    // Редактирование и удаление записи таблица schedule расписание
    Route::post('/adminupdateschedule{id}',[UserController::class,'adminupdateschedule'])->name('adminupdateschedule');
    Route::get('/admindelschedule{id}',[UserController::class,'admindelschedule'])->name('admindelschedule');

    // Добавление доктора doctors
    Route::get('/adddoc', function (){return view('site.adddoc');})->name('adddoc.adddoccreate');
    Route::post('/adddocstore',[DoctorController::class,'adddocstore'])->name('adddoc.adddocstore');

    // Добавление кабинета и специальности
    Route::get('/addcabspec', function (){return view('site.addcabspec');})->name('addcabspec.addcabspeccreate');
    Route::post('/addcabstore',[DoctorController::class,'addcabstore'])->name('addcab.addcabstore');
    Route::post('/addspecstore',[DoctorController::class,'addspecstore'])->name('addspec.addspecstore');

    // Добавление расписания и время записи
    Route::get('/addschtt', function (){return view('site.addschtt'); })->name('addschtt.addschttcreate');
    Route::post('/addschstore',[DoctorController::class,'addschstore'])->name('addsch.addschstore');
    Route::post('/addttstore',[DoctorController::class,'addttstore'])->name('addtt.addttstore');
});

//Вход в личный кабинет
Route::middleware(['auth'])->group(function () {
    //Личный кабинет
    Route::get('/profile',[UserController::class,'user'])->name('profile');

    // Редактирования пользователя
    Route::post('/update_profileForm{id}',[UserController::class, 'update_profileForm'])->name('update_profileForm');
    Route::post('/update_profile',[UserController::class,'update_profile'])->name('update_profile');
});

    // Представление Врачей и их расписание
Route::get('/search_form',[DoctorController::class, 'search_form'])->name('search.form');

Route::get('/speciality',[DoctorController::class,'schedule'])->name('speciality'); // 4_2 получить расписание врачей конкретной специальности

//Вход в личный кабинет
Route::middleware('auth')->group(function (){
    //Поиск
    Route::get('/search',[DoctorController::class, 'search'])->name('search');
    //Выбор время записи у врача
    Route::get('/record_form',[AppointmentController::class, 'show'])->name('record.form');

    Route::post('/record', [AppointmentController::class, 'store'])->name('record'); // 7  записаиться на прием к врачу
    // Подтверждение записи
    Route::post('/succes', [AppointmentController::class, 'succes'])->name('succes'); 
    Route::get('/user', [UserController::class, 'show']); // 10 информация о пациенте хз что это


    // Выбор врача с дальнейшой записью после выбора времени
    Route::get('/record/{id}', [AppointmentController::class, 'destroy']);

    Route::get('/doctor/timetable',[DoctorController::class,'timetable'])->name('doctor.timetable'); // 6 расписание конкретного врача в диапазоне date1 - date2  хз что это
    Route::get('/speciality/{speciality}',[DoctorController::class,'schedule']); // 4_2 получить расписание врачей конкретной специальности  хз что это
});




