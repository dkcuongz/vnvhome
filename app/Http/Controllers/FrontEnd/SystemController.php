<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Repositories\ImageRepository;
use App\Repositories\SystemRepository;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    /**
     * @var SystemRepository
     */
    protected $repository;

    /**
     * @var ImageRepository
     */
    protected $imageRepository;


    /**
     * postsController constructor.
     *
     * @param SystemRepository $repository
     * @param ImageRepository $imageRepository
     */
    public function __construct(SystemRepository $repository, ImageRepository $imageRepository)
    {
        $this->repository = $repository;
        $this->imageRepository = $imageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systems = $this->repository->with('images')->orderBy('created_at', 'DESC')->take(8)->get();
        return view('front-end.systems.index', compact('systems'));
    }

    public function show($slug, $id)
    {
        $system = $this->repository->with('images')->where('status', 1)->orderBy('created_at', 'DESC')->find($id);
        $systems = $this->repository->with('images')->orderBy('created_at', 'DESC')->take(8)->get();
        return view('front-end.systems.detail', compact('system', 'systems'));
    }
}
