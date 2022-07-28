<?php

namespace App\Http\Controllers;

use App\DataTables\LayoutDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLayoutRequest;
use App\Http\Requests\UpdateLayoutRequest;
use App\Repositories\LayoutRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LayoutController extends AppBaseController
{
    /** @var LayoutRepository $layoutRepository*/
    private $layoutRepository;

    public function __construct(LayoutRepository $layoutRepo)
    {
        $this->layoutRepository = $layoutRepo;
    }

    /**
     * Display a listing of the Layout.
     *
     * @param LayoutDataTable $layoutDataTable
     *
     * @return Response
     */
    public function index(LayoutDataTable $layoutDataTable)
    {
        return $layoutDataTable->render('layouts.index');
    }

    /**
     * Show the form for creating a new Layout.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.create');
    }

    /**
     * Store a newly created Layout in storage.
     *
     * @param CreateLayoutRequest $request
     *
     * @return Response
     */
    public function store(CreateLayoutRequest $request)
    {
        $input = $request->all();

        $file_name = \Storage::put('layouts', $request->file('layout_file'));

        $content = \Storage::get($file_name);

        $data = ['file_path' => $file_name, 'user_id' => auth()->user()->id, 'content' => $content] + $input;

        $layout = $this->layoutRepository->create($data);

        Flash::success('Layout saved successfully.');

        return redirect(route('layouts.index'));
    }

    /**
     * Display the specified Layout.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $layout = $this->layoutRepository->find($id);

        if (empty($layout)) {
            Flash::error('Layout not found');

            return redirect(route('layouts.index'));
        }

        $contents = \Storage::get($layout->file_path);

        $contents = strtr($contents, [
            '[Input]' => "<input type='text' class='est-input cell-input-text'/>",
            '[formula]' => '<input type="text" class="est-input formula-input" min="0" value="0" readonly />',

            '[Input#price]' => "<input type='checkbox' class='cell-checkbox-price' /><input type='number' min='0' value='0' class='est-input cell-input-price'/>",
            '[Input#number]' => "<input type='number' min='0' value='0' class='est-input cell-input-number'/>",


            '</head>' => '<link rel="stylesheet" href="'.url('/tools/tool.css').'"/>
            </head>',
            '</body>' => '
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="'.url('/tools/tool.js').'"></script>
            </body>',
        ]);


        return view('layouts.show')
        ->with('layout', $layout)->with('content', $contents);
    }

    /**
     * Show the form for editing the specified Layout.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $layout = $this->layoutRepository->find($id);

        if (empty($layout)) {
            Flash::error('Layout not found');

            return redirect(route('layouts.index'));
        }

        return view('layouts.edit')->with('layout', $layout);
    }

    /**
     * Update the specified Layout in storage.
     *
     * @param int $id
     * @param UpdateLayoutRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLayoutRequest $request)
    {
        $layout = $this->layoutRepository->find($id);

        if (empty($layout)) {
            Flash::error('Layout not found');

            return redirect(route('layouts.index'));
        }

        $input = $request->all();
        $data_file = [];

        if ($request->hasFile('layout_file')) {
            $file_name = \Storage::put('layouts', $request->file('layout_file'));
            $content = \Storage::get($file_name);
            $data_file = ['file_path' => $file_name, 'content' => $content];
        }


        $data = $data_file + ['user_id' => auth()->user()->id] + $input;

        $layout = $this->layoutRepository->update($data, $id);

        Flash::success('Layout updated successfully.');

        return redirect(route('layouts.index'));
    }

    /**
     * Remove the specified Layout from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $layout = $this->layoutRepository->find($id);

        if (empty($layout)) {
            Flash::error('Layout not found');

            return redirect(route('layouts.index'));
        }

        $this->layoutRepository->delete($id);

        Flash::success('Layout deleted successfully.');

        return redirect(route('layouts.index'));
    }
}
