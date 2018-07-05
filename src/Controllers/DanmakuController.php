<?php

namespace MoePlayer\Danmaku\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use MoePlayer\Danmaku\Models\Danmaku;

class DanmakuController extends Controller
{

    public function index(Request $request)
    {
        $data = Danmaku::where('video_id', $request->get('id'), 0)->get();
        $result = [];
        foreach ($data as $item) {
            $result[] = [
                (float) $item->time,
                $item->type,
                $item->color,
                $item->author,
                $item->text
            ];
        }
        return [
            'code' => 0,
            'version' => 2,
            'danmaku' => $result,
        ];
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Support\MessageBag
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'player' => 'required|max:255',
            'author' => 'string',
            'time' => 'required',
            'text' => 'required|max:30',
            'color' => 'required',
            'type' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $danmaku = new Danmaku;
            $danmaku->user_id = Auth::user()->id;
            $danmaku->video_id = $request->json('player');
            $danmaku->author = $request->json('author');
            $danmaku->time = $request->json('time');
            $danmaku->text = $request->json('text');
            $danmaku->color = $request->json('color');
            $danmaku->type = $request->json('type');
            $danmaku->referer = URL::previous();
            $danmaku->ip = $request->getClientIp();
            $danmaku->save();
            return response()->json([
                'code' => 0,
                'data' => $danmaku
            ]);
        }
    }

}
