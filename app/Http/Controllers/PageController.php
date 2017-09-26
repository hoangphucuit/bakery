<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use Illuminate\Http\Request;
use App\ProductType;
use App\Http\Requests;
use App\Cart;
use App\Bill;
use App\Customer;
use App\BillDetail;
use Session;
use DB;
class PageController extends Controller
{
    //
    public function getIndex(){
        //truyen bien slide
        $slide=Slide::all();
        $san_pham_moi=Product::where('new',1)->get();
        
        $san_pham_km=Product::where('promotion_price','<>','0')->paginate(8);

        $sl_spkm=Product::where('promotion_price','<>','0')->count();
        return view('page.trangchu',compact('slide','san_pham_moi','sl_spm','san_pham_km','sl_spkm'));
    }
    
    public function getChitietsanpham($id){
        $san_pham_km=Product::where('promotion_price','<>','0')->limit(4)->offset(4)->get();
         
        
        $ct_san_pham=Product::where('id',$id)->first();
        $sp_tuong_tu=Product::where('id_type',$ct_san_pham->id_type)->paginate(3);
         $san_pham_moi=Product::where('new',1)->limit(4)->offset(4)->get();

    	return view('page.chi_tiet_san_pham',compact('ct_san_pham','sp_tuong_tu','san_pham_km','san_pham_moi'));
    }
    public function getGioithieu(){
    	return view('page.gioi_thieu');
    }
    public function getLienhe(){
    	return view('page.lien_he');
    }
    public function getLoaisp($id){
        $loai_sp=ProductType::all();
        $ten_loai=ProductType::where('id',$id)->first();
        $sp_theo_loai=Product::where('id_type',$id)->get();
        $sl_sp_khac=Product::where('id_type','<>',$id)->count();
        $sp_khac=Product::where('id_type','<>',$id)->paginate(6);
        return view('page.loai_san_pham',compact('loai_sp','ten_loai','sp_theo_loai','sp_khac','sl_sp_khac','ten_loai'));
    }
    public function getThemgiohang(Request $req,$id)
    {
        $san_pham=Product::find($id);//kiem tra xem id do co sp hay khong
        $oldcart=Session('cart')?Session::get('cart'):null;
        $cart=new Cart($oldcart);
        $cart->add($san_pham,$id);
        $req->session()->put('cart',$cart);//them bien gio hang vaao session
        return redirect()->back();//tro ve trang chu
    }

    public function getXoasanpham($id)
    {
        if(Session('cart'))//neu gio hang co sp
        {
            $oldcart=Session::get('cart');
             $cart= new Cart($oldcart);
            $cart->removeItem($id);//tien hanh xoa
            if($cart->items!=null)//neu gio hang van con san pham
            {
                Session::put('cart',$cart);
            }
            else{
                Session::forget('cart');
            }
        }
       
        
        
         return redirect()->back();
        
        
    }
    public function getDathang(){
            if(Session('cart'))
            {
               return view('page.dat_hang'); 
            }
            
        return redirect()->back();
            
        
    }
   public function postDathang(Request $req)
    {
        $cart=Session::get('cart');

        $customer= new Customer;
        $customer->name=$req->hoten;
        $customer->gender=$req->gender;
        $customer->email=$req->email;
        $customer->address=$req->address;
        $customer->phone_number=$req->phone;
        $customer->note=$req->note;
        $customer->save();//luu vao DB
        //Luu thong tin hoa don
        $bill=new Bill;
        $bill->id_customer=$customer->id;
        $bill ->date_order=date('Y-m-d');
        $bill->total=$cart->totalPrice;
        $bill->payment=$req->payment_method;
        $bill->note=$req->note;
        $bill->save();
        //Luu bill_detail
        foreach ($cart->items as $key => $value) {
            $bill_detail=new BillDetail;
            $bill_detail->id_bill=$bill->id;
            $bill_detail->id_product=$key;
            $bill_detail->quantity=$value['qty'];
            $bill_detail->unit_price=$value['price']/$value['qty'];
            $bill_detail->save();
        }
        
        Session::forget('cart');
        //return view('page.dat-hang')->with('thong_bao','Đặt hàng thành công');
        return redirect('/index')->with('dat_hang_thanh_cong','ok');
        
    }
    public function getDangnhap()
    {
        return view('page.dang_nhap');
    }
    public function getDangki(){
        return view('page.dang_ki');
    }
    
    public function getTimkiem(Request $req){
        $key=$req->s;
        $sp_can_tim=Product::where('name','like','%'.$key.'%')->get();
        $loai_sp=ProductType::all();
        return view('page.tim',compact('key','sp_can_tim','loai_sp'));
    }
}
