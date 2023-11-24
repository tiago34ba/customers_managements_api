<?php

namespace App\Http\Controllers\Admin;

use App\Models\ServiceController;
use Illuminate\Http\Request;



class ServicesController extends Controller
{
    private $repository;

    public function __construct(services $services)
    {
        $this->repository = $services;

        $this->middleware(['can:services']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.services.create');
    }

    public function store(StoreUpdateservices $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('services.index');
    }

    public function show($url)
    {
        $services = $this->repository->where('url', $url)->first();

        if (!$services)
            return redirect()->back();

        return view('admin.pages.services.show', [
            'services' => $services
        ]);
    }

    public function destroy($url)
    {
        $services = $this->repository
                        ->with('details')
                        ->where('url', $url)
                        ->first();

        if (!$services)
            return redirect()->back();

        if ($services->details->count() > 0) {
            return redirect()
                        ->back()
                        ->with('error', 'Existem detahes vinculados a esse serviceso, portanto não pode deletar');
        }

        $services->delete();

        return redirect()->route('services.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $services = $this->repository->search($request->filter);

        return view('admin.pages.services.index', [
            'services' => $services,
            'filters' => $filters,
        ]);
    }

    public function edit($url)
    {
        $services = $this->repository->where('url', $url)->first();

        if (!$services)
            return redirect()->back();

        return view('admin.pages.services.edit', [
            'services' => $services
        ]);
    }

    public function update(StoreUpdateservices $request, $url)
    {
        $services = $this->repository->where('url', $url)->first();

        if (!$services)
            return redirect()->back();

        $services->update($request->all());

        return redirect()->route('services.index');
    }
}
