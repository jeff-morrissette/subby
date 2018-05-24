<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register/confirm', 'Auth\RegisterConfirmationController@edit');
Route::patch('/register/confirm/{user}', 'Auth\RegisterConfirmationController@update')
    ->name('update_password');

Auth::routes();

//Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/permission/create', 'PermissionController@create')
    ->name('create_permission')
    ->middleware('can:create_permission');
Route::post('/permission/create', 'PermissionController@store')
    ->name('update_permission')
    ->middleware('can:update_permission');

Route::get('/dashboard/super_administrator', 'SuperAdminController@index')
    ->name('super_administrator')
    ->middleware('can:view-super_administrator-dashboard');
Route::get('/dashboard/school_division_administrator', 'SchoolDivisionAdministratorController@index')
    ->name('school_division_administrator')
    ->middleware('can:view-school_division_administrator-dashboard');
Route::get('/dashboard/school_principal', 'PrincipalController@index')
    ->name('school_principal')
    ->middleware('can:view-school_principal-dashboard');
Route::get('/dashboard/school_administrator', 'SchoolAdministratorController@index')
    ->name('school_administrator')
    ->middleware('can:view-school_administrator-dashboard');
Route::get('/dashboard/school_teacher', 'SchoolTeacherController@index')
    ->name('school_teacher')
    ->middleware('can:view-school_teacher-dashboard');
Route::get('/dashboard/substitute_teacher', 'SubstituteTeacherController@index')
    ->name('substitute_teacher')
    ->middleware('can:view-substitute_teacher-dashboard');

