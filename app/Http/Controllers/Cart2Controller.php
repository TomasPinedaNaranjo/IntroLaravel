<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class Cart2Controller extends Controller
{
    public function index(Request $request)
    {
        $total = 0;
        $productsInCart = [];

        $productsInSession = $request->session()->get('products');
        if ($productsInSession) {
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $total = Product::sumPricesByQuantities($productsInCart, $productsInSession);
        }

        $viewData = [];
        $viewData['title'] = 'Cart - Online Store';
        $viewData['subtitle'] = 'Shopping Cart';
        $viewData['total'] = $total;
        $viewData['products'] = $productsInCart;

        return view('cart2.index')->with('viewData', $viewData);
    }

    public function add(Request $request, $id)
    {
        $products = $request->session()->get('products');
        $products[$id] = $request->input('quantity');
        $request->session()->put('products', $products);

        return redirect()->route('cart2.index');
    }

    public function delete(Request $request)
    {
        $request->session()->forget('products');

        return back();
    }

    public function purchase(Request $request)
    {
        $productsInSession = $request->session()->get('products');
        if ($productsInSession) {
            // $userId = Auth::user()->getId();
            $order = new Order;
            // $order->setUserId($userId);
            $order->setTotal(0);
            // añado estos tres por ahora, debo acomodar para que sean por defecto o null
            $order->item = implode(', ', array_keys($productsInSession));
            $order->address = 'Default Address';
            $order->payment_method = 'cash';
            $order->save();

            $total = 0;
            $productsInCart = Product::findMany(array_keys($productsInSession));
            foreach ($productsInCart as $product) {
                $quantity = $productsInSession[$product->getId()];
                $item = new Item;
                $item->setQuantity($quantity);
                $item->setSubtotal($product->getPrice());
                $item->setProductId($product->getId());
                $item->setOrderId($order->getId());
                $item->save();
                $total = $total + ($product->getPrice() * $quantity);
            }
            $order->setTotal($total);
            $order->save();

            // $newBalance = Auth::user()->getBalance() - $total;
            // Auth::user()->setBalance($newBalance);
            // Auth::user()->save();

            $request->session()->forget('products');

            $viewData = [];
            $viewData['title'] = 'Purchase - Online Store';
            $viewData['subtitle'] = 'Purchase Status';
            $viewData['order'] = $order;

            return view('cart2.purchase')->with('viewData', $viewData);
        } else {
            return redirect()->route('cart2.index');
        }

    }

    public function downloadInvoice($id)
{
    $order = Order::findOrFail($id);
    $productsInCart = Product::findMany(explode(', ', $order->item));
    $productsInSession = session('products');

    $quantities = [];
    if ($productsInSession) {
        foreach ($productsInCart as $product) {
            if (isset($productsInSession[$product->getId()])) {
                $quantities[$product->getId()] = $productsInSession[$product->getId()];
            } else {
                // Si no existe el producto en la sesión, asignar una cantidad por defecto (por ejemplo, 1)
                $quantities[$product->getId()] = 1;
            }
        }
    } else {
        // Si no hay sesión de productos, asignar cantidades por defecto (por ejemplo, 1)
        foreach ($productsInCart as $product) {
            $quantities[$product->getId()] = 1;
        }
    }

    $pdf = Pdf::loadView('cart2.invoice', [
        'order' => $order,
        'products' => $productsInCart,
        'quantities' => $quantities,
    ]);

    return $pdf->download('factura_' . $order->getId() . '.pdf');
}
}
