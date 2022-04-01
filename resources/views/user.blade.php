<!DOCTYPE html>
<html>

<head>
    <title>Assignment</title>
    <style>
        .section {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: #44a6f7;
            padding: 36px;
            max-width: 350px;
            margin: auto;
            min-height: 250px;
            justify-content: center;
        }

        .d-flex {
            display: flex;
        }

        .mr-auto {
            margin-right: auto;
        }

        button {
            background: gray;
            color: #fff;
            border-radius: 5px;
            font-size: 17px;
            font-family: 'Source Sans Pro', sans-serif;
            padding: 7px 18px;
            border: none;
            cursor: pointer;
            white-space: nowrap;
        }

        input[type="text"] {
            display: block;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border: none;
        }

        .btn-group {
            display: flex;
        }

        .btn-group button {
            margin: 0px 4px;
        }
    </style>
</head>

<body>
<!-- form 1 -->
<form method="post" action="{{'/login'}}">
    {{csrf_field()}}
 <div class="section">
        <input name="name" type="text" placeholder="Please enter your name" />
        <button type="submit">Next</button>
</div>
</form>



</html>
