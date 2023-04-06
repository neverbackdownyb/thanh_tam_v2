<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateServicesRequest;
use App\Http\Requests\UpdateServicesRequest;
use App\Models\Services;
use App\Repositories\ServicesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ServicesController extends AppBaseController
{
    /** @var ServicesRepository $servicesRepository*/
    private $servicesRepository;

    public function __construct(ServicesRepository $servicesRepo)
    {
        $this->servicesRepository = $servicesRepo;
    }

    /**
     * Display a listing of the Services.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $services = $this->servicesRepository->paginate(50);

        return view('services.index')
            ->with('services', $services);
    }

    /**
     * Show the form for creating a new Services.
     *
     * @return Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created Services in storage.
     *
     * @param CreateServicesRequest $request
     *
     * @return Response
     */
    public function store(CreateServicesRequest $request)
    {
        $input = $request->all();

        $services = $this->servicesRepository->create($input);

        Flash::success('Thêm mới dịch vụ thành công.');

        return redirect(route('services.index'));
    }

    /**
     * Display the specified Services.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $services = $this->servicesRepository->find($id);

        if (empty($services)) {
            Flash::error('Services not found');

            return redirect(route('services.index'));
        }

        return view('services.show')->with('services', $services);
    }

    /**
     * Show the form for editing the specified Services.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $services = $this->servicesRepository->find($id);

        if (empty($services)) {
            Flash::error('Services not found');

            return redirect(route('services.index'));
        }

        return view('services.edit')->with('services', $services);
    }

    /**
     * Update the specified Services in storage.
     *
     * @param int $id
     * @param UpdateServicesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServicesRequest $request)
    {
        $services = $this->servicesRepository->find($id);

        if (empty($services)) {
            Flash::error('Services not found');

            return redirect(route('services.index'));
        }

        $services = $this->servicesRepository->update($request->all(), $id);

        Flash::success('Cập nhật thông tin dịch vụ thành công.');

        return redirect(route('services.index'));
    }

    /**
     * Remove the specified Services from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $services = $this->servicesRepository->find($id);

        if (empty($services)) {
            Flash::error('Services not found');

            return redirect(route('services.index'));
        }

        $this->servicesRepository->delete($id);

        Flash::success('Services deleted successfully.');

        return redirect(route('services.index'));
    }

    public function ajaxGetServiceInfo(Request $request) {
        $id = $request->id ?? 0;
        return Services::find($id);
    }

    public function ajaxAppendService(Request $request) {
        $id = $request->id ?? 0;
        $service = Services::where('status', Services::STATUS_ACTIVE)->get();

        $returnHTML = view('services.ajax-append-service')
            ->with([
                'id' => $id,
                "services" => $service
            ])->render();

        return response()->json(array('success' => true, 'html'=>$returnHTML));
    }
}
