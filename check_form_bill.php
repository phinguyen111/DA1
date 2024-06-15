<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tra cứu đơn hàng</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body,
    html {
        height: 100%;
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .fullscreen-bg {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        overflow: hidden;
    }

    .overlay {
        background: rgba(0, 0, 0, 0.6);
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .center {
        text-align: center;
        color: white;
        padding: 20px;
    }

    input[type="text"],
    input[type="submit"] {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        margin: 10px;
        font-size: 16px;
    }

    input[type="text"] {
        width: 300px;
    }

    input[type="submit"] {
        background-color: #3498db;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #2980b9;
    }
</style>

<body>
    <div class="fullscreen-bg">
        <div class="overlay">
            <div class="center">
                <h2>Nhập mã đơn hàng để tra cứu</h2>
                <form action="index.php?page=check_bill" method="post">
                    <label for="ma_don_hang">Mã đơn hàng:</label>
                    <input type="text" id="ma_don_hang" name="ma_don_hang" required>
                    <input type="submit" name="view_bill" value="Xem đơn hàng">
                </form>
            </div>
        </div>
    </div>
</body>

</html>