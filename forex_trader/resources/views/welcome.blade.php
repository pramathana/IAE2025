<!DOCTYPE html>
<html>
<head>
    <title>FOREX</title>
    <style>
        /* Reset default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 500px;
            width: 90%;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #ffd700;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        form {
            margin: 1.5rem 0;
        }

        label {
            font-size: 1.1rem;
            margin: 0 0.5rem;
            color: #e0e0e0;
        }

        input[type="text"] {
            padding: 0.5rem;
            border: none;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.9);
            color: #333;
            font-size: 1rem;
            width: 100px;
            margin: 0.5rem;
        }

        button {
            padding: 0.6rem 1.2rem;
            background: #ffd700;
            color: #1e3c72;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #e6c200;
        }

        p {
            font-size: 1.5rem;
            font-weight: bold;
            color: #e0e0e0;
            background: rgba(0, 0, 0, 0.2);
            padding: 1rem;
            border-radius: 10px;
            display: inline-block;
        }

        /* Responsiveness */
        @media (max-width: 480px) {
            h1 {
                font-size: 1.8rem;
            }
            p {
                font-size: 1.2rem;
            }
            .container {
                padding: 1.5rem;
            }
            input[type="text"] {
                width: 80px;
            }
            label {
                display: block;
                margin: 0.5rem 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Forex Kurs</h1>
        <form method="POST" action="/get-rate">
            @csrf
            <label>Dari: </label>
            <input type="text" name="from_currency" value="{{ $from_currency }}">
            <label>Ke: </label>
            <input type="text" name="to_currency" value="{{ $to_currency }}">
            <button type="submit">Cek Kurs</button>
        </form>
        
        @if($rate)
            <p>Kurs {{ $from_currency }}/{{ $to_currency }}: {{ $rate }}</p>
        @else
            <p>Masukkan pasangan mata uang untuk melihat kurs.</p>
        @endif
    </div>
</body>
</html>