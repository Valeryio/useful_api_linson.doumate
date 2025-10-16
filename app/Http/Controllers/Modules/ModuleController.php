<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Http\Resources\Modules\ModulesRessource;
use App\Models\Modules;
use App\Models\UserModules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allModulesCollection = Modules::all();
        $allModules = [];

        for ($i = 0; $i < count($allModulesCollection); $i++) {
            $allModules[$i] = new ModulesRessource($allModulesCollection[$i]);
        }
        return $allModules;
    }

    /**
     * Activation of a new resource.
     */
    public function activate(Request $request)
    {
        $moduleId = $request["id"];
        $user = Auth::user();

        $existingUserModule = UserModules::where("user_id", $user->id)
            ->where("module_id", $moduleId)
            ->first();

        if ($existingUserModule["active"] == 0 )
        {
            $existingUserModule->active = true;
            $existingUserModule->save();
        }

        return response()->json([
            "message"=> "Module activated"
        ], 200);
    }

    /**
     * Desctivation of a new resource.
     */
    public function desactivate(Request $request)
    {
        $moduleId = $request["id"];
        $user = Auth::user();

        $existingUserModule = UserModules::where("user_id", $user->id)
            ->where("module_id", $moduleId)
            ->first();

        if ($existingUserModule["active"] == 1 )
        {
            $existingUserModule->active = false;
            $existingUserModule->save();
        }

        return response()->json([
            "message"=> "Module desactivated"
        ], 200);
    }
    

    /**
     * Show the form for creating a new resource.
     */
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
