<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = DB::table('cars')->paginate(5);
        return view('index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Car_reg_no = $request->get('Car_reg_no');
        $Car_maker = $request->get('Car_Maker');
        $Cust_name = $request->get('Cust_Name');
        $Cust_adr = $request->get('Cust_Adr');
        $Cust_tele = $request->get('Cust_Tele');
        $cars = DB::insert('insert into cars(Car_reg_no, Car_Maker, Cust_Name, Cust_Adr, Cust_Tele) value(?,?,?,?,?)', [$Car_reg_no, $Car_maker, $Cust_name, $Cust_adr, $Cust_tele] );
        if($cars){
            $red = redirect('cars')->with('success', 'Car has been added');
        }else{
            $red = redirect('cars/create')-with('danger', 'Input car failed, please try again');
        }
        return $red;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cars = DB::select('select * from cars where id=?',[$id]);
        return view('show', ['cars' => $cars]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cars = DB::select('select * from cars where id=?', [$id]);
        return view('edit', ['cars' => $cars]);
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
        $Cust_name = $request->get('Cust_Name');
        $Cust_adr = $request->get('Cust_Adr');
        $Cust_tele = $request->get('Cust_Tele');
        $cars = DB::update('update cars set Cust_Name=?, Cust_Adr=?, Cust_Tele=? where id=?',[$Cust_name, $Cust_adr, $Cust_tele, $id]);
        if($cars){
            $red = redirect('cars')->with('success', 'Data has been updated!');
        }else{
            $red = redirect('cars/edit/' .$id)->with('danger', 'Error update please try again');
        }
        return $red;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cars = DB::delete('delete from cars where id=?',[$id]);
        $red = redirect('cars');
        return $red;
    }
}
