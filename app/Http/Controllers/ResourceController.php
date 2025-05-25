<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::with('course')->get();
        $courses = Course::all();
        return view('admin.resources', compact('resources', 'courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'name' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,txt|max:2048',
        ]);

        $file = $request->file('file');
        $filePath = $file->store('resources', 'public');

        Resource::create([
            'course_id' => $request->course_id,
            'name' => $request->name,
            'file_path' => $filePath,
            'file_type' => $file->getClientMimeType(),
            'file_size' => $file->getSize(),
        ]);

        return redirect()->route('admin.resources')->with('success', 'Resource uploaded successfully.');
    }

    public function update(Request $request, $id)
    {
        $resource = Resource::findOrFail($id);

        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'name' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx,txt|max:2048',
        ]);

        $data = [
            'course_id' => $request->course_id,
            'name' => $request->name,
        ];

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($resource->file_path);
            $file = $request->file('file');
            $data['file_path'] = $file->store('resources', 'public');
            $data['file_type'] = $file->getClientMimeType();
            $data['file_size'] = $file->getSize();
        }

        $resource->update($data);

        return redirect()->route('admin.resources')->with('success', 'Resource updated successfully.');
    }

    public function destroy($id)
    {
        $resource = Resource::findOrFail($id);
        Storage::disk('public')->delete($resource->file_path);
        $resource->delete();

        return redirect()->route('admin.resources')->with('success', 'Resource deleted successfully.');
    }
}
