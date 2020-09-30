<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessBatch;
use App\Models\Batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{
	private $validationArr = [
		'name' => 'required|unique:batches,name',
		'start_date' => 'required|date|date_format:Y-m-d|after:yesterday',
	];
    public function index()
    {
    	$batches = Batch::orderBy('start_date', 'DESC')->paginate(20);
    	return view('batches', ['batches' => $batches]);
    }

    public function Create(Request $request)
    {
    	if($request->isMethod('post')){
		    $request->validate($this->validationArr);

		    $batch = Batch::create([
		    	'name' => $request->name,
			    'start_date' => $request->start_date
		    ]);

		    return $this->FinaliseBatch($batch);
	    }
    	return view('create-batch');
    }

    public function Edit(Request $request, $id)
    {
	    $batch = Batch::where('id', $id)->firstOrFail();

    	if($request->isMethod('post')){
		    $request->validate($this->validationArr);

		    $now = \Carbon\Carbon::now();
		    $isStarted = $now->lt($batch->start_date) ? false : true;
		    /**
		     * Disable edit after batch has started
		     */
		    if($isStarted) return response()->json(['message' => 'Batch cannot be edited'], 403);

		    /**
		     * Update batch
		     */
		    $batch = Batch::find($id);
		    $batch->name = $request->name;
		    $batch->start_date = $request->start_date;
		    $batch->save();
		    return $this->FinaliseBatch($batch);
	    }
    	return view('edit-batch', ['batch' => $batch]);
    }

    private function FinaliseBatch(Batch $batch)
    {
	    ProcessBatch::dispatch($batch->start_date, $batch)->delay($batch->start_date);

	    return response()->json(['message' => 'Successful']);
    }
}