//Super Administrator
Route::prefix('dashboard/super_administrator')->group(function () {
    // ---------------- School Division -------------------------
    Route::get('school_divisions', 'SchoolDivisionController@index')
        ->name('view_school_divisions-super_administrator')
        ->middleware('can:create_school_division');
    Route::get('school_divisions/create', 'SchoolDivisionController@create')
        ->name ('create_school_division-super_administrator')
        ->middleware('can:create_school_division');
    Route::post('school_divisions/create', 'SchoolDivisionController@store')
        ->name('create_school_division-super_administrator')
        ->middleware('can:create_school_division');
    Route::get('school_divisions/edit/{schooldivision}', 'SchoolDivisionController@edit')
        ->name('edit_school_division-super_administrator')
        ->middleware('can:update_school_division');
    Route::patch('school_divisions/edit/{schooldivision}', 'SchoolDivisionController@update')
        ->name('update_school_division-super_administrator')
        ->middleware('can:update_school_division');
    // ---------------- School Division Administrators -------------------------
    Route::get('school_division_administrators', 'SchoolDivisionAdministratorController@index')
        ->name('view_school_division_administrator-super_administrator')
        ->middleware('can:create_school_division_administrator');
    Route::get('school_division_administrators/create', 'SchoolDivisionAdministratorController@create')
        ->name('create_school_division_admin-super_administrator')
        ->middleware('can:create_school_division_administrator');
    Route::post('school_division_administrators/create', 'SchoolDivisionAdministratorController@store')
        ->name('create_school_division_administrator-super_administrator')
        ->middleware('can:create_school_division_administrator');
    Route::get('school_division_administrators/edit/{administrator}', 'SchoolDivisionAdministratorController@edit')
        ->name('edit_school_division_administrator-super_administrator')
        ->middleware('can:update_school_division_administrator');
    Route::patch('school_division_administrators/edit/{administrator}', 'SchoolDivisionAdministratorController@update')
        ->name('update_school_division_administrator-super_administrator')
        ->middleware('can:update_school_division_administrator');
    // ---------------- Schools -----------------------------------
    Route::get('schools', 'SchoolController@index')
        ->name('view_schools-super_administrator')
        ->middleware('can:create_school');
    Route::get('schools/create', 'SchoolController@create')
        ->name('create_school-super_administrator')
        ->middleware('can:create_school');
    Route::post('schools/create', 'SchoolController@store')
        ->name('create_school-super_administrator')
        ->middleware('can:create_school');
    Route::get('schools/edit/{school}', 'SchoolController@edit')
        ->name('edit_school-super_administrator')
        ->middleware('can:update_school');
    Route::patch('schools/edit/{administrator}', 'SchoolController@update')
        ->name('update_school-super_administrator')
        ->middleware('can:update_school');
    // ---------------- School Administrators ----------------------------
    Route::get('school_administrators', 'SchoolAdministratorController@index')
        ->name('view_school_administrators-super_administrator')
        ->middleware('can:create_school_administrator');
    Route::get('school_administrators/create', 'SchoolAdministratorController@create')
        ->name('create_school_administrators-super_administrator')
        ->middleware('can:create_school_administrator');
    Route::post('school_administrators/create', 'SchoolAdministratorController@store')
        ->name('create_school_administrators-super_administrator')
        ->middleware('can:create_school_administrator');
    Route::get('school_administrators/edit/{administrator}', 'SchoolAdministratorController@edit')
        ->name('edit_school_administrator-super_administrator')
        ->middleware('can:update_school_administrator');
    Route::patch('school_administrators/edit/{administrator}', 'SchoolAdministratorController@update')
        ->name('update_school_administrator-super_administrator')
        ->middleware('can:update_school_administrator');
    // ---------------- Principals ----------------------------
    Route::get('principals', 'PrincipalController@index')
        ->name('view_principals-super_administrator')
        ->middleware('can:create_principal');
    Route::get('principals/create', 'PrincipalController@create')
        ->name('create_principals-super_administrator')
        ->middleware('can:create_principal');
    Route::post('principals/create', 'PrincipalController@store')
        ->name('create_principals-super_administrator')
        ->middleware('can:create_principal');
    Route::get('principals/edit/{principal}', 'PrincipalController@edit')
        ->name('edit_principals-super_administrator')
        ->middleware('can:update_principal');
    Route::patch('principals/edit/{principal}', 'PrincipalController@update')
        ->name('update_principals-super_administrator')
        ->middleware('can:update_principal');
    // ---------------- Teachers ----------------------------
    Route::get('teachers', 'SchoolTeacherController@index')
        ->name('view_teachers-super_administrator')
        ->middleware('can:create_school_teacher');
    Route::get('teachers/create', 'SchoolTeacherController@create')
        ->name('create_teachers-super_administrator')
        ->middleware('can:create_school_teacher');
    Route::post('teachers/create', 'SchoolTeacherController@store')
        ->name('create_teachers-super_administrator')
        ->middleware('can:create_school_teacher');
    Route::get('teachers/edit/{teacher}', 'SchoolTeacherController@edit')
        ->name('edit_teachers-super_administrator')
        ->middleware('can:update_school_teacher');
    Route::patch('teachers/edit/{teacher}', 'SchoolTeacherController@update')
        ->name('update_teachers-super_administrator')
        ->middleware('can:update_school_teacher');
    // ---------------- Substitute Teachers ----------------------------
    Route::get('substitute_teachers', 'SubstituteTeacherController@index')
        ->name('view_substitute_teachers-super_administrator')
        ->middleware('can:create_substitute_teacher');
    Route::get('substitute_teachers/create', 'SubstituteTeacherController@create')
        ->name('create_substitute_teachers-super_administrator')
        ->middleware('can:create_substitute_teacher');
    Route::post('substitute_teachers/create', 'SubstituteTeacherController@store')
        ->name('create_substitute_teachers-super_administrator')
        ->middleware('can:create_substitute_teacher');
    Route::get('substitute_teachers/edit/{substitute}', 'SubstituteTeacherController@edit')
        ->name('edit_substitute_teacher-super_administrator')
        ->middleware('can:update_substitute_teacher');
    Route::patch('substitute_teachers/edit/{substitute}', 'SubstituteTeacherController@update')
        ->name('update_substitute_teacher-super_administrator')
        ->middleware('can:update_substitute_teacher');
    // ---------------- Register Employee ----------------------------
    Route::get('register/{user}', 'Auth\RegisterConfirmationController@show')
        ->name('show_register_user-super_administrator')
        ->middleware('can:view-super_administrator-dashboard');
});

