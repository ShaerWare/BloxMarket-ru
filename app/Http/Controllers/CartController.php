<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function store(Request $request): RedirectResponse
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'The product is already in your cart!');
        }

        Cart::add($request->id, $request->name, $request->qty, $request->sale_price ?? $request->price)
            ->associate('Product');

        return redirect()->route('cart.index')->with('success_message', 'The product has been successfully added to the cart');
    }

    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,50',
        ]);

        if ($validator->fails()) {
            session()->flash('errors', collect(['The quantity of the product must be from 1 to 50']));

            return response()->json(['success' => false], 400);
        }

        Cart::update($id, $request->qty);
        session()->flash('success_message', 'The quantity of the product has been successfully updated');

        return response()->json(['success' => true]);
    }

    public function destroy($id): RedirectResponse
    {
        Cart::remove($id);

        return back()->with('success_message', 'The product has been successfully deleted!');
    }
}
