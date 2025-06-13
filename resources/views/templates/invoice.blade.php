<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background: #f5f5f5; }
        .invoice-box { background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { margin-bottom: 20px; color: #333; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { text-align: left; padding: 8px; border-bottom: 1px solid #ddd; }
        th { background-color: #f9f9f9; }
        .total { font-weight: bold; }
        .footer { margin-top: 30px; font-size: 12px; color: #777; }
    </style>
</head>
<body>
<div class="invoice-box">
    <h1>Invoice #{{ $invoice_number }}</h1>

    <p><strong>Date:</strong> {{ $invoice_date }}</p>
    <p><strong>Customer:</strong> {{ $customer_name }}</p>

    <table>
        <thead>
        <tr>
            <th>Item</th>
            <th>Qty</th>
            <th>Unit Price</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>${{ number_format($item['price'], 2) }}</td>
                <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="3" class="total">Subtotal:</td>
            <td>${{ number_format($subtotal, 2) }}</td>
        </tr>
        <tr>
            <td colspan="3" class="total">Tax:</td>
            <td>${{ number_format($tax, 2) }}</td>
        </tr>
        <tr>
            <td colspan="3" class="total">Total:</td>
            <td>${{ number_format($total, 2) }}</td>
        </tr>
        </tfoot>
    </table>

    <div class="footer">
        Thank you for your business!
    </div>
</div>
</body>
</html>
