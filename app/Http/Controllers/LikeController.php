<?php

namespace App\Http\Controllers;

use App\Events\LikeEvent;
use App\Models\Collection;
use App\Models\Item;
use App\Models\Like;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class LikeController extends Controller
{
    public function store(/*Request $request*/ Item $item) {
//        $actualLike = Auth::user()->likes()
//            ->where('likeable_id', '=', $request->likeable_id)
//            ->where('likeable_type', '=', $request->likeable_type)
//            ->get();
//
//        if (!$actualLike->isEmpty()) {
//            $actualLike->first()->delete();
//            return back();
//        }
//
//        $like = Like::query()->create(
//            [
//                'user_id' => Auth::user()->id,
//                'likeable_id' => $request->input('likeable_id'),
//                'likeable_type' => $request->input('likeable_type')
//            ]
//        );
//
//        LikeEvent::dispatch(Auth::user());
//
//        return back();

        if ($like = $item->likes()->where('user_id', Auth::id())->first()) {
            $like->delete();
        } else {
            $item->likes()->create([
                'user_id' => Auth::id(),
                'likeable_id' => $item->id
            ]);
        }

        LikeEvent::dispatch($item->likes->count());

        return response()->json([
           'count' => $item->likes->count()
        ]);
    }
}
