<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterGroupRequest;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    protected $group;

    public function __construct(Group $group)
    {
        $this->group = $group->orderBy('updated_at',);
    }

    public function index()
    {
        return view('pages.group.index')
        ->with([
            'groups' => $this->group->paginate(10)
        ]);
    }
    
    public function create()
    {
        return view('pages.group.create');
    }

    public function store(RegisterGroupRequest $request)
    {
        $group = $this->group->create($request->only('name','shift','grade_id'));
        return view('pages.group.index')
        ->with([
            'success-message' => "Turma cadastrada com sucesso",
            "group" => $group,
            "groups" => $this->group->paginate(10)
        ]);   
    }
}
