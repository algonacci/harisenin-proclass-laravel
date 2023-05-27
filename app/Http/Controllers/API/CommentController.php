<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $comments;

    public function __construct()
    {
        $this->comments = [];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->comments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comment = $request->all();
        $comment['id'] = uniqid(); // Generate a unique ID for the comment
        $this->comments[] = $comment;

        return response()->json($comment, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = $this->findCommentById($id);

        if (!$comment) {
            return response()->json(['error' => 'Comment not found.'], 404);
        }

        return response()->json($comment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comment = $this->findCommentById($id);

        if (!$comment) {
            return response()->json(['error' => 'Comment not found.'], 404);
        }

        $comment['message'] = $request->input('message', $comment['message']);

        return response()->json($comment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $commentIndex = $this->findCommentIndexById($id);

        if ($commentIndex === -1) {
            return response()->json(['error' => 'Comment not found.'], 404);
        }

        $deletedComment = array_splice($this->comments, $commentIndex, 1);

        return response()->json($deletedComment);
    }

    /**
     * Find a comment by ID in the comments array.
     */
    private function findCommentById(string $id)
    {
        foreach ($this->comments as $comment) {
            if ($comment['id'] === $id) {
                return $comment;
            }
        }

        return null;
    }

    /**
     * Find the index of a comment by ID in the comments array.
     */
    private function findCommentIndexById(string $id)
    {
        foreach ($this->comments as $index => $comment) {
            if ($comment['id'] === $id) {
                return $index;
            }
        }

        return -1;
    }
}
