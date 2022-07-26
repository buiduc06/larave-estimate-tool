<?php

namespace App\Http\Controllers;

use App\DataTables\EstimationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEstimationRequest;
use App\Http\Requests\UpdateEstimationRequest;
use App\Repositories\EstimationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EstimationController extends AppBaseController
{
    /** @var EstimationRepository $estimationRepository*/
    private $estimationRepository;

    public function __construct(EstimationRepository $estimationRepo)
    {
        $this->estimationRepository = $estimationRepo;
    }

    /**
     * Display a listing of the Estimation.
     *
     * @param EstimationDataTable $estimationDataTable
     *
     * @return Response
     */
    public function index(EstimationDataTable $estimationDataTable)
    {
        return $estimationDataTable->render('estimations.index');
    }

    /**
     * Show the form for creating a new Estimation.
     *
     * @return Response
     */
    public function create()
    {
        return view('estimations.create');
    }

    /**
     * Store a newly created Estimation in storage.
     *
     * @param CreateEstimationRequest $request
     *
     * @return Response
     */
    public function store(CreateEstimationRequest $request)
    {
        $input = $request->all();

        $estimation = $this->estimationRepository->create($input);

        Flash::success('Estimation saved successfully.');

        return redirect(route('estimations.index'));
    }

    /**
     * Display the specified Estimation.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estimation = $this->estimationRepository->find($id);

        if (empty($estimation)) {
            Flash::error('Estimation not found');

            return redirect(route('estimations.index'));
        }

        return view('estimations.show')->with('estimation', $estimation);
    }

    /**
     * Show the form for editing the specified Estimation.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estimation = $this->estimationRepository->find($id);

        if (empty($estimation)) {
            Flash::error('Estimation not found');

            return redirect(route('estimations.index'));
        }

        return view('estimations.edit')->with('estimation', $estimation);
    }

    /**
     * Update the specified Estimation in storage.
     *
     * @param int $id
     * @param UpdateEstimationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstimationRequest $request)
    {
        $estimation = $this->estimationRepository->find($id);

        if (empty($estimation)) {
            Flash::error('Estimation not found');

            return redirect(route('estimations.index'));
        }

        $estimation = $this->estimationRepository->update($request->all(), $id);

        Flash::success('Estimation updated successfully.');

        return redirect(route('estimations.index'));
    }

    /**
     * Remove the specified Estimation from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estimation = $this->estimationRepository->find($id);

        if (empty($estimation)) {
            Flash::error('Estimation not found');

            return redirect(route('estimations.index'));
        }

        $this->estimationRepository->delete($id);

        Flash::success('Estimation deleted successfully.');

        return redirect(route('estimations.index'));
    }
}
