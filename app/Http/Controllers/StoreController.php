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

         //Adding data to related pivote table
         $store->users()->attach(\Auth::id());

         //show the flash message and redirect page
         \Session::flash('flash_message', 'New Store "'. $store->store_name. '" is Created in the list!');

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

     public function getDeleteStore($id=null) {

        //  $items = \App\Item::where('store_id','=',$id)->get();
         //
        //  foreach($items as $item) {
        //      $item->delete();
        //  }

        $store = \App\Store::find($id);


        if($store->users()) {
            $store->users()->detach();
        }
        $store->delete();

        return redirect('/store');
     }

     public function getShareStorelist($id=null) {
         $store = \App\Store::find($id);
         return view('stores.sharestore')->with('store',$store);
     }

     public function postShareStorelist(Request $request) {
        //  $user = \App\User::where('email','=',$request->email)->first();
        //  $userid = $user->id;



         $this->validate(

             $request,
             [
                 'email' => 'required|email|max:255|exists:users,email'

             ]
         );
         //|unique:store_user,store_id,12,user_id,2',
         $store = \App\Store::find($request->store_id);
         $user = \App\User::where('email','=',$request->email)->first();

         $store->users()->attach($user->id);


         //show the flash message and redirect page
         \Session::flash('flash_message', 'Store list "'. $store->store_name. '" is now shared to '. $request->email);

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

    public function getDeleteItem($id=null) {
        $item = \App\Item::find($id);
        $item->delete();
        return redirect('/store/'.$item->store_id.'/items');
    }

    public function getItemChecked($id=null)
    {
        //get item from item id
        $item = \App\Item::find($id);

        //check if item marked as checked
        $itemChecked = $item->checked;

        //toggle the value
        if (!$itemChecked) {
            $item->checked=true;
        } else {
            $item->checked=false;
        }
        $item->save();

        \Session::flash('flash_message', 'Item detail updated.');
        return redirect('/store/'.$item->store_id.'/items');
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
