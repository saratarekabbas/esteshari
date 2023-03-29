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
    import AgoraRTC from "agora-rtc-sdk-ng";

    const appId = "{{ $agoraAppId }}";
    const roomName = "{{ $room }}";
    const localVideo = document.getElementById("local-video");
    const remoteVideo = document.getElementById("remote-video");

    async function joinChannel() {
        const client = AgoraRTC.createClient({ mode: "rtc", codec: "vp8" });

        await client.join(appId, roomName, null, 0);

        const localTrack = await AgoraRTC.createCameraVideoTrack();
        localTrack.play(localVideo);

        client.on("user-published", async (user, mediaType) => {
            await client.subscribe(user, mediaType);
            if (mediaType === "video") {
                user.videoTrack.play(remoteVideo);
            }
        });

        client.on("user-unpublished", (user, mediaType) => {
            if (mediaType === "video") {
                remoteVideo.srcObject = null;
            }
        });

        await client.publish([localTrack]);
    }

    joinChannel().catch(console.error);
</script>
</body>
</html>
