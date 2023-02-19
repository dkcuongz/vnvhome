<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainContentCreateRequest;
use App\Http\Requests\MainContentUpdateRequest;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Repositories\CategoriesRepository;
use App\Repositories\ImageRepository;
use App\Repositories\MainContentRepository;
use App\Repositories\PostRepository;

class MainContentController extends Controller
{
    /**
     * @var MainContentRepository
     */
    protected $repository;

    /**
     * @var ImageRepository
     */
    protected $imageRepository;

    /**
     * The user repository implementation.
     *
     * @var CategoriesRepository
     */
    protected $categoryRepository;

    /**
     * postsController constructor.
     *
     * @param MainContentRepository $repository
     * @param ImageRepository $imageRepository
     * @param CategoriesRepository $categoryRepository
     */
    public function __construct(MainContentRepository $repository, ImageRepository $imageRepository, CategoriesRepository $categoryRepository)
    {
        $this->repository = $repository;
        $this->imageRepository = $imageRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->repository->with('image')->whereHas('category', function ($query) {
            $query->whereHas('parent', function ($subQuery) {
                $subQuery->where(['id' => 5]);
            });
        })->where('type',config('constants.post.type.new'))->get();
        return view('admin.posts-event.index', compact('posts'));
    }


    public function create()
    {
        $categories = $this->categoryRepository->with(['allLevelChildren'])->where('parent_id', '=', 5)->get();
        return view('admin.posts-event.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['type'] = config('constants.post.type.new');
            $post = $this->repository->create($data);
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = $file->hashName();
                Storage::put('images', $file, 'public');
                $dataImage['path'] = 'images/' . $filename;
                $dataImage['post_id'] = $post->id;
                $this->imageRepository->create($dataImage);

            }
            $response = [
                'message' => 'Tạo mới bài viết thành công.',
                'data' => $post->toArray(),
            ];
            DB::commit();
            return redirect(route('admin.main-contents.index'))->with('success_message', $response['message']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error_message', $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = $this->categoryRepository->with(['allLevelChildren'])->where('parent_id', '=', 5)->get();
        $post = $this->repository->with('image')->find($id);
        return view('admin.posts-event.detail', compact('post', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->categoryRepository->with(['allLevelChildren'])->where('parent_id', '=', 5)->get();
        $post = $this->repository->with('image')->find($id);
        return view('admin.posts-event.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostUpdateRequest $request
     * @param string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['type'] = config('constants.post.type.new');
            $post = $this->repository->update($data, $id);
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = $file->hashName();
                Storage::put('images', $file, 'public');
                $dataImage['path'] = 'images/' . $filename;
                $dataImage['post_id'] = $post->id;
                $this->imageRepository->where('post_id', $post->id)->delete();
                $this->imageRepository->create($dataImage);
            }
            $response = [
                'message' => 'Cập nhật bài viết thành công',
                'data' => $post->toArray(),
            ];
            DB::commit();
            return redirect(route('admin.main-contents.index'))->with('success_message', $response['message']);
        } catch (\Exception $e) {
            DB::rollBack();
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
        $post = $this->repository->find($id);
        $post->images()->delete();
        $post->delete();
        return redirect()->back()->with('success_message', 'Xóa bài viết thành công');
    }
}
