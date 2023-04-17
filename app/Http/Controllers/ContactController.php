<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * 显示所有联系人卡片
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $contacts = Contact::all();

        return view('index', [
            'contacts' => $contacts
        ]);
    }

    // /**
    //  * 保存新创建的联系人卡片
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\RedirectResponse
    //  */
    public function store(Request $request)
    {
        Contact::create($request->all());

        return response()->json([
            'status' => 201,
            "msg" => "Updated!"
        ]);
    }

    /**
     * 更新指定ID的联系人卡片
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return response()->json([
            'status' => 201,
            'data' => $contact,
            "msg" => "Updated!"
        ]);
    }

    /**
     * 删除指定ID的联系人卡片
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return response()->json([
            'status' => 201,
            'msg' => 'deleted!'
        ]);
    }

}
