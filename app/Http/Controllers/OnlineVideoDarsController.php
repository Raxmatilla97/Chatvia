<?php

namespace App\Http\Controllers;

use Flash;
use Illuminate\Support\Carbon;
use Response;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\OnlineVideoDars;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AppBaseController;
use App\Repositories\OnlineVideoDarsRepository;
use App\Http\Requests\CreateOnlineVideoDarsRequest;
use App\Http\Requests\UpdateOnlineVideoDarsRequest;

class OnlineVideoDarsController extends AppBaseController
{
    /** @var  OnlineVideoDarsRepository */
    private $onlineVideoDarsRepository;

    public function __construct(OnlineVideoDarsRepository $onlineVideoDarsRepo)
    {
        $this->onlineVideoDarsRepository = $onlineVideoDarsRepo;
    }

    /**
     * Display a listing of the OnlineVideoDars.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $onlineVideoDars = $this->onlineVideoDarsRepository->all();

        return view('online_video_dars.index')
            ->with('onlineVideoDars', $onlineVideoDars);
    }

    /**
     * Show the form for creating a new OnlineVideoDars.
     *
     * @return Response
     */
    public function create()
    {
        return view('online_video_dars.create');
    }

    /**
     * Store a newly created OnlineVideoDars in storage.
     *
     * @param CreateOnlineVideoDarsRequest $request
     *
     * @return Response
     */
    public function store(CreateOnlineVideoDarsRequest $request)
    {
        $test = "2023-03-17 17:00";
        $test = Carbon::parse($test);
        $formattedDate = $test;

        // The specified time
        $specifiedTime = "$formattedDate";

        // Parse the specified time using Carbon
        $specifiedTime = Carbon::parse($specifiedTime);

        // The current time
        $currentTime = Carbon::now();

        // Find the difference in hours between the specified time and the current time, with a 3-hour grace period before the start time
        $diffInHours = $currentTime->diffInHours($specifiedTime, false) + 3;
        
        // Check if the specified time has passed, with a 3-hour grace period before the start time
        // if ($diffInHours >= 0) {
        //     echo "Bu vebinar tugagan!";
        // } else if ($diffInHours > -3) {
        //     echo "Vebinar boshlangan!";
        // } else {
        //     echo "Hali vebinar boshlanmagan!";
        // }

        if($currentTime < $test){
            echo "true";
        }
        else{
            echo  "false";
        }

        dd($currentTime );

        $request['slug'] = date('His').'-'.Str::slug($request->title);       
        $request['user_id'] = Auth::user()->id;
        $jit = "https://meet.jit.si/". $request['slug'];
        $request['jit_meet_url'] = $jit;  
        
        $input = $request->all();
        
        if ($image = $request->file('img')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['img'] = "$profileImage";
        }  

       
        
        OnlineVideoDars::create($input);


        Flash::success('Online Video Dars saved successfully.');

        return redirect(route('onlineVideoDars.index'));
    }

    /**
     * Display the specified OnlineVideoDars.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $onlineVideoDars = $this->onlineVideoDarsRepository->find($id);

        if (empty($onlineVideoDars)) {
            Flash::error('Online Video Dars not found');

            return redirect(route('onlineVideoDars.index'));
        }

        return view('online_video_dars.show')->with('onlineVideoDars', $onlineVideoDars);
    }

    /**
     * Show the form for editing the specified OnlineVideoDars.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $onlineVideoDars = $this->onlineVideoDarsRepository->find($id);

        if (empty($onlineVideoDars)) {
            Flash::error('Online Video Dars not found');

            return redirect(route('onlineVideoDars.index'));
        }

        return view('online_video_dars.edit')->with('onlineVideoDars', $onlineVideoDars);
    }

    /**
     * Update the specified OnlineVideoDars in storage.
     *
     * @param int $id
     * @param UpdateOnlineVideoDarsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOnlineVideoDarsRequest $request)
    {
        $onlineVideoDars = $this->onlineVideoDarsRepository->find($id);

        if (empty($onlineVideoDars)) {
            Flash::error('Online Video Dars not found');

            return redirect(route('onlineVideoDars.index'));
        }

        $onlineVideoDars = $this->onlineVideoDarsRepository->update($request->all(), $id);

        Flash::success('Online Video Dars updated successfully.');

        return redirect(route('onlineVideoDars.index'));
    }

    /**
     * Remove the specified OnlineVideoDars from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $onlineVideoDars = $this->onlineVideoDarsRepository->find($id);

        if (empty($onlineVideoDars)) {
            Flash::error('Online Video Dars not found');

            return redirect(route('onlineVideoDars.index'));
        }

        $this->onlineVideoDarsRepository->delete($id);

        Flash::success('Online Video Dars deleted successfully.');

        return redirect(route('onlineVideoDars.index'));
    }
}
