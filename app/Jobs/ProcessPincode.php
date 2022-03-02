<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Pincode;

class ProcessPincode implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $pincode = [];
        foreach($this->data as $each_data) {
            $pincode[] = [
                'pincode' => utf8_encode($each_data[1]),
                'office' => utf8_encode($each_data[0]),
                'office_type' => utf8_encode($each_data[2]),
                'delivery_status' => utf8_encode($each_data[3]),
                'division' => utf8_encode($each_data[4]),
                'region' => utf8_encode($each_data[5]),
                'circle' => utf8_encode($each_data[6]),
                'taluk' => utf8_encode($each_data[7]),
                'district' => utf8_encode($each_data[8]),
                'state' => utf8_encode($each_data[9])
            ];
        }
        Pincode::insert($pincode);
    }

}
