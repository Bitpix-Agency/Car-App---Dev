<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $images = Image::all();
        $paths = [];

        foreach ($images as $img) {
            $paths[] = Storage::disk('spaces')->url($img->url);
        }

        return $this->responseHelper->response('true', 'All Feedback', $paths, 200);


//        return view('images', compact('paths'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        //@todo this needs updating into its own helper
        $file = $request->file('file');

        $hashName = $file->hashName();

        $storagePath = Storage::disk('spaces')->putFile('uploads/'.$request->user_id , $file, 'public');

        if ($storagePath) {

            $request->merge([
                'filename' => $hashName
            ]);

            $image = new Image();
            $image->user_id = $request->user_id;
            $image->description = $request->description;
            $image->url = $storagePath;
            $image->save();

            return $this->responseHelper->response('true', 'Image Uploaded', $image, 200);

        }
        return $this->responseHelper->response('false', 'Failed to upload image.', [], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
