<?= view('head') ?>
<div class="fixed-button">
    <button class="btn btn-primary" id="openMessageModal">
        <i class="fas fa-envelope"></i> <!-- Font Awesome message icon -->
        <span class="badge bg-danger"></span> <!-- Add the span element with the number 4 -->
    </button>
</div>

<div id="messageModal" class="message-modal col-md-3">
    <div class="box box-succsses direct-chat direct-chat-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Chat Messages</h3>

            <div class="box-tools pull-right">
                <span data-toggle="tooltip" title="" class="badge bg-yellow"
                    data-original-title="3 New Messages">20</span>
                <button type="button" class="btn btn-box-tool" data-widget="remove" onclick="closeMessageModal()">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <div class="direct-chat-messages">
                <ul>
                    <?php
                    $combinedMessages = array_merge($chat, $recieve);
                    usort($combinedMessages, function ($a, $b) {
                        return strtotime($a['created_at']) - strtotime($b['created_at']);
                    });

                    foreach ($combinedMessages as $message):
                        $messageText = $message['message'];
                        $messageClass = strlen($messageText) > 50 ? 'long-message' : 'short-message';
                        ?>
                        <li
                            class="direct-chat-msg <?= $message['recipient'] == $userId ? 'right' : ''; ?> <?= $messageClass; ?>">
                            <div class="direct-chat-text-container">
                                <div class="direct-chat-text small">
                                    <?= $messageText; ?>
                                </div>
                                <span class="direct-chat-timestamp small">
                                    <?= $message['time_diff']; ?>
                                </span>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="box-footer">
            <form action="chat" method="post">
                <div class="input-group">
                    <input type="hidden" name="sendto" value="92">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control" required>
                    <span class="input-group-btn">
                        <!-- <button type="button" class="btn btn-warning btn-flat">Send</button> -->
                        <input type="submit" class="btn btn-primary" value="Send">
                    </span>
                </div>
            </form>
        </div>

    </div>
</div>

<?= view('js') ?>