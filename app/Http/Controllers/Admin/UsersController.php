<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gate;
use App\Repositories\RolesRepository;
use App\Repositories\UsersRepository;
use App\Http\Requests\UserRequest;
use App\User;

class UsersController extends AdminController
{

    protected $us_rep;
    protected $rol_rep;


    public function __construct(RolesRepository $rol_rep, UsersRepository $us_rep) {
        parent::__construct();

        $this->us_rep = $us_rep;
        $this->rol_rep = $rol_rep;

        $this->template = env('THEME').'.admin.users';

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Gate::denies('EDIT_USERS')) {
            abort(403);
        }
        $users = $this->us_rep->get();

        $this->content = view(env('THEME').'.admin.users_content')->with(['users'=>$users ])->render();

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $this->title =  'Новый пользователь';

        $roles = $this->getRoles()->reduce(function ($returnRoles, $role) {
            $returnRoles[$role->id] = $role->name;
            return $returnRoles;
        }, []);;

        $this->content = view(env('THEME').'.admin.users_create_content')->with('roles',$roles)->render();

        return $this->renderOutput();
    }

    public function getRoles() {
        return \App\Role::all();
    }


    public function store(UserRequest $request)
    {
        //
        $result = $this->us_rep->addUser($request);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect('/admin')->with($result);
    }


    public function show($id)
    {
        //
    }


    public function edit(User $user)
    {
        $this->title =  'Редактирование пользователя - '. $user->name;

        $roles = $this->getRoles()->reduce(function ($returnRoles, $role) {
            $returnRoles[$role->id] = $role->name;
            return $returnRoles;
        }, []);

        $this->content = view(env('THEME').'.admin.users_create_content')->with(['roles'=>$roles,'user'=>$user])->render();

        return $this->renderOutput();

    }


    public function update(UserRequest $request, User $user)
    {
        
        $result = $this->us_rep->updateUser($request,$user);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect('/admin')->with($result);
    }


    public function destroy(User $user)
    {
        $result = $this->us_rep->deleteUser($user);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect('/admin')->with($result);
    }
}
