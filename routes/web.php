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

Route::get('printpage', function() {
    $student = json_decode(json_encode([
        'id' => '1',
        'fullname' => 'ANJALI  ACHARYA',
        'dobad' => '2006-03-14',
        'dobbs' => '2062-12-01',
        'fathername' => 'Dinesh Kumar Shah',
        'mothername' => 'Sampole Mother',
        'district_id' => '2',
        'ward' => '04',
        'municipality' => 'Balchanpur',
        'cgpa' => '4.0',
        'symbolno' => '1234567A',
        'nebregno' => '12347895',
        'enrolledyear' => '2077',
        'created_by' => '6',
        'updated_by' => '',
        'created_at' => '2021-03-27 07:16:38',
        'updated_at' => '2021-03-27 07:16:38',
        'district' => [
            'id' => '2',
            'zone_id' => '1',
            'district' => 'ILAM',
            'is_active' => '1',
        ]
    ]));

    return view('print', [
        'student' => $student
    ]);
});
