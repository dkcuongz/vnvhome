<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Repositories\CustomerCareRepository;
use App\Repositories\PostRepository;

class CustomerCareController extends Controller
{

    /**
     * @var CustomerCareRepository
     */
    protected $repository;

    /**
     * @var PostRepository
     */
    protected $postRepository;

    /**
     * customerCareController constructor.
     * @param CustomerCareRepository $repository
     * @param PostRepository $imageRepository
     */
    public function __construct(CustomerCareRepository $repository, PostRepository $postRepository)
    {
        $this->repository = $repository;
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postRepository->with('images')->orderBy('created_at', 'DESC')->take(9)->get();
        $customerCares = $this->repository->with('image')->get();
        return view('front-end.customer-review.index', compact('customerCares', 'posts'));
    }
}
