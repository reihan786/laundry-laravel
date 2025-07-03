<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Laundry</title>
    <style>
        .body {
            font-family: monospace;
            /* width: 300px; */
            width: 80mm;
            margin: auto;
            padding: 10px;
        }

        .struk {
            text-align: center;
        }

        .line {
            margin: 5px 0;
            border-top: 1px dashed black;
        }

        .info,
        .product,
        .summary {
            text-align: left;
        }

        .product .item {
            margin-bottom: 5px;
        }

        .product .item-qty {
            display: flex;
            justify-content: space-between;
        }

        .info .row,
        .summary .row {
            display: flex;
            justify-content: space-between;
            margin: 2px 0;
        }

        footer {
            text-align: center;
            font-size: 13px;
            margin-top: 10px;
        }

        @media print {
            body {
                width: 80mm;
                margin: 0;
            }
        }
    </style>
</head>

<body>
    <div class="struk">
        <div class="struk-header">
            <h3>Laundry Jaya</h3>
            <h2>Cepat dan Murah</h2>
            <div class="info">
                Jl. Karet Baru Benhill Jakarta Pusat
                <br>
                08994839202
            </div>
        </div>
        <div class="line"></div>
        <div class="info">
            <div class="row">
                <span>{{ $details->created_at }}</span>
                <span>{{ $details->order_end_date }}</span>
            </div>
            <div class="row">
                <span>Cashier</span>
                <span>{{ auth()->user()->name }}</span>
            </div>
            <div class="row">
                <span>Order Id</span>
                <span>{{ $details->order_code ?? '' }}</span>
            </div>
        </div>
        <div class="line"></div>
        <div class="product">
            @foreach ($details->details as $detail)
                <div class="item">
                    <strong>{{ $detail->service->service_name ?? '' }}</strong>
                    <div class="item-qty">
                        <span>{{ $detail->qty }}x @ {{ number_format($detail->service->price) }}</span>
                        <span>{{ $detail->subtotal }}</span>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="line"></div>
        <div class="summary">
            <div class="row">
                <span>Subtotal</span>
                <span>Rp. 20.000</span>
            </div>
        </div>
        <div class="line"></div>
        <footer class="text-center">
            Terimakasih sudah membeli disini
        </footer>
    </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>
