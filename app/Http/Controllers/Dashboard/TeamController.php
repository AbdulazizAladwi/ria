<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\TeamRepositoryInterface;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    protected $team;
    public function __construct(TeamRepositoryInterface $teamRepository)
    {
        $this->team = $teamRepository;

    }

    public function index()
    {
        return view('dashboard.teams.index', ['title' => 'Teams']);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
