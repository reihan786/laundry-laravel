<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $title ?? '' }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('inc.css')
</head>

<body>

    <!-- ======= Header ======= -->
    @include('inc.header')

    <!-- ======= Sidebar ======= -->
    @include('inc.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Blank Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Blank</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="content">
            @yield('content')
        </div>


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('inc.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('inc.js')

    <script>
        const button = document.querySelector('.addRow');
        const tbody = document.querySelector('#myTable tbody');
        const select = document.querySelector('#id_service');
        // button.textContent = "Duarr";
        // button.style.color = "red";
        const grandTotal = document.getElementById('grandTotal');
        const grandTotalInput = document.getElementById('grandTotalInput');

        let no = 1;
        button.addEventListener("click", function() {
            const selectedProduct = select.options[select.selectedIndex];
            const productValue = selectedProduct.value;
            if (!productValue) {
                alert('select product require');
                return;
            }
            const productName = selectedProduct.textContent;
            const productPrice = selectedProduct.dataset.price;

            const tr = document.createElement('tr'); //<tr></tr>
            tr.innerHTML = `
        <td>${no}</td>
        <td><input type='hidden' name='id_product[]' class='id_products' value='${productValue}'>${productName}</td>
        <td>
            <input type='number' step="any" min="1" class="form-control qtys" name="qty[]" value='1'>
             <input type='hidden' class='priceInput' name='price[]' value='${productPrice}'>
        </td>
        <td><input type='hidden' name='total[]' class='totals' value='${productPrice}'><span class='totalText'>${productPrice}<span></td>
        <td>
            <button class='btn btn-success btn-sm removeRow' type='button'>Delete</button>
        </td>
        `; //<tr><td></td></tr>

            tbody.appendChild(tr);
            no++;


            select.value = "";

            updateGrandTotal();

        });

        tbody.addEventListener('click', function(e) {
            if (e.target.classList.contains('removeRow')) {
                e.target.closest("tr").remove();
            }

            updateNumber();
            updateGrandTotal();



        });

        tbody.addEventListener('input', function(e) {
            if (e.target.classList.contains('qtys')) {
                const row = e.target.closest("tr");
                const qty = parseFloat(e.target.value) || 0;
                const price = parseInt(row.querySelector('[name="price[]"]').value);

                console.log(qty);
                console.log(price);
                row.querySelector('.totalText').textContent = price * qty;

                row.querySelector('.totals').value = price * qty;
                updateGrandTotal();
            }
        });

        function updateNumber() {
            const rows = tbody.querySelectorAll("tr");

            rows.forEach(function(row, index) {
                row.cells[0].textContent = index + 1;
            });

            no = rows.length + 1;
        }

        function updateGrandTotal() {
            const totalCells = tbody.querySelectorAll('.totals');
            let grand = 0;
            totalCells.forEach(function(input) {
                grand += parseInt(input.value) || 0;
            });
            grandTotal.textContent = grand.toLocaleString('id-ID');
            grandTotalInput.value = grand;
        }
    </script>


</body>

</html>
