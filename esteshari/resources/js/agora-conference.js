import AgoraRTC from "agora-rtc-sdk-ng";

async function joinChannel(appId, roomName, localVideo, remoteVideo) {
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

export { joinChannel };
