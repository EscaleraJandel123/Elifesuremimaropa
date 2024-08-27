<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <th>message</th>
            <th>From</th>
            <th>Minutes ago</th>
        </thead>
        <?php foreach ($chats as $c): ?>
            <tbody>
                <tr>
                    <td>
                        <?= $c['message'] ?>
                    </td>
                    <td>
                        <?= $c['sender'] ?>
                    </td>
                    <td>
                        <?= $c['time_diff'] ?>
                    </td>
                </tr>
            </tbody>
        <?php endforeach; ?>
    </table>
    <!-- <h1>Chat</h1>
    <form action="chat" method="post">

        <label for="sendto">Send To</label><br>
        <input type="text" name="sendto"><br>

        <label for="message">Message</label><br>
        <input type="text" name="message"><br>

        <button type="submit">Send</button>

    </form> -->
</body>

</html>