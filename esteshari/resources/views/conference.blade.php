<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conference Room</title>
    <style>
        #local-video, #remote-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>
<div id="video-container">
    <video id="local-video" autoplay muted></video>
    <video id="remote-video" autoplay></video>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script>
    const joinConferenceButton = document.createElement("button");
    joinConferenceButton.id = "join-conference-button";
    joinConferenceButton.style.display = "none";
    joinConferenceButton.dataset.appId = "{{ $agoraAppId }}";
    joinConferenceButton.dataset.roomName = "{{ $room }}";
    document.body.appendChild(joinConferenceButton);
    joinConferenceButton.click();
</script>
</body>
</html>
