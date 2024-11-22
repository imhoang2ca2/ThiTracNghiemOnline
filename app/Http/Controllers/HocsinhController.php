<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class HocsinhController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index()
{
	//Lấy danh sách học sinh từ database
	$getData = DB::table('tbl_hocsinh')->select('id','tenhocsinh','sodienthoai')->get();
	
	//Gọi đến file list.blade.php trong thư mục "resources/views/hocsinh" với giá trị gửi đi tên listhocsinh = $getData
	return view('hocsinh.list')->with('listhocsinh',$getData);
}
    public function create()
    {
	//Hiển thị trang thêm học sinh
	return view('hocsinh.create');
    }
    public function edit($id)
{
	//Lấy dữ liệu từ Database với các trường được lấy và với điều kiện id = $id
	$getData = DB::table('tbl_hocsinh')->select('id','tenhocsinh','sodienthoai')->where('id',$id)->get();
	
	//Gọi đến file edit.blade.php trong thư mục "resources/views/hocsinh" với giá trị gửi đi tên getHocSinhById = $getData
	return view('hocsinh.edit')->with('getHocSinhById',$getData);
}
    public function store(Request $request)
{
	//Them moi hoc sinh
	//Set timezone
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	
	//Lấy giá trị học sinh đã nhập
	$allRequest  = $request->all();
	$tenhocsinh  = $allRequest['tenhocsinh'];
	$sodienthoai = $allRequest['sodienthoai'];
	
	//Gán giá trị vào array
	$dataInsertToDatabase = array(
		'tenhocsinh'  => $tenhocsinh,
		'sodienthoai' => $sodienthoai,
		'created_at' => date('Y-m-d H:i:s'),
		'updated_at' => date('Y-m-d H:i:s'),
	);
	
	//Insert vào bảng tbl_hocsinh
	$insertData = DB::table('tbl_hocsinh')->insert($dataInsertToDatabase);
	
	//Kiểm tra Insert để trả về một thông báo
	if ($insertData) {
		Session::flash('success', 'Thêm mới học sinh thành công!');
	}else {                        
		Session::flash('error', 'Thêm thất bại!');
    }
    
    
	//Thực hiện chuyển trang
    return redirect('hocsinh/create');
    
    
}
}
