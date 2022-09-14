<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function subscriptionPlans()
    {
        # code...
        return view('plans');
    }
    
    public function createSubPlanView()
    {
        # code...
        return view('admin.subscription.createSubPlan');
    }
    
    public function createSubPlan(Request $request)
    {
        # code...
        Log::info($request);
        $validator = Validator::make($request->all(), [
            'plan_name' => 'required|unique:subscription_categories,name',
            'payment_interval' => 'required',
            'amount' => 'required|min:1',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            // return redirect()->back()->with('error', "validation error");
            return redirect()->back()->withErrors($validator);
        }
        
        $amount = $request->amount * 100;
        Log::info("amount: " . $amount);
        
        // try{
            $curl = curl_init();
            
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.paystack.co/plan',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array('name' => $request->plan_name,'interval' => $request->payment_interval,'amount' => $amount),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer sk_test_9e4985f86d745449f8f001ddd91c4584ee1de236',
                    ),
                ));
            
                $response = curl_exec($curl);
                
                Log::info($response);
                
                curl_close($curl);
                
                $dec = json_decode($response);
                
                if(isset($dec)){
                    if($dec->status == true){
                        
                        $subCat = new SubCategory();
                        $subCat->name = $dec->data->name;
                        $subCat->payment_interval = $dec->data->interval;
                        $subCat->amount = $request->amount;
                        $subCat->paystack_id = $dec->data->plan_code;
                        $subCat->description = $request->description;
                        $subCat->creator_id = Auth::guard('admin')->user()->id;
                        $subCat->response = $response;
                        $subCat->save();
                        
                        return redirect()->back()->with("success", "Plan Successfully created");
                    }else{
                        return redirect()->back()->with("error", "Failed to create plan");
                        
                    }
                }else{
                    return redirect()->back()->with("error", "Failed to create plan");
                    
                }
            // } catch (Exception $e) {
            //     Log::debug($e->getMessage());
            //     return response()->json([
            //         'message' => "Technical Error!",
            //         'status' => '600',
            //     ]);
            // }
    }
    
    public function viewSubPlans()
    {
        # code...
        $subPlans = SubCategory::all();
        return view('admin.subscription.viewPlans', compact('subPlans'));
    }
    
    public function deactivatePlan($id)
    {
        # code...
        Log::info($id);
        
        $sub = Subscription::where("id",$id);
        
        $userSub = $sub->first();
        // dd($userSub);
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.paystack.co/subscription/disable',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('code' => $userSub->paystack_sub_code,'token' => $userSub->email_token),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer sk_test_9e4985f86d745449f8f001ddd91c4584ee1de236',
            ),
        ));

        $response = curl_exec($curl);
        Log::info($response);
        
        curl_close($curl);
        
        $dec = json_decode($response);
        
        if(isset($response)){
            if($dec->status == true){
                User::find(Auth::id())->update([
                    "sub_status" => 0,
                ]);
                $sub->update([
                    "status" => 0,
                    "response" => $response,
                ]);
                
                return redirect()->back()->with("message", "Plan Successfully Deactivated");
                
            }else{
                return redirect()->back()->with("error", "Failed to Deactivate Plan");
                
            }
        }else{
            return redirect()->back()->with("error", "Service Down, please try again later");
            
        }
    }
    
    public function activatePlanView()
    {
        # code...
        $plans = SubCategory::all();
        return view('user.settings.activatePlan', compact('plans'));
    }
    
    public function activatePlan(Request $request)
    {
        # code...
        Log::info($request);
        $curl = curl_init();
        
        $plan = SubCategory::where('name', $request->plan)->first();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.paystack.co/subscription',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => array('customer' => Auth::user()->paystack_customerId,'plan' => $plan->paystack_id),
          CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer sk_test_9e4985f86d745449f8f001ddd91c4584ee1de236'
          ),
        ));
        
        $response = curl_exec($curl);
        Log::info($response);
        
        curl_close($curl);
        
        $dec = json_decode($response);
        
        if(isset($response)){
            if($dec->status == true){
                $sub = new Subscription();
                $sub->paystack_id = $dec->data->subscription_code;
                $sub->user_id = Auth::id();
                $sub->start_date = now();
                $sub->due_date = Carbon::now()->addMonth();
                $sub->response = $response;
                $sub->paystack_sub_code =$dec->data->subscription_code;
                $sub->email_token = $dec->data->email_token;
                $sub->plan_name = $dec->data->domain;
                $sub->save();
                
                return redirect('/profile')->with('message', 'You have Successfully Subscribed');
            }else{
                return redirect()->back()->with('error', 'Subscribed Failed');
                
            }
        }else{
            return redirect()->back()->with('error', 'Service down, please try again later');
            
        }
    }
    
    // public function activatePlan($id)
    // {
    //     # code...
    //     Log::info($id);
    //     $sub = Subscription::where("id", $id);
    //     $userSub = $sub->first();
        
    //     // dd($userSub);
        
    //     $curl = curl_init();

    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => 'https://api.paystack.co/subscription/enable',
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'POST',
    //         CURLOPT_POSTFIELDS => array('code' => $userSub->paystack_sub_code,'token' => $userSub->email_token),
    //         CURLOPT_HTTPHEADER => array(
    //             'Authorization: Bearer sk_test_9e4985f86d745449f8f001ddd91c4584ee1de236',
    //         ),
    //     ));

    //     $response = curl_exec($curl);
    //     Log::info($response);
        
    //     curl_close($curl);
        
    //     $dec = json_decode($response);
        
    //     if(isset($response)){
    //         if($dec->status == true){
    //             User::find(Auth::id())->update([
    //                 "sub_status" => 1,
    //             ]);
    //             $sub->update([
    //                 "status" => 1,
    //                 "response" => $response,
    //             ]);
                
    //             return redirect()->back()->with("message", "Plan Successfully Activated");
                
    //         }else{
    //             return redirect()->back()->with("error", "Failed to Activate Plan");
                
    //         }
    //     }else{
    //         return redirect()->back()->with("error", "Service Down, please try again later");
            
    //     }
    // }
}
