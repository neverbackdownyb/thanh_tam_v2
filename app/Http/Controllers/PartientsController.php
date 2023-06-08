<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePartientsRequest;
use App\Http\Requests\UpdatePartientsRequest;
use App\Models\Diagnosis;
use App\Models\Partients;
use App\Models\Payments;
use App\Models\Services;
use App\Models\Treatments;
use App\Repositories\PartientsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class PartientsController extends AppBaseController
{
    /** @var PartientsRepository $partientsRepository */
    private $partientsRepository;

    public function __construct(PartientsRepository $partientsRepo)
    {
        $this->partientsRepository = $partientsRepo;
    }

    /**
     * Display a listing of the Partients.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $partients = $this
            ->partientsRepository
            ->paginate(50);

        return view('partients.index')
            ->with('partients', $partients);
    }

    /**
     * Show the form for creating a new Partients.
     *
     * @return Response
     */
    public function create()
    {
        $service = Services::where('status', Services::STATUS_ACTIVE)->get();

        return view('partients.create')->with(
            [
                'services' => $service
            ]
        );
    }

    /**
     * Store a newly created Partients in storage.
     *
     * @param CreatePartientsRequest $request
     *
     * @return Response
     */
    public function store(CreatePartientsRequest $request)
    {
        $input = $request->all();
        $phone = $input['phone'];
        $partient = Partients::where('phone', $phone)->first();
        DB::beginTransaction();
        try {
            if (!empty($partient)) {
                $patientId = $partient->id;
            } else {
                $dataCreateUser = [
                    'phone' => $phone,
                    'status' => 1,
                    'name' => $input['name'],
                    'birth_day' => $input['birth_day'],
                ];
                $patientId = $this->partientsRepository->create($dataCreateUser)->id ?? 0;
            }

            if ($patientId == 0) {
                Flash::error('Tạo thông tin người bệnh bị lỗi.');
                return redirect(route('partients.index'));

            }

            $dataDiagnosis = [
                'name' => $input['diagnosis'],
                'total_amount' => $input['summary'],
                'total_paid' => $input['total_paid'],
                'schedule' => $input['schedule'],
                'patient_id' => $patientId,
                'created_at' => now(),
                'updated_at' => now()
            ];
            $diagnosis = Diagnosis::create($dataDiagnosis);
            $diagnosiId = $diagnosis->id;

            $dataTreatment = [];
            $services = $input['service'];
            $price = $input['price'];
            $quality = $input['quality'];

            for ($i = 0; $i < count($input['service']); $i++) {
                $dataTreatment[] = [
                    'diagnosis_id' => $diagnosiId,
                    'service_id' => $services[$i],
                    'unit_price' => $price[$i],
                    'quality' => $quality[$i],
                    'patient_id' => $patientId
                ];
            }

            Treatments::insert($dataTreatment);

            $payment = [
                'diagnosis_id' => $diagnosiId,
                'type' => $input['payment-type'],
                'total_money' => $input['total_paid'],
                'patient_id' => $patientId,
                'note' => $input['note']
            ];
            Payments::create($payment);
            DB::commit();

            Flash::success('Partients saved successfully.');

            return redirect(route('partients.index'));

        } catch (\Exception $exception) {
//            DB::commit();
            DB::rollback();

            dd($exception);
        }

    }


    /**
     * Display the specified Partients.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $totalAmount = 0;
        $totalPaid = 0;
        $partients = $this->partientsRepository->find($id);
        $diagnosis = Diagnosis::where('patient_id', $id)
            ->get();
        $totalAmount = $diagnosis->sum('total_amount');

        $payments = Payments::where('patient_id', $id)
            ->get();

        foreach ($payments as $item) {
            $totalPaid += $item->total_money;
        }


        if (empty($partients)) {
            Flash::error('Partients not found 4');

            return redirect(route('partients.index'));
        }

        return view('partients.show')->with([
            'partients' => $partients,
            'diagnosis' => $diagnosis,
            'totalAmount' => $totalAmount,
            'totalPaid' => $totalPaid
        ]);
    }

    /**
     * Show the form for editing the specified Partients.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $partients = $this->partientsRepository->find($id);

        if (empty($partients)) {
            Flash::error('Partients not found');

            return redirect(route('partients.index'));
        }

        return view('partients.edit')->with('partients', $partients);
    }

    /**
     * Update the specified Partients in storage.
     *
     * @param int $id
     * @param UpdatePartientsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePartientsRequest $request)
    {
        $partients = $this->partientsRepository->find($id);

        if (empty($partients)) {
            Flash::error('Partients not found 1');

            return redirect(route('partients.index'));
        }

        $partients = $this->partientsRepository->update($request->all(), $id);

        Flash::success('Cập nhật thông tin người bênh thành công.');

        return redirect(route('partients.index'));
    }

    /**
     * Remove the specified Partients from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        Flash::error('Không có quyền xóa');

        return redirect(route('partients.index'));
        $partients = $this->partientsRepository->find($id);

        if (empty($partients)) {
            Flash::error('Partients not found 2');

            return redirect(route('partients.index'));
        }

        $this->partientsRepository->delete($id);

        Flash::success('Partients deleted successfully.');

        return redirect(route('partients.index'));
    }

    public function history($id)
    {
       $history = Diagnosis::where('patient_id', $id)->get();
       return view('partients.show_history')->with('history', $history);

    }

    public function ajaxGetCustomerByPhone(Request $request) {
        $phone = $request->get('phone');
        $users = Partients::select('id', 'phone', 'birth_day', 'name', 'province_id')->where('phone', 'like', "%$phone%")->limit(10)->get();
        $result = [];

        foreach ($users as $item) {
            $result[] = [
                'id' => $item['id'],
                'phone' => $item['phone'],
                'birth_day' => $item['birth_day'],
                'name' => $item['phone'] . ' - '. $item['name'],
                'full_name' => $item['name'],
                'province_id' => $item['province_id']
            ];
        }
        return $result;
    }
}
