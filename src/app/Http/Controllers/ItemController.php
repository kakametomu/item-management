<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\User;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item
            ::where('items.status', 'active')
            ->select()
            ->get();

        return view('item.index', compact('items'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }

    //アイテムを削除する
    public function ListDelete(Request $request)
    {
        //既存のレコードを取得して削除する
        $items = Item::find($request->id);
        $items->delete();

        return redirect('/items');
    }

    //ユーザーを削除する
    public function UserDelete(Request $request)
    {
        //既存のレコードを取得して削除する
        $users = User::find($request->id);
        $users->delete();

        return redirect('/userslist');
    }

    //追加画面へ変異
    public function userslist()
    {
        // 商品一覧取得
        $users = User::all();

        /* return view('user/userslist', compact('items')); */

        return view('user/userslist')->with(['users' => $users,]);
    }

    //検索機能
    public function search(Request $request)
{
    $items = Item::where('name', 'LIKE', "%{$request->search}%")->get();return view('item.index', compact('items'));
    return view('item.index', compact('items'));
}
}
