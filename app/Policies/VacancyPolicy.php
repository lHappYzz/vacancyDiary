<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class VacancyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return Auth::check();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vacancy  $vacancy
     * @return mixed
     */
    public function view(User $user, Vacancy $vacancy)
    {
        return Auth::check();
    }

    /**
     * Determine whether the user can create models.
     *
     * @return mixed
     */
    public function create()
    {
        return Auth::check();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vacancy  $vacancy
     * @return mixed
     */
    public function update(User $user, Vacancy $vacancy)
    {
        return $user->id == $vacancy->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vacancy  $vacancy
     * @return mixed
     */
    public function delete(User $user, Vacancy $vacancy)
    {
        return $user->id == $vacancy->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vacancy  $vacancy
     * @return mixed
     */
    public function restore(User $user, Vacancy $vacancy)
    {
        return Redirect::route('vacancy.index');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vacancy  $vacancy
     * @return mixed
     */
    public function forceDelete(User $user, Vacancy $vacancy)
    {
        return Redirect::route('vacancy.index');
    }
}
