<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    protected $group;

    public function __construct(Group $group)
    {
        $this->group = $group;
    }

    public function index()
    {
        return view('pages.group.index')
        ->with([
            'groups' => $this->group->paginate(10)
        ]);
    }
}
