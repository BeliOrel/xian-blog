<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

<h3>You have a new contact via the contact form</h3>

<p><b>Subject:</b> {{ $subject }}</p>

<div>
  {{ $msg }}
</div>

<p><b>Sent via</b> {{ $email }}</p>

</body>
</html>