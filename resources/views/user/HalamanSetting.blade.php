<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Settings</title>
    <style>
        body, html {
            background-color: #EBEBFB;
            color: #171730;
            user-select: none;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: "Poppins", sans-serif;
        }

        .container {
            box-sizing: border-box;
            background-color: white;
            padding: 20px;
            border-radius: 20px;
            width: 450px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1, h3 {
            font-family: "Roboto Slab", serif;
            font-weight: 600;
            margin: 0;
            text-align: center;
        }

        .setting-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .toggle-container {
            position: relative;
            width: fit-content;
            height: fit-content;
        }

        .toggle {
            width: 60px;
            height: 35px;
            border-radius: 40px;
            background-color: #EBEBFB;
            display: inline-block;
        }

        .toggle-c {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: white;
            display: inline-block;
            position: absolute;
            left: 5px;
            top: 5px;
            transition: 300ms all;
            border: 1px solid #8c8ca4;
        }

        input[type="checkbox"] {
            display: none;
        }

        input[type="checkbox"]:checked + div .toggle-c {
            left: 30px;
            background-color: #30305C;
            border-color: #30305C;
        }

        /* Mengatur gaya untuk input type time */
        input[type="time"] {
            appearance: none;
            border: 1px solid #ccc;
            padding: 8px;
            border-radius: 4px;
            font-size: 14px;
            width: 100px;
            margin-top: 5px;
            display: block; /* mengatur input time agar menjadi blok */
        }

        /* Stil untuk label */
        label {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        /* Stil untuk tombol */
        button {
            padding: 10px 20px;
            background-color: #30305C;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            align-self: flex-end;
        }

        button:hover {
            background-color: #171730;
        }
    </style>
</head>
<body>
    <div class="container">
        <div>
            <h1>Settings</h1>
        </div>
        <div class="setting-item">
            <label for="togg-1">    
                <span>Dark Mode</span>
                <input type="checkbox" id="togg-1">
                <div class="toggle-container">
                    <span class="toggle"></span>
                    <span class="toggle-c"></span>
                </div>
            </label>
        </div>
        <div class="setting-item">
            <label for="togg-2">    
                <span>Practice Time</span>
                <input type="time" id="togg-2">
            </label>
        </div>
        <div class="setting-item">
            <label for="togg-3">    
                <span>Desktop Notification</span>
                <input type="checkbox" id="togg-3">
                <div class="toggle-container">
                    <span class="toggle"></span>
                    <span class="toggle-c"></span>
                </div>
            </label>
        </div>
        <button id="save-settings">Save Settings</button>
    </div>
</body>
</html>
