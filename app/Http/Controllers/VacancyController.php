<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacancyEditRequest;
use App\Http\Requests\VacancyStoreRequest;
use App\Models\Status;
use App\Models\Vacancy;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacancyController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Vacancy::class, 'vacancy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $vacancies = Vacancy::all();
        return view('pages.vacancies.index', ['vacancies' => $vacancies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $statuses = Status::all();
        return view('pages.vacancies.create', ['statuses' => $statuses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  VacancyStoreRequest  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(VacancyStoreRequest $request)
    {
        $status = Status::where('name', $request->status)->firstOrFail();
        $vacancy = new Vacancy();

        $vacancy->title = $request->title;
        $vacancy->position = $request->position;
        $vacancy->link = $request->link;
        $vacancy->company_name = $request->company_name;
        $vacancy->user_id = Auth::id();
        $vacancy->status_id = $status->id;
        $vacancy->status_assigned_at = now();
        $vacancy->save();

        return redirect(route('vacancy.create'))
            ->with(['message' => 'New vacancy created.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancy $vacancy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return View
     */
    public function edit(Vacancy $vacancy)
    {
        $statuses = Status::all();
        return view('pages.vacancies.edit', ['vacancy' => $vacancy, 'statuses' => $statuses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  VacancyEditRequest  $request
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Routing\Redirector
     */
    public function update(VacancyEditRequest $request, Vacancy $vacancy)
    {
        $status = Status::where('name', $request->status)->firstOrFail();

        //If the vacancy status was changed then we need to change status_assigned_at field too
        if ($vacancy->status->name != $status->name) {
            $status_assigned_at = date('Y-m-d H:i:s');
        } else {
            $status_assigned_at = $vacancy->status_assigned_at;
        }

        $vacancy->update([
            'title' => $request->title,
            'position' => $request->position,
            'link' => $request->link,
            'company_name' => $request->company_name,
            'status_id' => $status->id,
            'status_assigned_at' => $status_assigned_at,
        ]);

        return redirect(route('vacancy.index'))
            ->with(['message' => 'The vacancy successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Vacancy $vacancy
     * @return \Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Vacancy $vacancy)
    {
        try {
            $vacancy->delete();
        } catch (\Exception $e) {
            return redirect(route('vacancy.index'))
                ->with(['message' => 'An error occurred while deleting the vacancy.']);
        }
        return redirect(route('vacancy.index'))
            ->with(['message' => 'The vacancy successfully deleted.']);
    }
}
