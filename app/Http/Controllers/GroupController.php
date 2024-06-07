<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class GroupController extends Controller
{

    public function show(): Response
    {

        return Inertia::render('Group/GroupPage', []);
    }

    public function showGroup(): Response
    {

        //tudo user groups

        return Inertia::render('Group/MyGroupPage', ['groups' => Group::all()]);
    }

    public function save(Request $request): Response
    {
        $group = Group::create([
            "name" => $request->name,
            "managger" => Auth::id(),
            "user_count" => 1,
            "image" => "default.png"
        ]);

        if ($group != null){
            return Inertia::render('Group/MyGroupPage', ['groups' => Group::all()]);
        }
        return Inertia::render('Group/GroupPage');
    }

}
