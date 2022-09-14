<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\SubCategory;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use LivecoreInteractive\FplApi\FplApi;

class FPLController extends Controller
{
    //
    public function auth(Request $request)
    {
        # code...
        $url = "https://users.premierleague.com/accounts/login/";
        $pwd = $request->password;
        $email = $request->email;
        $redirect = 'https://fantasy.premierleague.com/a/login';
        
        $data = array(
            "password" => $pwd,
            "login" => $email,
            "redirect_uri" => $redirect,
            "app" => "plfpl-web",
        );
        
        $cookie_jar = tempnam('/tmp','coo'); 
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://users.premierleague.com/accounts/login/',
            CURLOPT_COOKIEJAR => $cookie_jar,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                'Cookie: datadome=.GKwiWW-j~0UIXw5iJY6ZGqz35MtjlwbOPtS9ilmx781yre~VLA~ryf2YjhUh.vBsY.jwVuCijwP4aseKWMHu6J8txlVJpy9dlK8S5E.5b1L3fxXO.f6CzRYZrI.yNZ4'
            ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        // echo $response;
        
        Log::info($response);
        Log::info($cookie_jar);
        
        return $response;
        
        //MYfplID: 466450
    }
    
    public function registerDetailsView()
    {
        # code...
        // Log::info("here");
        $countries = Country::all();
        $subCat = SubCategory::all();
        
        return view('user.detailReg', compact('countries', 'subCat'));
    }
    
    public function updateOnReg(Request $request)
    {
        # code...
        Log::info($request);
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'country_code' => 'required',
            'phone_number' => 'required|unique:users,phonenumber',
            'team_name' => 'required',
            // 'fpl_id' => 'required',
            'plan' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
            // return redirect()->back()->with('error', "validation error");
        }
        
        $token = "Bearer sk_test_9e4985f86d745449f8f001ddd91c4584ee1de236";
        $firstName = $request->first_name;
        $lastName = $request->last_name;
        $email = Auth::user()->email;
        $teamName = $request->team_name;
        if($request->fpl_id){
            $fplId = $request->fpl_id;
        }
        $plan = $request->plan;
        
        $subPlan = SubCategory::where("name", $plan)->first();
        $paystackPlanId = $subPlan->paystack_id;
        
        Log::info("paystack Plan" . $paystackPlanId);
        
        $phone =$request->phone_number;
        $convert = substr($phone, -10);

        $mobilePhone = $request->country_code . $convert;
        
        Log::info($mobilePhone);
        
