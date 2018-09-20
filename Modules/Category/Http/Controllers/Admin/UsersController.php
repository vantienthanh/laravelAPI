<?php

namespace Modules\Category\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Category\Entities\Users;
use Modules\Category\Http\Requests\CreateUsersRequest;
use Modules\Category\Http\Requests\UpdateUsersRequest;
use Modules\Category\Repositories\UsersRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class UsersController extends AdminBaseController
{
    /**
     * @var UsersRepository
     */
    private $users;

    public function __construct(UsersRepository $users)
    {
        parent::__construct();

        $this->users = $users;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$users = $this->users->all();

        return view('category::admin.users.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('category::admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateUsersRequest $request
     * @return Response
     */
    public function store(CreateUsersRequest $request)
    {
        $this->users->create($request->all());

        return redirect()->route('admin.category.users.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('category::users.title.users')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Users $users
     * @return Response
     */
    public function edit(Users $users)
    {
        return view('category::admin.users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Users $users
     * @param  UpdateUsersRequest $request
     * @return Response
     */
    public function update(Users $users, UpdateUsersRequest $request)
    {
        $this->users->update($users, $request->all());

        return redirect()->route('admin.category.users.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('category::users.title.users')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Users $users
     * @return Response
     */
    public function destroy(Users $users)
    {
        $this->users->destroy($users);

        return redirect()->route('admin.category.users.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('category::users.title.users')]));
    }
}
