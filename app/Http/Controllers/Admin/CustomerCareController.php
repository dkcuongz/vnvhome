<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerCareCreateRequest;
use App\Http\Requests\CustomerCareUpdateRequest;
use App\Repositories\CustomerCareRepository;
use App\Repositories\ImageRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CustomerCareController extends Controller
{

    /**
     * @var CustomerCareRepository
     */
    protected $repository;

    /**
     * @var ImageRepository
     */
    protected $imageRepository;

    /**
     * customerCareController constructor.
     * @param CustomerCareRepository $repository
     * @param ImageRepository $imageRepository
     */
    public function __construct(CustomerCareRepository $repository, ImageRepository $imageRepository)
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
        $customerCares = $this->repository->with('image')->get();
        return view('admin.customer-cares.index', compact('customerCares'));
    }


    public function create()
    {
        return view('admin.customer-cares.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CustomerCareCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerCareCreateRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['status'] = $data['status'] ?? 1;
            $customerCare = $this->repository->create($data);
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = $file->hashName();
                Storage::put('images/customer-cares', $file, 'public');
                $dataImage['path'] = 'images/customer-cares/' . $filename;
                $dataImage['customer_care_id'] = $customerCare->id;
                $this->imageRepository->create($dataImage);
            }
            $response = [
                'message' => 'Tạo mới customer Care thành công',
                'data' => $customerCare->toArray(),
            ];
            DB::commit();
            return redirect(route('admin.customer-cares.index'))->with('success_message', $response['message']);
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
        $customerCare = $this->repository->with('image')->find($id);
        return view('admin.customer-cares.detail', compact('customerCare'));
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
        $customerCare = $this->repository->with('image')->find($id);
        return view('admin.customer-cares.edit', compact('customerCare'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CustomerCareUpdateRequest $request
     * @param string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerCareUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $customerCare = $this->repository->update($request->all(), $id);
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = $file->hashName();
                Storage::put('images/customer-cares', $file, 'public');
                $dataImage['path'] = 'images/customer-cares/' . $filename;
                $image = $this->imageRepository->where('customer_care_id', $customerCare->id)->first();
                Storage::delete($image->path);
                $image->update(['path' => $dataImage['path']]);
            }
            $response = [
                'message' => 'Cập nhật customer care thành công',
                'data' => $customerCare->toArray(),
            ];
            DB::commit();
            return redirect(route('admin.customer-cares.index'))->with('success_message', $response['message']);
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
        $customerCare = $this->repository->find($id);
        $customerCare->images()->delete();
        $customerCare->delete();
        return redirect()->back()->with('success_message', 'Xóa customer care thành công');
    }
}