// School Division Administrators =================================================================
Route::prefix('dashboard/school_division_administrator')->group(function () {
    // ---------------- Schools ----------------------------
    Route::get('schools', 'SchoolController@index')
        ->name('view-schools-school_division_administrator')
        ->middleware('can:update_school_division_administrator');
    Route::get('schools/create', 'SchoolController@create')
        ->name('create_school-school_division_administrator')
        ->middleware('can:create_school');
    Route::post('schools/create', 'SchoolController@store')
        ->name('create_school-school_division_administrator')
        ->middleware('can:create_school');
    Route::get('schools/edit/{school}', 'SchoolController@edit')
        ->name('edit_school-school_division_administrator')
        ->middleware('can:update_school');
    Route::patch('schools/edit/{school}', 'SchoolController@update')
        ->name('update_school-school_division_administrator')
        ->middleware('can:update_school');
    // ---------------- School Administrators ----------------------------
    Route::get('school_administrators', 'SchoolAdministratorController@index')
        ->name('view_school_administrators-school_division_administrator')
        ->middleware('can:create_school_administrator');
    Route::get('school_administrators/create', 'SchoolAdministratorController@create')
        ->name('create_school_administrators-school_division_administrator')
        ->middleware('can:create_school_administrator');
    Route::post('school_administrators/create', 'SchoolAdministratorController@store')
        ->name('create_school_administrators-school_division_administrator')
        ->middleware('can:create_school_administrator');
    Route::get('school_administrators/edit/{administrator}', 'SchoolAdministratorController@edit')
        ->name('edit_school_administrator-school_division_administrator')
        ->middleware('can:update_school_administrator');
    Route::patch('school_administrators/edit/{administrator}', 'SchoolAdministratorController@update')
        ->name('update_school_administrator-school_division_administrator')
        ->middleware('can:update_school_administrator');
    // ---------------- Principals ----------------------------
    Route::get('principals', 'PrincipalController@index')
        ->name('view_principals-school_division_administrator')
        ->middleware('can:create_principal');
    Route::get('principals/create', 'PrincipalController@create')
        ->name('create_principals-school_division_administrator')
        ->middleware('can:create_principal');
    Route::post('principals/create', 'PrincipalController@store')
        ->name('create_principals-school_division_administrator')
        ->middleware('can:create_principal');
    Route::get('principals/edit/{principal}', 'PrincipalController@edit')
        ->name('edit_principals-school_division_administrator')
        ->middleware('can:update_principal');
    Route::patch('principals/edit/{principal}', 'PrincipalController@update')
        ->name('update_principals-school_division_administrator')
        ->middleware('can:update_principal');
    // ---------------- Teachers ----------------------------
    Route::get('teachers', 'SchoolTeacherController@index')
        ->name('view_teachers-school_division_administrator')
        ->middleware('can:update_school_teacher');
    Route::get('teachers/create', 'SchoolTeacherController@create')
        ->name('create_teachers-school_division_administrator')
        ->middleware('can:update_school_teacher');
    Route::post('teachers/create', 'SchoolTeacherController@store')
        ->name('create_teachers-school_division_administrator')
        ->middleware('can:update_school_teacher');
    Route::get('teacher/edit/{schoolteacher}', 'SchoolTeacherController@edit')
        ->name('edit_teacher-school_division_administrator')
        ->middleware('can:update_school_teacher');
    Route::patch('teacher/edit/{schoolteacher}', 'SchoolTeacherController@update')
        ->name('update_teacher-school_division_administrator')
        ->middleware('can:update_school_teacher');
    // ---------------- Substitute Teachers ----------------------------
    Route::get('substitute_teachers', 'SubstituteTeacherController@index')
        ->name('view_substitute_teachers-school_division_administrator')
        ->middleware('can:create_substitute_teacher');
    Route::get('substitute_teachers/create', 'SubstituteTeacherController@create')
        ->name('create_substitute_teachers-school_division_administrator')
        ->middleware('can:create_substitute_teacher');
    Route::post('substitute_teachers/create', 'SubstituteTeacherController@store')
        ->name('create_substitute_teachers-school_division_administrator')
        ->middleware('can:create_substitute_teacher');
    Route::get('substitute_teachers/edit/{substitute}', 'SubstituteTeacherController@edit')
        ->name('edit_substitute_teacher-school_division_administrator')
        ->middleware('can:update_substitute_teacher');
    Route::patch('substitute_teachers/edit/{substitute}', 'SubstituteTeacherController@update')
        ->name('update_substitute_teacher-school_division_administrator')
        ->middleware('can:update_substitute_teacher');
    // ---------------- Register Employee ----------------------------
    Route::get('register/{user}', 'Auth\RegisterConfirmationController@show')
        ->name('show_register_user-school_division_administrator')
        ->middleware('can:view-school_division_administrator-dashboard');
});

