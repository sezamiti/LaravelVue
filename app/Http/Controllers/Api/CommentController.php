<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\AddNewComment;
use App\Models\Comment;

use App\Http\Requests\Comment\CreateRequest;


class CommentController extends Controller
{
    public function store(CreateRequest $request)
    {
        AddNewComment::dispatch($request['subject'], $request['body'], $request['article_id']);

        return response()->json([
            'status' => 'success',
        ], 201);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Комментарий успешно удален',
        ]);
    }
}
