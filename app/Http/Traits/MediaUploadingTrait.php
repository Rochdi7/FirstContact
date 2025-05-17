<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;

trait MediaUploadingTrait
{
    public function storeMedia(Request $request)
    {
        // Validate file size
        if ($request->has('size')) {
            $request->validate([
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        // Validate dimensions if width or height are present
        if ($request->has('width') || $request->has('height')) {
            $request->validate([
                'file' => sprintf(
                    'image|dimensions:max_width=%s,max_height=%s',
                    $request->input('width', 100000),
                    $request->input('height', 100000)
                ),
            ]);
        }

        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        $file = $request->file('file');
        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function showMedia($media_uuid, string $size = null)
    {
        $mediaItem = Media::where('uuid', $media_uuid)->firstOrFail();

        try {
            $img = is_null($size)
                ? file_get_contents($mediaItem->getPath())
                : file_get_contents($mediaItem->getPath($size));

            return response($img)->header('Content-type', 'image/webp');
        } catch (FileNotFoundException $e) {
            abort(404);
        }
    }

    public function uploadGetImages(Request $request)
    {
        $image = $request->file('file');
        $path = $image->store('images', 'public');
        $url = url("/files/upload") . '/' . $path;

        return response()->json(['location' => $url]);
    }

    public function showMediaFile($media_uuid)
    {
        try {
            $mediaItem = Media::where('uuid', $media_uuid)->firstOrFail();
            return response()->download($mediaItem->getPath(), $mediaItem->file_name);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Media not found.'], 404);
        }
    }

    public function showMediaGeneral($media_uuid)
    {
        $mediaItem = Media::where('file_name', $media_uuid)->firstOrFail();

        try {
            $img = file_get_contents($mediaItem->getPath());
            return response($img)->header('Content-type', $mediaItem->mime_type);
        } catch (FileNotFoundException $e) {
            abort(404);
        }
    }
}
