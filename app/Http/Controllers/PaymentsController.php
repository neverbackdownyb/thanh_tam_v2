<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePaymentsRequest;
use App\Http\Requests\UpdatePaymentsRequest;
use App\Models\Payments;
use App\Repositories\PaymentsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PaymentsController extends AppBaseController
{
    /** @var PaymentsRepository $paymentsRepository*/
    private $paymentsRepository;

    public function __construct(PaymentsRepository $paymentsRepo)
    {
        $this->paymentsRepository = $paymentsRepo;
    }

    /**
     * Display a listing of the Payments.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $payments = $this->paymentsRepository->paginate(50);

        return view('payments.index')
            ->with('payments', $payments);
    }

    /**
     * Show the form for creating a new Payments.
     *
     * @return Response
     */
    public function create()
    {
        return view('payments.create');
    }

    /**
     * Store a newly created Payments in storage.
     *
     * @param CreatePaymentsRequest $request
     *
     * @return Response
     */
    public function store(CreatePaymentsRequest $request)
    {
        $input = $request->all();

        $payments = $this->paymentsRepository->create($input);

        Flash::success('Payments saved successfully.');

        return redirect(route('payments.index'));
    }

    /**
     * Display the specified Payments.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $payments = $this->paymentsRepository->find($id);

        if (empty($payments)) {
            Flash::error('Payments not found');

            return redirect(route('payments.index'));
        }

        return view('payments.show')->with('payments', $payments);
    }

    /**
     * Show the form for editing the specified Payments.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $payments = $this->paymentsRepository->find($id);

        if (empty($payments)) {
            Flash::error('Payments not found');

            return redirect(route('payments.index'));
        }

        return view('payments.edit')->with('payments', $payments);
    }

    /**
     * Update the specified Payments in storage.
     *
     * @param int $id
     * @param UpdatePaymentsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaymentsRequest $request)
    {
        $payments = $this->paymentsRepository->find($id);

        if (empty($payments)) {
            Flash::error('Payments not found');

            return redirect(route('payments.index'));
        }

        $payments = $this->paymentsRepository->update($request->all(), $id);

        Flash::success('Payments updated successfully.');

        return redirect(route('payments.index'));
    }

    /**
     * Remove the specified Payments from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $payments = $this->paymentsRepository->find($id);

        if (empty($payments)) {
            Flash::error('Payments not found');

            return redirect(route('payments.index'));
        }

        $this->paymentsRepository->delete($id);

        Flash::success('Payments deleted successfully.');

        return redirect(route('payments.index'));
    }

    public function ajaxAddPayment(Request $request) {
       $paymentType = $request->input('paymentType', '');
       $diagnosisId = $request->input('diagnosisId', '');
       $note = $request->input('note', '');
       $partientId = $request->input('partientId', '');
       $totalPaid = $request->input('totalPaid', '');

       if( !is_numeric($paymentType) || empty($diagnosisId || empty($partientId)) || empty($totalPaid)) {
           $result = [
               'status' => 0,
               'message' => 'Thông tin đầu vào  không đúng. Vui lòng kiểm tra lại',
               'data' => []
           ];
       }else{
            $data = [
                'diagnosis_id' => $diagnosisId,
                'type' => $paymentType,
                'total_money' => $totalPaid,
                'note'=> $note,
                'patient_id' => $partientId
            ];
            Payments::create($data);
           $result = [
               'status' => 1,
               'message' => "Đã lưu lại lịch sử thanh toán",
               'data' => []
           ];
       }
        return response()->json($result);
    }
}
