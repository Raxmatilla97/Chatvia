<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\AppBaseController;
use App\Repositories\OnlineVideolarRepository;
use App\Http\Requests\CreateOnlineVideolarRequest;
use App\Http\Requests\UpdateOnlineVideolarRequest;

class OnlineVideolarController extends AppBaseController
{
    /** @var  OnlineVideolarRepository */
    private $onlineVideolarRepository;

    public function __construct(OnlineVideolarRepository $onlineVideolarRepo)
    {
        $this->onlineVideolarRepository = $onlineVideolarRepo;
    }

    /**
     * Display a listing of the OnlineVideolar.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $onlineVideolars = $this->onlineVideolarRepository->all();

        return view('online_videolars.index')
            ->with('onlineVideolars', $onlineVideolars);
    }

    /**
     * Show the form for creating a new OnlineVideolar.
     *
     * @return Response
     */
    public function create()
    {
        return view('online_videolars.create');
    }

    /**
     * Store a newly created OnlineVideolar in storage.
     *
     * @param CreateOnlineVideolarRequest $request
     *
     * @return Response
     */
    public function store(CreateOnlineVideolarRequest $request)
    {
        $input = $request->all();

        $onlineVideolar = $this->onlineVideolarRepository->create($input);

        Flash::success('Online Videolar saved successfully.');

        return Redirect::back();
    }

    /**
     * Display the specified OnlineVideolar.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $onlineVideolar = $this->onlineVideolarRepository->find($id);

        if (empty($onlineVideolar)) {
            Flash::error('Online Videolar not found');

            return redirect(route('onlineVideolars.index'));
        }

        return view('online_videolars.show')->with('onlineVideolar', $onlineVideolar);
    }

    /**
     * Show the form for editing the specified OnlineVideolar.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $onlineVideolar = $this->onlineVideolarRepository->find($id);

        if (empty($onlineVideolar)) {
            Flash::error('Online Videolar not found');

            return redirect(route('onlineVideolars.index'));
        }

        return view('online_videolars.edit')->with('onlineVideolar', $onlineVideolar);
    }

    /**
     * Update the specified OnlineVideolar in storage.
     *
     * @param int $id
     * @param UpdateOnlineVideolarRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOnlineVideolarRequest $request)
    {
        $onlineVideolar = $this->onlineVideolarRepository->find($id);

        if (empty($onlineVideolar)) {
            Flash::error('Online Videolar not found');

            return redirect(route('onlineVideolars.index'));
        }

        $onlineVideolar = $this->onlineVideolarRepository->update($request->all(), $id);

        Flash::success('Online Videolar updated successfully.');

        return Redirect::back();
    }

    /**
     * Remove the specified OnlineVideolar from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $onlineVideolar = $this->onlineVideolarRepository->find($id);

        if (empty($onlineVideolar)) {
            Flash::error('Video topilmadi');

            return redirect(route('onlineVideolars.index'));
        }

        $this->onlineVideolarRepository->delete($id);

        Flash::success("Video o'chirildi!");

        return Redirect::back();
    }
}