// School Administrators ===============================================================
Route::prefix('dashboard/school_administrator')->group(function () {
    // ---------------- Teachers ----------------------------
    Route::get('teachers', 'SchoolTeacherController@index')
        ->name('view_school_teachers-school_administrator')
        ->middleware('can:create_school_teacher');
    Route::get('teachers/create', 'SchoolTeacherController@create')
        ->name('create_school_teachers-school_administrator')
        ->middleware('can:create_school_teacher');
    Route::post('teachers/create', 'SchoolTeacherController@store')
        ->name('create_school-school_administrator')
        ->middleware('can:create_school');
    Route::get('teachers/edit/{teacher}', 'SchoolTeacherController@edit')
        ->name('edit_school-school_administrator')
        ->middleware('can:update_school');
    Route::patch('teachers/edit/{teacher}', 'SchoolTeacherController@update')
        ->name('update_school-school_administrator')
        ->middleware('can:update_school');
    // ---------------- Substitute Teachers ----------------------------
    Route::get('substitute_teachers', 'SubstituteTeacherController@index')
        ->name('view_substitute_teachers-school_administrator')
        ->middleware('can:create_substitute_teacher');
    // ---------------- Subday ----------------------------
    Route::get('subdays', 'SubDayController@index')
        ->name('view_subdays-school_administrator')
        ->middleware('can:create_substitute_day');
    Route::get('substitute_teachers/book/{substitute_teacher}', 'SubDayController@create')
        ->name('create-sub_day-school_administrator')
        ->middleware('can:create_substitute_day');
    Route::post('substitute_teachers/book/', 'SubDayController@store')
        ->name('store-sub_day-school_administrator')
        ->middleware('can:create_substitute_day');
    // ---------------- Register Employee ----------------------------
    Route::get('register/{user}', 'Auth\RegisterConfirmationController@show')
        ->name('show_register_user-school_administrator')
        ->middleware('can:view-school_administrator-dashboard');
});

// School Prinicpals ===============================================================
Route::prefix('dashboard/school_principal')->group(function () {
    // ---------------- Teachers --------------------------------------
    Route::get('teachers', 'SchoolTeacherController@index')
        ->name('view_school_teachers-school_principal')
        ->middleware('can:create_school_teacher');
    Route::get('teachers/create', 'SchoolTeacherController@create')
        ->name('create_school_teachers-school_principal')
        ->middleware('can:create_school_teacher');
    Route::post('teachers/create', 'SchoolTeacherController@store')
        ->name('store_school_teachers-school_principal')
        ->middleware('can:create_school_teacher');
    Route::get('teachers/edit/{teacher}', 'SchoolTeacherController@edit')
        ->name('edit_school_teachers-school_principal')
        ->middleware('can:update_school');
    Route::patch('teachers/edit/{teacher}', 'SchoolTeacherController@update')
        ->name('update_school_teachers-school_principal')
        ->middleware('can:update_school');
    // ---------------- Substitute Teachers --------------------------------------
    Route::get('substitute_teachers', 'SubstituteTeacherController@index')
        ->name('view_substitute_teachers-school_principal')
        ->middleware('can:create_substitute_teacher');
    // ---------------- Sub Days -------------------------------------------
    Route::get('subdays', 'SubDayController@index')
        ->name('view_subdays-school_principal')
        ->middleware('can:create_substitute_day');
    Route::get('substitute_teachers/book/{substitute_teacher}', 'SubDayController@create')
        ->name('create-sub_day-school_principal')
        ->middleware('can:create_substitute_day');
    Route::post('substitute_teachers/book/', 'SubDayController@store')
        ->name('store-sub_day-school_principal')
        ->middleware('can:create_substitute_day');
    // ---------------- Sub Task --------------------------------------
    Route::get('subdays/showtask/{sub_day_hash}', 'SubtaskController@show')
        ->name('show_substitute_day_task-school_principal')
        ->middleware('can:view_substitute_task');
    // ---------------- Register Employee ----------------------------
    Route::get('register/{user}', 'Auth\RegisterConfirmationController@show')
        ->name('show_register_user-school_principal')
        ->middleware('can:view-school_principal-dashboard');
});

