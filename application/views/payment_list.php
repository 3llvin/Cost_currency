<!DOCTYPE html>
<html>

<head>
    <title>Ödənişlər Siyahısı</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h2>Ödənişlər Siyahısı</h2>
        <form id="filterForm" class="mb-4">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="start_date">Başlama Tarixi</label>
                    <input type="date" class="form-control" id="start_date" name="start_date">
                </div>
                <div class="form-group col-md-3">
                    <label for="end_date">Bitmə Tarixi</label>
                    <input type="date" class="form-control" id="end_date" name="end_date">
                </div>
                <div class="form-group col-md-3">
                    <label for="category_id">Ödəniş Növü</label>
                    <select class="form-control" id="category_id" name="category_id">
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="currency_id">Valyuta</label>
                    <select class="form-control" id="currency_id" name="currency_id">
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Filter</button>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Məbləğ</th>
                    <th>Ödəniş Növü</th>
                    <th>Valyuta</th>
                    <th>Qeyd</th>
                    <th>Mədaxil</th>
                    <th>Məxaric</th>
                </tr>
            </thead>
            <tbody id="paymentsTable">
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: '<?= base_url("payment/get_form_data") ?>',
                type: 'GET',
                success: function(response) {
                    var data = JSON.parse(response);
                    var categories = data.categories;
                    var currencies = data.currencies;

                    var categorySelect = $('#category_id');
                    categories.forEach(function(category) {
                        categorySelect.append('<option value="' + category.id + '">' + category.name + '</option>');
                    });

                    var currencySelect = $('#currency_id');
                    currencies.forEach(function(currency) {
                        currencySelect.append('<option value="' + currency.id + '">' + currency.name + '</option>');
                    });
                }
            });

            $('#filterForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '<?= base_url("payment/filter") ?>',
                    type: 'GET',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#paymentsTable').html(response);
                    }
                });
            });
        });
    </script>
</body>

</html>
