<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class HardwaresController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $hardwares = \App\Hardware::all();


        return view('hardwares', compact('hardwares'));
    }

    public function hardwareData(Request $request)
    {

            $columns = array(
                0 =>'ID',
                1 =>'LABEL_HARDWARE',
                2 =>'GSM_NUMBER',
                2 =>'ID'
            );

            $totalData = \App\Hardware::count();

            $totalFiltered = $totalData;

            $limit = $request->input('length');
            $start = $request->input('start');
            $order = $columns[$request->input('order.0.column')];
            $dir = $request->input('order.0.dir');

            if(empty($request->input('search.value')))
            {
            $posts = \App\Hardware::offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get();
            }
            else {
            $search = $request->input('search.value');

            $posts =  \App\Hardware::Where('LABEL_HARDWARE', 'LIKE',"%{$search}%")
                            ->orWhere('GSM_NUMBER', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = \App\Hardware::Where('LABEL_HARDWARE', 'LIKE',"%{$search}%")
                            ->orWhere('GSM_NUMBER', 'LIKE',"%{$search}%")
                            ->count();
            }

            $data = array();
            if(!empty($posts))
            {
            $i = 1;
            foreach ($posts as $post)
            {
                // $show =  route('hardwares.show',$hardwares->id);
                // $edit =  route('hardwares.edit',$hardwares->id);

                $nestedData['NO'] = $i;
                $nestedData['LABEL HARDWARE'] = $post->LABEL_HARDWARE;
                $nestedData['GSM NUMBER'] = $post->GSM_NUMBER;
                $nestedData['ACTIONS'] = "&emsp;<a title='EDIT' class='edit' style='cursor: pointer;' data-id='$post->ID'><span class='glyphicon glyphicon-edit'></span></a>
                                          &emsp;<a title='DELETE' class='delete' data-id='$post->ID' ><span class='glyphicon glyphicon-trash'></span></a>
                                          &emsp;<a title='DETAIL' class='detail' style='cursor: pointer;' data-id='$post->ID'><span class='glyphicon glyphicon-list'></span></a>";
                 $data[] = $nestedData;
                 $i++;

            }
            }

            $json_data = array(
                    "draw"            => intval($request->input('draw')),
                    "recordsTotal"    => intval($totalData),
                    "recordsFiltered" => intval($totalFiltered),
                    "data"            => $data
                    );

            echo json_encode($json_data);
    }

    public function hardwareDataDetail(Request $request){
		$id=$request->input('id');
		$get = \App\Hardware::Where('ID',$id)->get();

			foreach($get as $row){
            $result['LABEL_HARDWARE'] = $row->LABEL_HARDWARE;
            $result['GSM_NUMBER'] = $row->GSM_NUMBER;
            $result['CHAR_HARDWARE'] = $row->CHAR_HARDWARE;
            }
			echo json_encode($result);

    }

    public function detailHardwareData(Request $request)
    {

        $id=$request->input('id');
		$get = \App\Notification::Where('ID_HARDWARE',$id)->get();


            $columns = array(
                0 =>'ID',
                1 =>'created_at',
                2 =>'NOTIF'
            );

            $totalData = count($get);

            $totalFiltered = $totalData;

            $limit = $request->input('length');
            $start = $request->input('start');
            $order = $columns[$request->input('order.0.column')];
            $dir = $request->input('order.0.dir');

            if(empty($request->input('search.value')))
            {
            $posts = \App\Notification::Where('ID_HARDWARE',$id)
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get();
            }
            else {
            $search = $request->input('search.value');

            $posts =  \App\Hardware::Where('created_at', 'LIKE',"%{$search}%")
                            ->orWhere('NOTIF', 'LIKE',"%{$search}%")
                            ->andWhere('ID_HARDWARE',$id)
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = \App\Hardware::Where('created_at', 'LIKE',"%{$search}%")
                            ->orWhere('NOTIF', 'LIKE',"%{$search}%")
                            ->andWhere('ID_HARDWARE',$id)
                            ->count();
            }

            $data = array();
            if(!empty($posts))
            {
            $i = 1;
            foreach ($posts as $post)
            {
                // $show =  route('hardwares.show',$hardwares->id);
                // $edit =  route('hardwares.edit',$hardwares->id);

                $nestedData['NO'] = $i;
                $nestedData['DATE'] = $post->created_at;
                $nestedData['AKTIVITAS'] = $post->NOTIF;

                $data[] = $nestedData;
                 $i++;

            }
            }

            $json_data = array(
                    "draw"            => intval($request->input('draw')),
                    "recordsTotal"    => intval($totalData),
                    "recordsFiltered" => intval($totalFiltered),
                    "data"            => $data
                    );

            echo json_encode($json_data);
    }

    public function addHardware(Request $request)
    {
        $add_Hardware = new \App\Hardware();
        $add_Hardware->SLUG = 'slug-'.$request->input('inputLabelHardware');
        $add_Hardware->LABEL_HARDWARE = $request->input('inputLabelHardware');
        $add_Hardware->GSM_NUMBER = $request->input('inputGsmNumber');
        $add_Hardware->CHAR_HARDWARE = $request->input('status');
		$add_Hardware->save();

       return redirect()->back();
    }

    public function editHardware(Request $request, $id)
    {
        $edit_Hardware = \App\Hardware::find($id);
		$edit_Hardware->SLUG = 'slug-'.$id;
        $edit_Hardware->LABEL_HARDWARE = $request->input('inputLabelHardware2');
        $edit_Hardware->GSM_NUMBER = $request->input('inputGsmNumber2');
        $edit_Hardware->CHAR_HARDWARE = $request->input('status2');
		$edit_Hardware->save();

        return redirect()->back();
    }
	public function deleteHardware($id)
	{
		$del_Hardware = \App\Hardware::find($id);
		$del_Hardware->delete();

		return response()->json([

            'success' => 'Record deleted successfully!'

        ]);
	}
}
