<?php

namespace App\Http\Controllers\Admin\v1\Bank;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\SaleDetails;
use App\Models\SalePayament;
use App\Models\MasterStockInventery;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BankController extends Controller
{
    public function payment_bank_api($sale_id)
    {
        $data = Sale::with('saledetails')->where('id', $sale_id)->first();
        //return $data->saledetails[0]->product_id;
        $data->status = 'paid';
        $data->save();
        if ($data->save()) {
            $randomString =  (rand(10, 100));
            $timestamp = Carbon::now();
            $entity = new SalePayament();
            $entity->sale_id = $sale_id;
            $entity->ref_no = $randomString;
            $entity->payment_status = "pending";
            $entity->created_at = $timestamp;
            $entity->amount =  $data->total;
            $entity->save();
            if ($entity->save()) {
                foreach ($data->saledetails as $saledetail) {
                    $stockdata = [
                        'product_id' => $saledetail->product_id,
                        'store_id' => $data->store_id,
                        'storage_site_id' => $data->storage_site_id,
                        'qty' => $saledetail->qty
                    ];
                    //return $stockdata;
                    $this->masterStockManage($stockdata);
                }
                return response()->json(['success' => " SuccessFully Added "]);
            }
        }
    }

    public function masterStockManage($data)
    {
        $inventry = MasterStockInventery::where('store_id', $data['store_id'])
            ->where('product_id', $data['product_id'])
            ->where('storage_site_id', $data['storage_site_id'])
            ->where('qty', '>', 0)
            ->first();

        $inventry->update([
            'qty' => $inventry->qty - $data['qty']
        ]);
    }
}