// School Teachers ====================================================================
Route::prefix('dashboard/school_teacher')->group(function () {
    // ---------------- Substitute Teachers --------------------------------------
    Route::get('substitute_teachers', 'SubstituteTeacherController@index')
        ->name('view_substitute_teachers-school_teacher')
        ->middleware('can:view_substitute_teacher');
    // ---------------- Sub Days -------------------------------------------
    Route::get('subdays', 'SubDayController@index')
        ->name('view_subdays-school_teacher')
        ->middleware('can:create_substitute_day');
    Route::get('substitute_teachers/book/{substitute_teacher}', 'SubDayController@create')
        ->name('book_substitute_day-school_teacher')
        ->middleware('can:create_substitute_day');
    Route::post('substitute_teachers/book/', 'SubDayController@store')
        ->name('store-sub_day-school_teacher')
        ->middleware('can:create_substitute_day');
    // ---------------- Sub Task --------------------------------------
    Route::get('subdays/task/{subday}', 'SubtaskController@create')
        ->name('create_substitute_day_task-school_teacher')
        ->middleware('can:create_substitute_task');
    Route::post('subdays/task', 'SubtaskController@store')
        ->name('store_substitute_day_task-school_teacher')
        ->middleware('can:create_substitute_task');
    Route::get('subdays/showtask/{sub_day_hash}', 'SubtaskController@show')
        ->name('show_substitute_day_task-school_teacher')
        ->middleware('can:view_substitute_task');
    // ---------------- Register Sub Day ----------------------------
    Route::get('register/{subday}', 'SubDayController@showMail')
        ->name('show_sub_day_request-school_teacher')
        ->middleware('can:create_substitute_day');
});

// Substitute Teachers ==================================================================
Route::prefix('dashboard/substitute_teacher')->group(function () {
    // ---------------- Sub Days --------------------------------------
    Route::get('subdays', 'SubDayController@index')
        ->name('view_subdays-substitute_teacher')
        ->middleware('can:view_substitute_task');
    Route::get('subdays/showtask/{sub_day_hash}', 'SubtaskController@show')
        ->name('show_substitute_day_task-substitute_teacher')
        ->middleware('can:view_substitute_task');
    Route::patch('subdays/showtask/{sub_day_hash}', 'SubtaskController@update')
        ->name('update_substitute_day_task-substitute_teacher')
        ->middleware('can:view_substitute_task');
    // ---------------- Accept Sub Day --------------------------------------
    Route::get('/subdays/confirm', 'SubDayController@accept')
        ->name('accept_subday-substitute_teacher')
        ->middleware('can:view_substitute_task');
    // ---------------- Vacation Days --------------------------------------
    Route::get('vacation', 'SubVacationController@index')
        ->name('view_vacationdays-substitute_teacher')
        ->middleware('can:create_substitute_teacher_vacation_day');
    Route::get('vacation/create', 'SubVacationController@create')
        ->name('create_vacationdays-substitute_teacher')
        ->middleware('can:create_substitute_teacher_vacation_day');
    Route::post('vacation/create', 'SubVacationController@store')
        ->name('store_vacationdays-substitute_teacher')
        ->middleware('can:create_substitute_teacher_vacation_day');
});
