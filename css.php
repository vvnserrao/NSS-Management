<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');

    body {
      font-family: 'Nunito', sans-serif;
      color: #384047;
      margin-top: 150px;
    }

    form {
      max-width: 400px;

      margin: auto;
      padding: 40px 10px;
      background: #f4f7f8;
      border-radius: 15px;
    }

    .container {
      display: grid;
      grid-template-columns: 1fr 1fr;
      grid-template-rows: 1fr 1fr;
      gap: 30px 1px;
      grid-auto-flow: row;
      grid-template-areas:
        ". .";

      font-size: larger;
      width: 250px;
      margin-right: 10px;
      margin-top: 40px;
    }

    button {
      margin: 20px 20px;
      padding: 10px 30px;
      color: #FFF;
      background-color: #4bc970;
      font-size: 18px;
      text-align: center;
      font-style: normal;
      border-radius: 4px;
      border: 1px solid #3ac162;
      box-shadow: 0 -1px 0 rgba(255, 255, 255, 0.1) inset;
      margin-top: 35px;
      cursor: pointer;
      font-style: bold;
    }

    table {
      border-collapse: collapse;
    }

    th,
    td {
      border: 2px solid black;
      padding: 8px;
      padding: 8px;
    }

    h1 {
      font-family: 'Poppins', sans-serif;

    }
  </style>
</head>