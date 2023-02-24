<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesCreateRequest;
use App\Http\Requests\CategoriesUpdateRequest;
use App\Repositories\CategoriesRepository;
use App\Repositories\ImageRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * @var CategoriesRepository
     */
    protected $repository;

    /**
     * @var ImageRepository
     */
    protected $imageRepository;

    /**
     * categoriesController constructor.
     *
     * @param CategoriesRepository $repository
     * @param ImageRepository $imageRepository
     */
    public function __construct(CategoriesRepository $repository, ImageRepository $imageRepository)
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
        $categories = $this->repository->where('parent_id', '=', 2)->with('image')->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = $this->repository->where('id', '=', 2)->with(['allLevelChildren'])->get();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoriesCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesCreateRequest $request)
    {
        try {
            $data = $request->all();
            $data['slug'] = Str::slug($request->name);
            $category = $this->repository->create($data);
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = $file->hashName();
                Storage::put('images/categories', $file, 'public');
                $dataImage['path'] = 'images/categories/' . $filename;
                $dataImage['category_id'] = $category->id;
                $this->imageRepository->create($dataImage);
            }
            $response = [
                'message' => 'category created.',
                'data' => $category->toArray(),
            ];
            return redirect(route('admin.categories.index'))->with('success_message', $response['message']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error_message', $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $category = $this->repository->where('slug', $slug)->with('image')->first();
        $categories = $this->repository->where('id', '=', 2)->with(['allLevelChildren'])->get();
        return view('admin.categories.show', compact('category', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $category = $this->repository->where('slug', $slug)->with('image')->first();
        $categories = $this->repository->where('id', '=', 2)->with(['allLevelChildren'])->get();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoriesUpdateRequest $request
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesUpdateRequest $request, $slug)
    {
        try {

            $category = $this->repository->where('slug', $slug)->first();
            $data = $request->all();
            $data['slug'] = Str::slug($request->name);
            $categoryUpdate = $this->repository->update($data, $category->id);
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = $file->hashName();
                Storage::put('images/categories', $file, 'public');
                $dataImage['path'] = 'images/categories/' . $filename;
                $image = $this->imageRepository->where('category_id', $category->id)->first();
                Storage::delete($image->path);
                $image->update(['path' => $dataImage['path']]);
            }
            $response = [
                'message' => 'Category updated.',
                'data' => $categoryUpdate->toArray(),
            ];
            return redirect(route('admin.categories.index'))->with('success_message', $response['message']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error_message', $e->getMessage())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->repository->where('parent_id', 2)->where('slug', $id);
        $category->delete();
        return redirect(route('admin.categories.index'))->with('message', 'Category deleted.');
    }
}
