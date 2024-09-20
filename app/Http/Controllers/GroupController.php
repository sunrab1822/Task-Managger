<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use App\Models\UsersGroups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;
use PHPUnit\Metadata\Api\Groups;

class GroupController extends Controller
{

    public function show(): Response
    {

        return Inertia::render('Group/GroupPage', ["groups" => Group::all()]);
    }

    public function showGroup(): Response
    {

        //tudo user groups

        //dd(UsersGroups::where('user_id', Auth::id())->with('group')->get());
        $groups = User::find(Auth::id())->groups;

        // dd($groups);

        if  (count($groups) > 0 ){
            return Inertia::render('Group/MyGroupPage', ['groups' => $groups]);
        }

        return Inertia::render('Group/GroupPage', []);
    }

    public function save(Request $request): Response
    {
        $group = Group::create([
            "name" => $request->name,
            "managger" => Auth::id(),
            "user_count" => 1,
            "image" => "default.png"
        ]);

        UsersGroups::create([
            "user_id" => Auth::id(),
            "group_id" => $group->id
        ]);


        $groups = UsersGroups::where('user_id', Auth::id())->with('group')->get();

        if ($group != null){
            return Inertia::render('Group/MyGroupPage', ['groups' => $groups]);
        }
        return Inertia::render('Group/GroupPage');
    }

    public function join(Request $request){
        $groupId = $request->query('id');

        $group = UsersGroups::updateOrCreate([
            "user_id" => Auth::id(),
            "group_id" =>$groupId
        ],[

        ]);

        $groups = UsersGroups::where('user_id', Auth::id())->with('group')->get();

        return Inertia::render('Group/MyGroupPage', ['groups' => $groups]);
    }

    public function test()
    {
        return User::find(Auth::id())->groups;
    }

}
