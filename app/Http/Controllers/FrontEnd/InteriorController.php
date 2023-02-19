<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class InteriorController extends Controller
{
    /**
     * @var PostRepository
     */
    protected $repository;

    /**
     * @var PostRepository
     */
    protected $imageRepository;

    /**
     * BannerController constructor.
     * @param PostRepository $repository
     */
    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interiors = $this->repository->with('image')->where('status', 1)
            ->where('type', config('constants.post.type.post'))->orderBy('created_at', 'DESC')->paginate(8);
        return view('front-end.interiors.index', compact('interiors'));
    }

    public function byCategory($slug)
    {
        $interiors = $this->repository->with('image')->where('status', 1)
            ->where('type', config('constants.post.type.post'))
            ->whereHas('category', function ($query) use($slug){
                $query->where('slug', $slug);
            })->orderBy('created_at', 'DESC')->paginate(8);
        return view('front-end.interiors.index', compact('interiors'));
    }

    public function show($slug, $id)
    {
        $interior = $this->repository->with('image')->where('status', 1)
            ->where('type', config('constants.post.type.post'))->orderBy('created_at', 'DESC')->find($id);
        return view('front-end.interiors.detail', compact('interior'));
    }
}
