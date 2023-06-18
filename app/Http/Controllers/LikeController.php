<?php

namespace App\Http\Controllers;

use App\Events\LikeEvent;
use App\Models\Like;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class LikeController extends Controller
{
    public function store(Request $request):RedirectResponse {
        $actualLike = Auth::user()->likes()
            ->where('likeable_id', '=', $request->likeable_id)
            ->where('likeable_type', '=', $request->likeable_type)
            ->get();

        if (!$actualLike->isEmpty()) {
            $actualLike->first()->delete();
            return back();
        }

        $like = Like::query()->create(
            [
                'user_id' => Auth::user()->id,
                'likeable_id' => $request->input('likeable_id'),
                'likeable_type' => $request->input('likeable_type')
            ]
        );

        LikeEvent::dispatch($like);

        return back();
    }
}
