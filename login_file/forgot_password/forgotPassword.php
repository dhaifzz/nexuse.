<!DOCTYPE html>
<html lang="en">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link rel="stylesheet" href="forgotPass_style.css">
</head>
<body>
    <div class="container">
        <header>
            <img src="/nexuse/images/Nexuse-red.svg" alt="Nexuse Logo" class="cat">
            <h1>Nexuse.</h1>
        </header>

        <main>
            <p>To reset your <a>password</a>, submit your WMSU email below. If we can find you in the database, an email will be sent to your email address, 
            that will be looked by the Admin. Thank you.</p>

            <div class="form-container">
    <form action="#" method="post">
        <label for="email">Send thru email address</label>
        <input type="email" id="email" name="email" placeholder="Enter your WMSU email account.." required>
        
        <div class="form-buttons">
            <button type="submit" class="search-btn">Search</button>
            <button type="button" onclick="window.history.back()" class="return-btn">↩ Return</button>
            </div>
    </form>
</div>
        </main>
    </div>
</body>
</html>
