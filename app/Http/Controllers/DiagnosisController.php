<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDiagnosisRequest;
use App\Http\Requests\UpdateDiagnosisRequest;
use App\Models\Diagnosis;
use App\Models\Partients;
use App\Repositories\DiagnosisRepository;
use App\Http\Controllers\AppBaseController;
use App\Services\ProvinceService;
use Illuminate\Http\Request;
use Flash;
use Response;

class DiagnosisController extends AppBaseController
{
    /** @var DiagnosisRepository $diagnosisRepository*/
    private $diagnosisRepository;

    public function __construct(DiagnosisRepository $diagnosisRepo)
    {
        $this->diagnosisRepository = $diagnosisRepo;
    }

    /**
     * Display a listing of the Diagnosis.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $phone = $request->input('phone', '');
        $name = $request->input('name', '');
        $provinceId  = $request->input('province_id', '');

        $province = (new ProvinceService())->getAllProvince();

        $query = Diagnosis::query()->select('diagnosis.*')
        ->join('partients', 'partients.id' , '=', 'diagnosis.patient_id');

        if (!empty($phone)) {
            $query->where('phone', 'LIKE', "%$phone%");
        }

        if (!empty($name)) {
            $query->where('partients.name', 'LIKE', "%$name%");
        }

        if (!empty($provinceId)) {
            $query->where('partients.province_id', $provinceId);
        }

        $diagnoses = $query->orderByDesc('diagnosis.updated_at')->paginate(50);

        return view('diagnoses.index')
            ->with([
                'diagnoses' => $diagnoses,
                'province' => $province,
                'phoneSelected' => $phone,
                'nameSelected' => $name,
                'provinceIdSelected' => $provinceId
            ]);
    }

    /**
     * Show the form for creating a new Diagnosis.
     *
     * @return Response
     */
    public function create()
    {
        return view('diagnoses.create');
    }

    /**
     * Store a newly created Diagnosis in storage.
     *
     * @param CreateDiagnosisRequest $request
     *
     * @return Response
     */
    public function store(CreateDiagnosisRequest $request)
    {
        $input = $request->all();

        $diagnosis = $this->diagnosisRepository->create($input);

        Flash::success('Diagnosis saved successfully.');

        return redirect(route('diagnoses.index'));
    }

    /**
     * Display the specified Diagnosis.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $diagnosis = $this->diagnosisRepository->find($id);

        if (empty($diagnosis)) {
            Flash::error('Diagnosis not found');

            return redirect(route('diagnoses.index'));
        }

        return view('diagnoses.show')->with('diagnosis', $diagnosis);
    }

    /**
     * Show the form for editing the specified Diagnosis.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $diagnosis = $this->diagnosisRepository->find($id);

        if (empty($diagnosis)) {
            Flash::error('Diagnosis not found');

            return redirect(route('diagnoses.index'));
        }

        return view('diagnoses.edit')->with('diagnosis', $diagnosis);
    }

    /**
     * Update the specified Diagnosis in storage.
     *
     * @param int $id
     * @param UpdateDiagnosisRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDiagnosisRequest $request)
    {
        $diagnosis = $this->diagnosisRepository->find($id);

        if (empty($diagnosis)) {
            Flash::error('Diagnosis not found');

            return redirect(route('diagnoses.index'));
        }

        $diagnosis = $this->diagnosisRepository->update($request->all(), $id);

        Flash::success('Diagnosis updated successfully.');

        return redirect(route('diagnoses.index'));
    }

    /**
     * Remove the specified Diagnosis from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $diagnosis = $this->diagnosisRepository->find($id);

        if (empty($diagnosis)) {
            Flash::error('Diagnosis not found');

            return redirect(route('diagnoses.index'));
        }

        $this->diagnosisRepository->delete($id);

        Flash::success('Diagnosis deleted successfully.');

        return redirect(route('diagnoses.index'));
    }
}
