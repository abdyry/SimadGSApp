<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public $comment;
    public $editingComment = null;

    public function mount(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function updateComment()
{
    $validatedData = $this->validate([
        'comment.content' => 'required|max:255',
    ]);

    $this->comment->update([
        'content' => $validatedData['comment']['content'],
    ]);

    session()->flash('message', 'Comment updated successfully.');
}

    public function render()
    {
        $comments = Comment::all();
        return view('livewire.comments', compact('comments'));
    }

    public function editComment($commentId)
    {
        $this->editingComment = $commentId;
        $this->comment = Comment::find($commentId);
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'content' => 'required|string',
            'topic_id' => 'required|exists:topics,id', // Ensure the topic ID exists in the topics table
        ]);

        // Create a new comment instance
        $comment = new Comment();

        // Set the attributes of the comment
        $comment->content = $validatedData['content'];
        $comment->user_id = auth()->id(); // Set the user ID of the authenticated user
        $comment->topic_id = $validatedData['topic_id'];

        // Save the comment to the database
        $comment->save();

        // Redirect the user or return a response as needed
        return back()->with('success', 'Comment added successfully!');
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);

        // Update the comment instance
        $comment->content = $validatedData['content'];
        $comment->save();

        return redirect()->route('topics.show', $comment->topic_id)->with('success', 'Comment updated successfully!');
    }

    public function destroy(Comment $comment)
    {
        $topicId = $comment->topic_id;
        $comment->delete();

        return redirect()->route('topics.show', $topicId)->with('success', 'Comment deleted successfully!');
    }

}
