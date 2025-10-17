<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Http\Requests\Modules\UrlCreationRequest;
use App\Http\Resources\Modules\UrlCreationResource;
use App\Http\Resources\Modules\UrlListResource;
use App\Models\UrlShortener;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UrlShortenerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $allLinksCollection = UrlShortener::where("user_id", $user->id)
            ->get();

        $allLinks = [];

        for ($i = 0; $i < count($allLinksCollection); $i++) {
            $allLinks[$i] = new UrlListResource($allLinksCollection[$i]);
        }

        return $allLinks;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(UrlCreationRequest $request)
    {
        $user = Auth::user();
        $customCode = $request["custom_code"];
        if ($customCode) {
            $customCode = $this->generateRandomStr(10);
        }
        $newLink = UrlShortener::create([
            "original_url" => $request["original_url"],
            "code" => $customCode,
            "user_id" => $user->id
        ]);

        $response = new UrlCreationResource($newLink);
        return response()->json($response, 200);
    }

    public function redirectToUrl(string $code) {
        $existingUrl = UrlShortener::where("code", $code)
            ->first();
        
        if (!$existingUrl) {
            return response([
                "error" => "Not found!"
            ],404);
        }

        $existingUrl["clicks"] += 1;
        $existingUrl->save();
        return redirect()->away($existingUrl["original_url"]);
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
        UrlShortener::where("id", $id)
            ->delete();
        return response()->json([
            "message" => "Link deleted successfully"
        ], 200);
    }

    public static function generateRandomStr($length = 10) {
        $charSet = '0123456789abcdefghijklmnopqrstuvwxyz/_/-ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($charSet);
        $customStr = '';
        for ($i = 0; $i < $length; $i++) {
            $customStr .= $charSet[rand(0, $charactersLength - 1)];
        }
        return $customStr;
    }
}
