<?php

namespace App\Http\Controllers\Photography;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Project;
use App\Models\SessionGallery;
use Illuminate\Http\Request;

    // USO PARA FOTOGRAFIA, EN EL DROPDOWN(my images)

class PhotographyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $account_id = $user->account->id;
        $account = Account::find($account_id);

        $gallery = $user->galleries->first();

        return view('dropdown.photography.index',compact('user', 'account', 'gallery'));
    }

    public function index2()
    {
        $user = auth()->user();

        $projects = Project::where('email', $user->email)
            ->where('status', '!=', 'DELETED')
            ->with(['sessions' => function($q) {
                $q->where('status', '!=', 'DELETED')
                  ->orderBy('sort_order')
                  ->with(['galleries' => function($q) {
                      $q->where('status', '!=', 'HIDE')
                        ->with('images');
                  }]);
            }])
            ->get();

        return view('dropdown.photography.index2', compact('user', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function gallery(SessionGallery $gallery)
    {
        return view('dropdown.photography.gallery', compact('gallery'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
