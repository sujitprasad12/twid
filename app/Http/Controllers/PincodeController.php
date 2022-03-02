<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Pincode;
use Illuminate\Http\Request;
use App\Jobs\ProcessPincode;

class PincodeController extends Controller {

	public function index() {
		$pincodes = Pincode::paginate(20);
		return view('index',compact('pincodes'));
	}

	public function upload(Request $request) {
		if($request->file) {
			$this->chunkFiles($request); 
		}
		return redirect()->back()->with('message', 'Upload process initiated! Refresh to see the progress');
	}

	public function chunkFiles($request) {
		$data =  file($request->file);
		$chunks = array_chunk($data, 1000);
		foreach($chunks as $key => $chunk) {
			$data = array_map('str_getcsv', $chunk);
			if($key == 0) {
				unset($data[0]);
			}
			try {
				ProcessPincode::dispatch($data)->delay(now()->addSeconds(5));
			} catch(\Exception $e) {
				ProcessPincode::dispatch(array_map('utf8_encode', $chunk))->delay(now()->addSeconds(5));
			}
		}
		return true;
	}

}