        //create paystack customer
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.paystack.co/customer',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('email' => $email,'first_name' => $firstName,'last_name' => $lastName,'phone' => $mobilePhone),
            CURLOPT_HTTPHEADER => array(
                'Authorization:' . $token,
            ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        Log::info($response);
        $dec = json_decode($response);
        
        if(isset($dec)){
            if($dec->status == true){
                //create paystack sub
                
                $paystackCustomerId = $dec->data->customer_code;
                
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.paystack.co/transaction/initialize',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array('email' =>$email,'amount' => "500000" ,'plan' => $paystackPlanId),
                    CURLOPT_HTTPHEADER => array(
                        'Authorization:' . $token,
                    ),
                ));
                
                $subResponse = curl_exec($curl);
                
                curl_close($curl);
                Log::info($subResponse);

                $subDec = json_decode($subResponse);
                
                if(isset($subDec)){
                    if($subDec->status == true){
                        //update user Db with details
                        // $expDate = $subDec->data->authorization->exp_month . " - " . $subDec->data->authorization->exp_year;
                        $expDate = now();
                        
                        $sub = new Subscription();
                        $sub->paystack_id = $subDec->data->reference;
                        $sub->user_id = Auth::id();
                        $sub->start_date = now();
                        $sub->due_date = Carbon::now()->addMonth();;
                        $sub->response = $subResponse;
                        $sub->save();
                        
                        $user = User::find(Auth::id());
                        $user->firstname = $firstName;
                        $user->lastname = $lastName;
                        $user->phonenumber = $mobilePhone;
                        $user->paystack_response = $response;
                        
                        if($request->fpl_id){
                            $user->fpl_id = $fplId;
                        }
                        
                        $user->paystack_customerId = $dec->data->customer_code;
                        $user->sub_payment_reference = $subDec->data->reference;
                        $user->sub_status = 1;
                        $user->regStatus = 1;
                        $user->save();
                        
                        return redirect($subDec->data->authorization_url);
                        
                    }else{
                        return redirect()->back()->with('error', "Failed to create Account, Please try again later");
                        
                    }
                }else{
                    return redirect()->back()->with('error', "Failed to create Account1, Please try again later");
                }
            }else{
                return redirect()->back()->with('error', "Failed to create Account2, Please try again later");
                
            }
        }else{
            return redirect()->back()->with('error', "Failed to create Account3, Please try again later");
            
        }                
    }
    
    public function userProfile()
    {
        # code...
        $activeSub = Subscription::where('user_id', Auth::id())->where('due_date', ">", now())->first();
        // dd($activeSub);
        return view('user.profileSettings', compact('activeSub'));
    }
    
    public function regCallbackRes()
    {
        # code...
        $token = "Bearer sk_test_9e4985f86d745449f8f001ddd91c4584ee1de236";
        $userId = Auth::id();
        $sub = Subscription::where('user_id', $userId);
        $userSub = $sub->first();
        $reference = $userSub->paystack_id;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.paystack.co/transaction/verify/' .$reference,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: '.$token,
            ),
        ));
        
        $confirmResponse = curl_exec($curl);
        curl_close($curl);
        Log::info("Payment comfirm Response" . $confirmResponse);
        $confirmDec = json_decode($confirmResponse);
        
        
        if(isset($confirmDec)){
            if($confirmDec->status == true){
            
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.paystack.co/subscription',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: Bearer sk_test_9e4985f86d745449f8f001ddd91c4584ee1de236',
                    ),
                ));
                
                $response = curl_exec($curl);
                
                curl_close($curl);
                Log::info($response);
                
                $dec = json_decode($response);
                
                if(isset($response)){
                    if($dec->status == true){
                        $sub->update(["response" => $confirmResponse]);
                        User::find($userId)->update([
                            "sub_id" => $userSub->id
                        ]);
                            
                            foreach($dec->data as $data){
                                if($data->customer->customer_code == Auth::user()->paystack_customerId){
                                    if($userSub->paystack_sub_code == NULL){
                                        $sub->update([
                                            "paystack_sub_code" => $data->subscription_code, 
                                            "plan_name" =>  $data->plan->name,   
                                            "email_token" => $data->email_token,
                                        ]);
                                    }
                                }
                            }

                        return redirect('/articles')->with('message', "Welcome");
                    }else{
                        return redirect('/articles')->with('message', "Welcome");   
                    }
                }else{
                    return redirect('/articles')->with('message', "Welcome");    
                }
            }else{
                return redirect('fplRegUserDetail')->with('error', "Failed to Subscribe user, Please try again");
            }
        }else{
            return redirect('fplRegUserDetail')->with('error', "Service down, please try again later");
        }
    }
    
    public function postImgUpload(Request $request)
    {
        # code...
        $filenamewithextension = $request->file('file')->getClientOriginalName();
        Log::info("Filenamewwithextension: " .$filenamewithextension);
        //get filename without extension
        // $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        // Log::info("filename: " .$filename);
        
        //get file extension
        $extension = $request->file('file')->getClientOriginalExtension();
        Log::info("extension: " .$extension);
        
        //filename to store
        // $filenametostore = $filename.'_'.time().'.'.$extension;
        // Log::info("filenametostore: " .$filenametostore);

        //Upload File
        $path=$request->file('file')->storeAs('uploads', $filenamewithextension, 'public');

        // $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        // Log::info("CKEditorFuncNum: " .$CKEditorFuncNum);
        
        // $url = asset('public/uploads/'.$filenametostore);
        // Log::info("url: " .$url);
        
        
        // return response()->json(['location'=>"/storage/$path"]); 
        return response()->json(['location'=>"/storage/$path"]); 
        
        /*$imgpath = request()->file('file')->store('uploads', 'public'); 
        return response()->json(['location' => "/storage/$imgpath"]);*/
    }
}
