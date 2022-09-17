<?php

namespace App\Http\Controllers;

use App\Assessment;
use App\Degree;
use App\Permission;
use App\Position;
use App\Rank;
use App\Role;
use App\Semester;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $semesters = Semester::all();
        $assessments = Assessment::all();
        $positions = Position::all();
        $ranks = Rank::all();
        $degrees = Degree::all();
        $roles = Role::all();
        $permissions = Permission::all();

        return view('settings.index')->with([
            'semesters' => $semesters,
            'assessments' => $assessments,
            'positions' => $positions,
            'ranks' => $ranks,
            'degrees' => $degrees,
            'roles' => $roles,
            'permissions' => $permissions,
        ]);
    }
}
