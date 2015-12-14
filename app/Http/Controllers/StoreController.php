<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    /**
     * SHOW STORE LISTING
     */
     public function getIndex()
     {
         return view('stores.show');
     }

     /*
     * CREATE NEW STORE
     */
     public function getCreateStore()
     {

         return view('stores.createstore');
     }

     /*
     * PROCESS FORM TO CREATE NEW STORE LIST
     */
     public function postCreateStore(Request $request)
     {
         //Validate the request for the required feilds
         $this->validate(
             $request,
             [
                 'store_name' => 'required',
             ]
         );

         //get the store name from request and add to the database
         $store = new \App\Store();
         $store->store_name=$request->store_name;
         $store->save();

         //show the flash message and redirect page
         \Session::flash('flash_message', 'New Store is Created in the list!');

         return redirect('/store');
     }

     /**
      * EDIT STORE DETAIL
      */
     public function getEdit($id)
     {
         $store = \App\Store::find($id);
         return view('stores.editstore')->with('store',$store);
     }

     /*
     * PROCESS FORM TO EDIT STORE DETAIL
     */
     public function postEdit(Request $request)
     {
         //Validate the request for the required feilds
         $this->validate(
             $request,
             [
                 'store_name' => 'required',
             ]
         );

         $store = \App\Store::find($request->id);
        $store->store_name=$request->store_name;
        $store->save();

        \Session::flash('flash_message', 'Store detail updated.');

        return redirect('/store');
     }

     public function getItems($id=null) {
         $items = \App\Item::where('store_id','=',$id)->orderBy('item_name','ASC')->get();

         return view ('stores.show')
            ->with('items',$items)
            ->with('store_id',$id);
     }

     public function getCreateItem($id=null)
     {

        $store = \App\Store::find($id);

        if (is_null($id)) {
            \Session::flash('flash_message', 'Store not found.');
            return redirect('\store');
        }

        return view('stores.createitem')->with('store', $store);

     }

    public function postCreateItem(Request $request) {
        //Validate the request for the required feilds
        $this->validate(
            $request,
            [
                'item_name' => 'required',
            ]
        );

        $item = new \App\Item();

        $item->item_name=$request->item_name;
        $item->quantity=$request->item_qty;
        $item->store_aisle_num=$request->item_store_aisle;
        $item->store_id=$request->id;
        $item->save();

        \Session::flash('flash_message', 'Item added to store!');

        //return redirect('/store');
        return redirect('/store/'.$item->store_id.'/items');
    }

    public function getEditItem($id=null) {
        $item = \App\Item::find($id);

        return view ('stores.edititem')->with('item',$item);
    }

    public function postEditItem(Request $request) {
        //Validate the request for the required feilds
        $this->validate(
            $request,
            [
                'item_name' => 'required',
            ]
        );

        $item = \App\Item::find($request->id);
        $item->item_name=$request->item_name;
        $item->quantity=$request->item_qty;
        $item->store_aisle_num=$request->item_store_aisle;
        $item->save();

        \Session::flash('flash_message', 'Item detail updated.');

        return redirect('/store/'.$item->store_id.'/items');
    }


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
}
