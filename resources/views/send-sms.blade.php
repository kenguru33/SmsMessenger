<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ elixir("css/app.css") }}">
    </head>
    <body>
    <div class="container">
        <h2>Sms Messenger</h2>
        <p>Send a sms message using {{config('sms.default-provider')}}.</p>
        <form role="form" method="post">
            <div class="form-group">
            <label for="receiver">Receiver:</label>
            <input class="form-control" type="tel" name="receiver" id="receiver">
            </div>
            <div class="form-group">
                <label for="comment">Message:</label>
                <textarea class="form-control" rows="5" name="message" id="message"></textarea>
            </div>
            <input class="btn btn-success" type="submit">
        </form>
    </div>
    </body>
</html>
