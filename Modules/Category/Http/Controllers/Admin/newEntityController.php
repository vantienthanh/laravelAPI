<?php

namespace Modules\Category\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Category\Entities\newEntity;
use Modules\Category\Http\Requests\CreatenewEntityRequest;
use Modules\Category\Http\Requests\UpdatenewEntityRequest;
use Modules\Category\Repositories\newEntityRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class newEntityController extends AdminBaseController
{
    /**
     * @var newEntityRepository
     */
    private $newentity;

    public function __construct(newEntityRepository $newentity)
    {
        parent::__construct();

        $this->newentity = $newentity;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$newentities = $this->newentity->all();

        return view('category::admin.newentities.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('category::admin.newentities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatenewEntityRequest $request
     * @return Response
     */
    public function store(CreatenewEntityRequest $request)
    {
        $this->newentity->create($request->all());

        return redirect()->route('admin.category.newentity.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('category::newentities.title.newentities')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  newEntity $newentity
     * @return Response
     */
    public function edit(newEntity $newentity)
    {
        return view('category::admin.newentities.edit', compact('newentity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  newEntity $newentity
     * @param  UpdatenewEntityRequest $request
     * @return Response
     */
    public function update(newEntity $newentity, UpdatenewEntityRequest $request)
    {
        $this->newentity->update($newentity, $request->all());

        return redirect()->route('admin.category.newentity.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('category::newentities.title.newentities')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  newEntity $newentity
     * @return Response
     */
    public function destroy(newEntity $newentity)
    {
        $this->newentity->destroy($newentity);

        return redirect()->route('admin.category.newentity.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('category::newentities.title.newentities')]));
    }
}
