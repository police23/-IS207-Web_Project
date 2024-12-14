<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    //
    public function redirectToVNPAY(Request $request) {
        

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('payment.vnpay.return');
        $vnp_TmnCode = "FSEMW1B4";//Mã website tại VNPAY 
        $vnp_HashSecret = "E541SXW6EEK6VH2Z9USSUTT4ICNZW9CC"; //Chuỗi bí mật
        
        $vnp_TxnRef = uniqid();; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán đơn hàng #' . $vnp_TxnRef;
        $vnp_OrderType = "adsdas";
        $vnp_Amount = session('total_price') * 100; // VNPay yêu cầu đơn vị là đồng
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = request()->ip();

        // //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];
        // //Billing
        // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
        // $vnp_Bill_Email = $_POST['txt_billing_email'];
        // $fullName = trim($_POST['txt_billing_fullname']);
        // if (isset($fullName) && trim($fullName) != '') {
        //     $name = explode(' ', $fullName);
        //     $vnp_Bill_FirstName = array_shift($name);
        //     $vnp_Bill_LastName = array_pop($name);
        // }
        // $vnp_Bill_Address=$_POST['txt_inv_addr1'];
        // $vnp_Bill_City=$_POST['txt_bill_city'];
        // $vnp_Bill_Country=$_POST['txt_bill_country'];
        // $vnp_Bill_State=$_POST['txt_bill_state'];
        // // Invoice
        // $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
        // $vnp_Inv_Email=$_POST['txt_inv_email'];
        // $vnp_Inv_Customer=$_POST['txt_inv_customer'];
        // $vnp_Inv_Address=$_POST['txt_inv_addr1'];
        // $vnp_Inv_Company=$_POST['txt_inv_company'];
        // $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
        // $vnp_Inv_Type=$_POST['cbo_inv_type'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            // "vnp_ExpireDate"=>$vnp_ExpireDate,
            // "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
            // "vnp_Bill_Email"=>$vnp_Bill_Email,
            // "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
            // "vnp_Bill_LastName"=>$vnp_Bill_LastName,
            // "vnp_Bill_Address"=>$vnp_Bill_Address,
            // "vnp_Bill_City"=>$vnp_Bill_City,
            // "vnp_Bill_Country"=>$vnp_Bill_Country,
            // "vnp_Inv_Phone"=>$vnp_Inv_Phone,
            // "vnp_Inv_Email"=>$vnp_Inv_Email,
            // "vnp_Inv_Customer"=>$vnp_Inv_Customer,
            // "vnp_Inv_Address"=>$vnp_Inv_Address,
            // "vnp_Inv_Company"=>$vnp_Inv_Company,
            // "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
            // "vnp_Inv_Type"=>$vnp_Inv_Type
        );
        
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }
        
        //var_dump($inputData);
        ksort($inputData);
    $query = http_build_query($inputData);
    $vnpSecureHash = hash_hmac('sha512', $query, $vnp_HashSecret);
    $vnp_Url .= '?' . $query . '&vnp_SecureHash=' . $vnpSecureHash;

    return redirect()->to($vnp_Url);
        // ksort($inputData);
        // $query = "";
        // $i = 0;
        // $hashdata = "";
        // foreach ($inputData as $key => $value) {
        //     if ($i == 1) {
        //         $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        //     } else {
        //         $hashdata .= urlencode($key) . "=" . urlencode($value);
        //         $i = 1;
        //     }
        //     $query .= urlencode($key) . "=" . urlencode($value) . '&';
        // }
        
        // $vnp_Url = $vnp_Url . "?" . $query;
        // if (isset($vnp_HashSecret)) {
        //     $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
        //     $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        // }
        
        // $returnData = array('code' => '00'
        //     , 'message' => 'success'
        //     , 'data' => $vnp_Url);
        //     if (isset($_POST['redirect'])) {
        //         header('Location: ' . $vnp_Url);
        //         die();
        //     } else {
        //         echo json_encode($returnData);
            // vui lòng tham khảo thêm tại code demo
        }

        public function handleVNPAYReturn(Request $request)
{
    $vnp_HashSecret = "E541SXW6EEK6VH2Z9USSUTT4ICNZW9CC"; // Chuỗi bí mật từ VNPay
    $inputData = $request->all();
    // dd($inputData);
    $vnp_SecureHash = $inputData['vnp_SecureHash'];
    unset($inputData['vnp_SecureHash']);

    ksort($inputData);
    $query = http_build_query($inputData);
    $calculatedHash = hash_hmac('sha512', $query, $vnp_HashSecret);
    if ($calculatedHash !== $vnp_SecureHash) {
    dd('Hash không khớp', $calculatedHash, $vnp_SecureHash);
}
    if ($calculatedHash === $vnp_SecureHash && $inputData['vnp_ResponseCode'] === '00') {
        // Thanh toán thành công -> Tạo đơn hàng
        DB::transaction(function () {
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_price' => session('total_price'),
                'status' => 'Ordered',
                'delivery_address' => session('delivery_address'),
                'payment_method' => 'bank_transfer',
            ]);

            // Lưu chi tiết đơn hàng
            foreach (session('cart_items') as $item) {
                OrderDetails::create([
                    'order_id' => $order->order_id,
                    'phone_variant_id' => $item['phone_variant_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            // Xóa giỏ hàng
            Cart::where('user_id', Auth::id())->delete();
        });

        return redirect()->route('order.confirmation')->with('success', 'Thanh toán thành công!');
    } else {
        // Thanh toán thất bại
        
        return redirect()->route('cart.index')->with('error', 'Thanh toán thất bại. Vui lòng thử lại.');
    }
}

}
