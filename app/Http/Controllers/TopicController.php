<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Support\Facades\Storage;

class TopicController extends Controller
{
    public function index()
{
    $topics = Topic::where('user_id', auth()->id())->get();

    return view('topics.list', compact('topics'));
}

public function create()
{
    return view('topics.create');
}
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'media' => 'required|file|mimes:mp4,jpg,jpeg,png|max:2048', 
        ]);

        // Store the uploaded file and retrieve its path
        $mediaPath = $request->file('media')->store('public/media');

        // Create a new topic record in the database
        Topic::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'media_path' => $mediaPath,
            'user_id' => auth()->id(), 
        ]);

        // Redirect the user to a relevant page with a success message
        return redirect()->route('topics.index')->with('success', 'Topic created successfully.');
    }
    public function edit(Topic $topic)
{
    // Ensure that the topic belongs to the authenticated user
    if ($topic->user_id !== auth()->id()) {
        abort(403, 'Unauthorized');
    }

    return view('topics.edit', compact('topic'));
}
public function update(Request $request, Topic $topic)
{
    // Ensure that the topic belongs to the authenticated user
    if ($topic->user_id !== auth()->id()) {
        abort(403, 'Unauthorized');
    }

    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'media' => 'nullable|file|mimes:jpeg,png,mp4|max:10240', // Example file size limit is 10 MB
    ]);

    // Update topic fields
    $topic->title = $validatedData['title'];
    $topic->description = $validatedData['description'];

    // Handle media update
    if ($request->hasFile('media')) {
        // Delete old media file if exists
        if ($topic->media_path) {
            Storage::delete($topic->media_path);
        }

        // Store new media file
        $mediaPath = $request->file('media')->store('public/media');
        $topic->media_path = $mediaPath;
    }

    $topic->save();

    return redirect()->route('topics.index')->with('success', 'Topic updated successfully!');
}
public function destroy(Topic $topic)
{
    // Ensure that the topic belongs to the authenticated user
    if ($topic->user_id !== auth()->id()) {
        abort(403, 'Unauthorized');
    }

    // Delete associated media file
    if ($topic->media_path) {
        Storage::delete($topic->media_path);
    }

    $topic->delete();

    return redirect()->route('topics.index')->with('success', 'Topic deleted successfully!');
}

}
