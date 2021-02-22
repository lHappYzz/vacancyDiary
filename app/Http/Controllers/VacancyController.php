<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacancyStoreRequest;
use App\Models\Status;
use App\Models\Vacancy;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacancyController extends Controller
{
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
     * @return \Illuminate\Http\Response
     */
    public function store(VacancyStoreRequest $request)
    {
        $status = Status::where('name', $request->status)->firstOrFail();
        $vacancy = new Vacancy();

        $vacancy->title = $request->title;
        $vacancy->position = $request->position;
        $vacancy->company_name = $request->company_name;
        $vacancy->user_id = Auth::id();
        $vacancy->status_id = $status->id;
        $vacancy->save();

        return response()->view('pages.vacancies.create', ['message' => 'New vacancy created.'], 200);
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
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacancy $vacancy)
    {
        //
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
