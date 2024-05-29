<?php

namespace App\Http\Controllers;

use App\Mail\SuccessEmail;
use Illuminate\Http\Request;
use App\Models\Seat;
use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Showtime;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $booking = Booking::with([
            'user',
            'showtime.movie',
            'showtime.theater',
            'seat'
        ])->paginate(10);

        // Kiểm tra nếu không có dữ liệu đặt chỗ


        return view('admin.booking.booking', compact('booking'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function confirm($showtimeId)
    {
        $selectedSeats = session('selectedSeats', []);

        $seats = Seat::whereIn('id', $selectedSeats)->get();

        $showtime = Showtime::with(['theater', 'movie'])->findOrFail($showtimeId);
        $Price = $seats->sum('price');
        $totalPrice=$Price+100;

        return view('page.confirm', compact('showtime', 'seats','totalPrice','Price'));
    }



    public function bookAndShowSuccess(Request $request, $showtimeId)
{
    $showtime = Showtime::findOrFail($showtimeId);
    $selectedSeats = session('selectedSeats', []);
    $userId = Auth::id();
    $toEmail = 'buidanhnhan0693@gmail.com';
    $message = 'Hello';
    $subject = 'Welcome';
    $token = Str::random(32);
    $filename = $this->generateQRCode($token);

    foreach ($selectedSeats as $seatId) {
        $booking=Booking::create([
            'showtime_id' => $showtimeId,
            'seat_id' => $seatId,
            'user_id' => $userId,
            'qr_code_path' => $filename
        ]);

        // Lưu đường dẫn mã QR vào bảng dữ liệu booking (nếu cần)

        $booking->save();
        Seat::where('id', $seatId)->update(['status' => 1]);
    }

    // Gửi email
    Mail::to($toEmail)->send(new SuccessEmail($message, $subject, public_path('qrcodes/' . $filename)));

    $request->session()->forget('selectedSeats');

    $showtime = Showtime::with(['bookings.user', 'bookings.showtime.movie'])->where('id', $showtimeId)->first();

    $totalPrice = 0; // Initialize with base price or other initial value
    foreach ($showtime->bookings as $booking) {
        if ($booking->seat) {
            $totalPrice += $booking->seat->price;
        }
    }

    return view('page.success', compact('showtime', 'totalPrice'));
}

private function generateQRCode($token)
{
    // Tạo dữ liệu cho mã QR
    $data = ['token' => $token];

    // Tạo tên tệp QR
    $filename = $token . '.png';

    // Tạo và lưu mã QR vào đường dẫn đã chỉ định
    QrCode::format('png')->size(200)->generate(json_encode($data), public_path('qrcodes/' . $filename));

    // Trả về tên tệp QR
    return $filename;
}

    public function vnpay_payment($showtimeId,Request $request){
        $data=$request->all();
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('book.success',['showtimeId'=>$showtimeId]);
        $vnp_TmnCode = "YTC79WFI";//Mã website tại VNPAY
        $vnp_HashSecret = "A3NLHBJ39UVXOT2C0LING8D5A3YIDY1U"; //Chuỗi bí mật

        $vnp_TxnRef = time();
        $vnp_OrderInfo = 'Thanh toán vé xem phim.';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $data['total'] *100;
        // dd($vnp_Amount);
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing

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
            // "vnp_ExpireDate"=>$vnp_ExpireDate

        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
            // vui lòng tham khảo thêm tại code demo

        }
}


