<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Validators\OrdersValidator;

class OrderController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Orders - Online Store';
        $viewData['subtitle'] = 'List of orders';
        $viewData['orders'] = Order::all();

        return view('order.index')->with('viewData', $viewData);

    }

    public function list(): View
    {
        $viewData = [];
        $viewData['title'] = 'Orders - Online Store';
        $viewData['subtitle'] = 'List of orders';
        $viewData['orders'] = Order::all();

        return view('order.list')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {

        $viewData = [];

        $order = Order::findOrFail($id);
        $viewData['title'] = $order['name'].' - Online Store';
        $viewData['subtitle'] = $order['name'].' - Order information';
        $viewData['order'] = $order;

        return view('order.show')->with('viewData', $viewData);

    }

    public function create(): View
    {

        $viewData = []; // to be sent to the view

        $viewData['title'] = 'Create Order';

        return view('order.create')->with('viewData', $viewData);

    }

    public function save(Request $request): \Illuminate\Http\RedirectResponse
    {

        $request->validate(OrdersValidator::$rules);
        Order::create($request->only(['item', 'total', 'address', 'payment_method', 'status']));

        return redirect()->route('order.index')->with('success', 'Order created successfully!');
    }

    public function delete(string $id): \Illuminate\Http\RedirectResponse
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('order.index')->with('success', 'Order deleted successfully!');
    }
}
