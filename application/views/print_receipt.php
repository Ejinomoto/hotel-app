<html>

<head>
    <title>Receipt</title>
    <style>
        /* Basic styles for the receipt */
        body {
            font-family: Arial, sans-serif;
        }

        .receipt {
            width: 80%;
            margin: 20px auto;
            border: 1px solid #ddd;
            padding: 20px;
        }

        .receipt h1,
        h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="receipt">
        <h1>Reservation Receipt</h1>
        <h2>Nomor Reservasi : BK/ERS/<?= str_pad($reservation->reservation_id, 3, '0', STR_PAD_LEFT) ?></h2>

        <p><strong>Room Type:</strong> <?= $reservation->tipe_kamar ?></p>
        <p><strong>Check-in Date:</strong> <?= $reservation->check_in_date ?></p>
        <p><strong>Check-out Date:</strong> <?= $reservation->check_out_date ?></p>
        <p><strong>Total Price:</strong> <?= number_format($reservation->total_price) ?></p>
        <p><strong>Room View:</strong> <?= ucfirst($reservation->room_view) ?></p>
        <p><strong>Room Floor:</strong> <?= ucfirst($reservation->room_floor) ?></p>
        <p><strong>Notes:</strong> <?= ucfirst($reservation->notes) ?></p>
        <p><strong>Status:</strong> <?= ucfirst($reservation->status) ?></p>
    </div>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>

</html>