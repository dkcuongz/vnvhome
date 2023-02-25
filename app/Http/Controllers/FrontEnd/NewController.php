<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Repositories\CategoriesRepository;
use App\Repositories\NewsRepository;
use App\Repositories\PostRepository;

class NewController extends Controller
{
    /**
     * @var NewsRepository
     */
    protected $repository;

    /**
     * The user repository implementation.
     *
     * @var CategoriesRepository
     */
    protected $categoryRepository;

    /**
     * BannerController constructor.
     * @param PostRepository $repository
     * @param CategoriesRepository $categoryRepository
     */
    public function __construct(PostRepository $repository, CategoriesRepository $categoryRepository)
    {
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newActivities = $this->repository->with('image')->where('status', 1)
            ->with('category', function ($query) {
                $query->where('id', 6);
            })
            ->orderBy('created_at', 'DESC')->take(30)->get();

        $newPromotions = $this->repository->with('image')->where('status', 1)
            ->with('category', function ($query) {
                $query->where('id', 7);
            })
            ->orderBy('created_at', 'DESC')->take(6)->get();

        $newExps = $this->repository->with('image')->where('status', 1)
            ->with('category', function ($query) {
                $query->where('id', 8);
            })
            ->orderBy('created_at', 'DESC')->take(3)->get();

        $newOthers = $this->repository->with('image')->where('status', 1)
            ->with('category', function ($query) {
                $query->where('id', 9);
            })
            ->orderBy('created_at', 'DESC')->take(6)->get();

        return view('front-end.news.index', compact('newActivities', 'newPromotions', 'newExps', 'newOthers'));
    }

    public function byCategory($slug)
    {
        $category = $this->categoryRepository->where('slug', '=', $slug)->with('image')->first();
        $news = $this->repository->with('image')->where('status', 1)
            ->with('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })->orderBy('created_at', 'DESC')->paginate(8);
        return view('front-end.news.by-category', compact('news', 'category'));
    }

    public function show($slug, $id)
    {
        $new = $this->repository->with('image')->where('status', 1)
            ->orderBy('created_at', 'DESC')->find($id);
        return view('front-end.news.detail', compact('new'));
    }
}
