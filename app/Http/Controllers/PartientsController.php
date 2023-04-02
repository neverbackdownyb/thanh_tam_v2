<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePartientsRequest;
use App\Http\Requests\UpdatePartientsRequest;
use App\Repositories\PartientsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PartientsController extends AppBaseController
{
    /** @var PartientsRepository $partientsRepository*/
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
        $partients = $this->partientsRepository->paginate(50);

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
        return view('partients.create');
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

        $partients = $this->partientsRepository->create($input);

        Flash::success('Partients saved successfully.');

        return redirect(route('partients.index'));
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
        $partients = $this->partientsRepository->find($id);

        if (empty($partients)) {
            Flash::error('Partients not found');

            return redirect(route('partients.index'));
        }

        return view('partients.show')->with('partients', $partients);
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
            Flash::error('Partients not found');

            return redirect(route('partients.index'));
        }

        $partients = $this->partientsRepository->update($request->all(), $id);

        Flash::success('Partients updated successfully.');

        return redirect(route('partients.index'));
    }

    /**
     * Remove the specified Partients from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $partients = $this->partientsRepository->find($id);

        if (empty($partients)) {
            Flash::error('Partients not found');

            return redirect(route('partients.index'));
        }

        $this->partientsRepository->delete($id);

        Flash::success('Partients deleted successfully.');

        return redirect(route('partients.index'));
    }
}
