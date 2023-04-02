<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTreatmentsRequest;
use App\Http\Requests\UpdateTreatmentsRequest;
use App\Repositories\TreatmentsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TreatmentsController extends AppBaseController
{
    /** @var TreatmentsRepository $treatmentsRepository*/
    private $treatmentsRepository;

    public function __construct(TreatmentsRepository $treatmentsRepo)
    {
        $this->treatmentsRepository = $treatmentsRepo;
    }

    /**
     * Display a listing of the Treatments.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $treatments = $this->treatmentsRepository->paginate(50);

        return view('treatments.index')
            ->with('treatments', $treatments);
    }

    /**
     * Show the form for creating a new Treatments.
     *
     * @return Response
     */
    public function create()
    {
        return view('treatments.create');
    }

    /**
     * Store a newly created Treatments in storage.
     *
     * @param CreateTreatmentsRequest $request
     *
     * @return Response
     */
    public function store(CreateTreatmentsRequest $request)
    {
        $input = $request->all();

        $treatments = $this->treatmentsRepository->create($input);

        Flash::success('Treatments saved successfully.');

        return redirect(route('treatments.index'));
    }

    /**
     * Display the specified Treatments.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $treatments = $this->treatmentsRepository->find($id);

        if (empty($treatments)) {
            Flash::error('Treatments not found');

            return redirect(route('treatments.index'));
        }

        return view('treatments.show')->with('treatments', $treatments);
    }

    /**
     * Show the form for editing the specified Treatments.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $treatments = $this->treatmentsRepository->find($id);

        if (empty($treatments)) {
            Flash::error('Treatments not found');

            return redirect(route('treatments.index'));
        }

        return view('treatments.edit')->with('treatments', $treatments);
    }

    /**
     * Update the specified Treatments in storage.
     *
     * @param int $id
     * @param UpdateTreatmentsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTreatmentsRequest $request)
    {
        $treatments = $this->treatmentsRepository->find($id);

        if (empty($treatments)) {
            Flash::error('Treatments not found');

            return redirect(route('treatments.index'));
        }

        $treatments = $this->treatmentsRepository->update($request->all(), $id);

        Flash::success('Treatments updated successfully.');

        return redirect(route('treatments.index'));
    }

    /**
     * Remove the specified Treatments from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $treatments = $this->treatmentsRepository->find($id);

        if (empty($treatments)) {
            Flash::error('Treatments not found');

            return redirect(route('treatments.index'));
        }

        $this->treatmentsRepository->delete($id);

        Flash::success('Treatments deleted successfully.');

        return redirect(route('treatments.index'));
    }
}
